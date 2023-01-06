<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Project;
use App\Models\Proposal;
use App\Models\User;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        return view('frontsite.index', [
            'categories' => Category::withCount('projects')->get(),
            'projects' => Project::with('tags')->get()
        ]);
    }

    public function full_projects()
    {

        return view('frontsite.full-projects', [
            'projects' => Project::with('tags')->get()
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

    public function contact(){
        return  view('frontsite.contact');
    }
}
