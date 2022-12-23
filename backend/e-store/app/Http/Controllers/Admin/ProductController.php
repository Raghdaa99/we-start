<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest('id')->paginate(15);
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::select(['id', 'name'])->get();
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ProductRequest $request)
    {
//        dd($request->all());
        DB::beginTransaction();

        try {
            $product = Product::create([
                'name' => '',
                'smalldesc' => '',
                'desc' => '',
                'price' => $request->price,
                'quantity' => $request->quantity,
                'category_id' => $request->category_id,
                'featured' => $request->input('featured', 0)
            ]);

            if($request->hasFile('image')) {
                $image = $this->upload($request->file('image'));
                $product->gallery()->create([
                    'path' => $image,
                    'feature' => 1
                ]);
            }

            if($request->has('album')) {
                foreach($request->album as $file) {
                    $product->gallery()->create([
                        'path' => $file,
                        'feature' => 0
                    ]);
                }
            }

            if($request->has('variation')) {
                foreach($request->variation as $type => $data) {
                    foreach($data as $info) {
                        $product->variations()->create([
                            'type' => $type,
                            'value' => $info['value'],
                            'extraprice' => $info['price']
                        ]);
                    }
                }
            }

            DB::commit();
        }catch(Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }

        return redirect()->route('admin.products.index')
            ->with('msg', 'Product created successfully')
            ->with('type', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Product $product)
    {
        $categories = Category::select(['id', 'name'])->get();
        $product = $product->load('image', 'category', 'gallery', 'variations');

        return view('admin.products.edit', compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }

    public function add_image(Request $request){
//        return $request->file->store('products', [
//            'disk' => 'public'
//        ]);
        return $request->file('file')->store('/uploads/products', 'custom');
    }

    protected function upload(UploadedFile $file)
    {
        return $file->store('uploads/products', 'custom');
//        return $file->store('products', [
//            'disk' => 'public'
//        ]);
    }
}
