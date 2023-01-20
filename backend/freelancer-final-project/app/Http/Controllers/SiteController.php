<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Project;
use App\Models\Proposal;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        return view('frontsite.index', [
            'categories' => Category::withCount('projects')->get(),
            'projects' => Project::with('tags')->get(),
            'count_projects'=>Project::count(),
            'count_freelancers'=>User::where('type','freelancer')->count(),
        ]);
    }

    public function full_projects(Request $request)
    {

        $data = $request->all();
        $projects = Project::query();
//        dd($data);

        if ($request->has('category')) {
            $projects = $projects->whereIn('category_id', $request->category);
        }

        if ($request->has('type')) {
            if ($request->type != null) {
                $projects = $projects->where('type', $request->type);
            }
        }

        if ($request->has('price')) {
            $arr = explode(',', request()->price);
            $projects = $projects->where('min_budget', '>=', $arr[0]);
            $projects = $projects->where('max_budget', '<=', $arr[1]);
        }

        if ($request->has('tags')) {
            $projects = $projects->whereHas('tags', function ($query) {
                $query->whereIn('id', request()->tags);
            });
        }
        if ($request->has('sort')) {
            $sort = $request->sort;
            if ($sort == 'oldest') {
                $projects = $projects->orderBy('created_at', 'ASC');
            } elseif ($sort == 'newest') {
                $projects = $projects->orderBy('created_at', 'DESC');
            }
        }

        return view('frontsite.full-projects', [
            'projects' => $projects->paginate(10),
            'categories' => Category::all(),
            'tags' => Tag::all(),
        ]);
    }

    public function single_project($slug)
    {
        $project = Project::whereSlug($slug)->with('proposals.freelancer')->first();
        return view('frontsite.single-project', [
            'project' => $project,
            'duration_units' => Proposal::duration_units(),

        ]);
    }

    public function single_freelancer($username, $id)
    {
        $user = User::findOrFail($id);
        return view('frontsite.single-freelancer-profile', [
            'user' => $user
        ]);
    }

    public function contact()
    {
        return view('frontsite.contact');
    }
}
