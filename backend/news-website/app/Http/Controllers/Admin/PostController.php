<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $posts = Post::latest('id')->paginate(10);

        return view('admin.posts.index', [
            'posts' => $posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.posts.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PostRequest $request)
    {

        $data = $request->except('image');

        if ($request->hasFile('image')) {
            $data['image'] = $this->upload($request->file('image'));
        }

        Post::create($data);

        return redirect()->route('admin.posts.index')
            ->with('success', 'Post is created!');

    }


    /**
     * Display the specified resource.
     *
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('admin.posts.edit', ['post' => $post, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(PostRequest $request, Post $post)
    {

        $data = $request->except('image');

        if ($request->hasFile('image')) {
            $data['image'] = $this->upload($request->file('image'));
        }
        $old_image = $post->image;
        $post->update($data);
        if ($old_image != $post->image) {
            Storage::disk('public')->delete($old_image);

        }
        return redirect()->route('admin.posts.index')
            ->with('success', 'Post is updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Post $post)
    {
        $isDeleted = $post->delete();
//        unlink(public_path('storage/' . $post->image));

        return response()->json(
            ['message' => $isDeleted ? 'Post in trash , you can restore ' : 'Delete failed!'],
            $isDeleted ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST
        );

    }


    protected function upload(UploadedFile $file)
    {
        return $file->store('imgs_posts', [
            'disk' => 'public'
        ]);
    }


    public function trash()
    {
        $posts = Post::onlyTrashed()->orderByDesc('id')->paginate(10);
        return view('admin.posts.trash', [
            'posts' => $posts
        ]);
    }

    public function restore(Post $post)
    {
        $post->restore();
        return redirect()->route('admin.posts.index');
    }

    public function forceDelete(Post $post)
    {
        $isDeleted = $post->forceDelete();
        // unlink(public_path('storage/' . $post->image));
        File::delete(public_path('storage/'.$post->image));
        return response()->json(
            ['message' => $isDeleted ? 'Post in trash , you can restore ' : 'Delete failed!'],
            $isDeleted ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST
        );


    }

}
