<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class FrontSiteController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        $recent_posts = Post::orderByDesc('id')->where('status', 'active')->take(5)->get();

        $categories = Category::withCount('posts')->orderBy('id')->get();
        return view('frontsite.index', [
            'posts' => $posts,
            'categories' => $categories,
            'recent_posts' => $recent_posts,
        ]);
    }

    public function category(Request $request)
    {
        $posts = Post::orderByDesc('id')->paginate(2);
        $slug = $request->slug;
        if ($slug != null) {
            $category = Category::where('slug', $slug)->first();
            $posts = Post::where('category_id', $category->id)->orderByDesc('id')->paginate(5);
        }
        $categories = Category::all();
        return view('frontsite.category', [
            'posts' => $posts,
            'categories' => $categories,
            'slug'=>$slug
        ]);
    }

    public function contact()
    {
        return view('frontsite.contact');
    }

    public function about()
    {
        return view('frontsite.about');
    }

    public function details($post_id)
    {
        $post = Post::findOrFail($post_id);

        return view('frontsite.details',['post'=>$post]);
    }
}
