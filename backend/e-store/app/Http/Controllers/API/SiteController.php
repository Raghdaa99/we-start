<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Base;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoriesResource;
use App\Models\Category;
use Illuminate\Http\Request;

class SiteController extends Controller
{

    public function getAllCategories()
    {

        $data = Category::withCount('products')->OrderByDesc('products_count')->limit(6)->get();
        $data = CategoriesResource::collection($data);

        return Base::msg(1, 'All Categories', 200, $data);
    }

}
