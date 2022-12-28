<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Base;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoriesResource;
use App\Http\Resources\ProductsResource;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class SiteController extends Controller
{

    public function getAllCategories()
    {

        $data = Category::withCount('products')->OrderByDesc('products_count')->limit(6)->get();
        $data = CategoriesResource::collection($data);

        return Base::msg(1, 'All Categories', 200, $data);
    }

    public function getAllProducts()
    {
        $data = ProductsResource::collection(Product::with('image', 'gallery', 'variations', 'category', 'reviews')->get());
        return Base::msg(1, 'All  products', 200, $data);
    }

    public function getProduct($slug)
    {
        $data = new ProductsResource(Product::whereSlug($slug)->with('image', 'gallery', 'variations', 'category', 'reviews')->first());
        return Base::msg(1, 'Single Product', 200, $data);
    }
}
