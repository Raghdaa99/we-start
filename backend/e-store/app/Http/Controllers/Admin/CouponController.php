<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CouponRequest;
use App\Models\Coupon;
use App\Models\Product;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupons = Coupon::latest('id')->paginate(10);
        $products = Product::all();
        return view('admin.coupons.index', compact(['coupons','products']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        return view('admin.coupons.create',compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CouponRequest $request)
    {
        Coupon::create([
            'name' => '',
            'code' => $request->code,
            'type' => $request->type,
            'value' => $request->value,
            'expire' => $request->expire,
            'usage' => $request->usage,
            'product_id' => $request->product_id,
        ]);

        return redirect()->route('admin.coupons.index')->with('msg', 'Coupon created successfully')->with('type', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  Coupon $coupon
     * @return \Illuminate\Http\Response
     */
    public function show(Coupon $coupon)
    {
        return $coupon;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Coupon $coupon
     * @return \Illuminate\Http\Response
     */
    public function edit(Coupon $coupon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Coupon $coupon
     * @return \Illuminate\Http\Response
     */
    public function update(CouponRequest $request, Coupon $coupon)
    {
        $coupon->update([
            'name' => '',
            'code' => $request->code,
            'type' => $request->type,
            'value' => $request->value,
            'expire' => $request->expire,
            'usage' => $request->usage,
            'product_id' => $request->product_id
        ]);

        return $coupon;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Coupon $coupon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coupon $coupon)
    {
        $coupon->delete();
        return redirect()->route('admin.coupons.index')->with('msg', 'Coupon deleted successfullly')->with('type', 'danger');
    }
}
