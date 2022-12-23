<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $categories = Category::latest('id')->paginate(10);

        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $categories = Category::select(['id', 'name'])->get();
        return view('admin.categories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CategoryRequest $request)
    {
//dd('ddddd');
        if ($request->hasFile('image')) {
            $image = $this->upload($request->file('image'));
        }
        $category = Category::create([
            'name' => '',
            'parent_id' => $request->parent_id
        ]);
        $category->image()->create([
            'path' => $image,
            'feature' => 1
        ]);
        return redirect()->route('admin.categories.index')
            ->with('msg', 'Category created successfully')
            ->with('type', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return $category->load('parent', 'image');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Category $category
     * @return Category
     */
    public function update(CategoryRequest $request, Category $category)
    {

        $category->update([
            'name' => '',
            'parent_id' => $request->parent_id
        ]);
        if ($request->hasFile('image')) {
            $image = $this->upload($request->file('image'));
            $category->image()->update([
                'path' => $image
            ]);
        }
        return $category->load('parent', 'image');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Category $category)
    {
        $isDeleted = $category->delete();
        if ($category->image) {
            File::delete(public_path('storage/'.$category->image));
        }
        return redirect()->route('admin.categories.index')
            ->with('msg', 'Success Deleted')
            ->with('type', 'success');
    }

    protected function upload(UploadedFile $file)
    {
        return $file->store('uploads/categories', 'custom');
//        return $file->store('images_categories', [
//            'disk' => 'public'
//        ]);
    }
}
