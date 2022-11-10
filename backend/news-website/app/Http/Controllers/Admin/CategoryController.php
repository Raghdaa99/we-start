<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $categoriesTrashed = Category::onlyTrashed()->orderByDesc('id')->get();
        return view('admin.categories.index', ['categories' => $categories,
            'categoriesTrashed' => $categoriesTrashed]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(),
            [
                'title' => 'required|string',
                'status' => 'required|string|in:active,draft'
            ]);
        $title = $request->title;
        if (!$validator->fails()) {
            try {
                Category::create([
                    'title' => $title,
                    'slug' => Str::slug($title),
                    'status' => $request->status,
                ]);
                return redirect()->route('admin.categories.index')
                    ->with('success', 'Category is created!');
            } catch (\Exception $e) {
                toastr()->error('Created failed');
                return redirect()->back();
            }

        } else {
            toastr()->error($validator->messages()->first());
            return redirect()->back();

        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Category $category)
    {
        $validator = Validator::make($request->all(),
            [
                'title' => 'required|string',
                'status' => 'required|string|in:active,draft'
            ]);
        $title = $request->title;
        if (!$validator->fails()) {
            try {
                $category->update([
                    'title' => $title,
                    'slug' => Str::slug($title),
                    'status' => $request->status,
                ]);
            } catch (\Exception $e) {
                toastr()->error('Updated failed');
                return redirect()->back();
            }


            return redirect()->route('admin.categories.index')
                ->with('success', 'Category is updated!');
        } else {
            toastr()->error($validator->messages()->first());
            return redirect()->back();

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Category $category)
    {
        $isDeleted = $category->delete();
        return response()->json(
            ['message' => $isDeleted ? 'Deleted successfully' : 'Delete failed!'],
            $isDeleted ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST
        );
    }

    public function restore(Category $category)
    {
        $category->restore();
        return redirect()->route('admin.categories.index');
    }

    public function forceDelete(Category $category)
    {
        $isDeleted = $category->forceDelete();
        return response()->json(
            ['message' => $isDeleted ? 'Category in trash , you can restore ' : 'Delete failed!'],
            $isDeleted ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST
        );

    }
}
