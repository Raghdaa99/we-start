<?php

namespace App\Http\Controllers;

use App\Http\Requests\InvoiceRequest;
use App\Models\Invoice;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices = Invoice::all();
        return view('admin.invoices.index', ['invoices' => $invoices]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.invoices.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_name' => 'required|string',
            'user_email' => 'required|email',
            'user_mobile' => 'required|string|min:7|max:10',
        ]);
        if (!$validator->fails()) {
            $invoice = Invoice::create([
                'user_name' => $request->user_name,
                'user_email' => $request->user_email,
                'user_mobile' => $request->user_mobile,
                'invoice_number' => now()->year . '_' . random_int(100000, 999999),
            ]);
            $details_invoice = [];
            for ($i = 0; $i < count($request->item_name); $i++) {
                $details_invoice[$i]['item_name'] = $request->item_name[$i];
                $details_invoice[$i]['item_price'] = $request->item_price[$i];
                $details_invoice[$i]['quantity'] = $request->quantity[$i];
                $details_invoice[$i]['sub_total_price'] = $request->quantity[$i] * $request->item_price[$i];
            }
            $isSaved = $invoice->invoice_details()->createMany($details_invoice);

            return response()->json(
                [
                    'message' => $isSaved ? 'Invoice created successfully' : 'Create failed!'
                ],
                $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST,
            );
        } else {
            return response()->json(['message' => $validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
        }


    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Invoice $invoice
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Invoice $invoice)
    {
        return view('admin.invoices.show', ['invoice' => $invoice]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Invoice $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Invoice $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Invoice $invoice
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Invoice $invoice)
    {
        $isDeleted = $invoice->delete();

        return response()->json(
            ['message' => $isDeleted ? 'Success Deleted ' : 'Delete failed!'],
            $isDeleted ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST
        );
    }

    public function pdf(Invoice $invoice)
    {

        $pdf = PDF::loadView('admin.invoices.pdfInvoice', ['invoice' => $invoice])->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->download('invoiceFF.pdf');

    }

    public function print(Invoice $invoice)
    {
        return view('admin.invoices.print', ['invoice' => $invoice]);
    }
}
