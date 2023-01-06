<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FreelancerController extends Controller
{
    public function proposal_store(Request $request)
    {
//        dd($request->all());
        $request->validate([
            'description' => ['required', 'string'],
            'cost' => ['required', 'numeric', 'min:1'],
            'duration' => ['required', 'int', 'min:1'],
            'duration_unit' => ['required', 'in:day,week,month,year'],
        ]);

        $project = Project::findOrFail($request->project_id);

        if ($project->status !== 'open') {
            return redirect()->route('single.project',$project->slug)
                ->with('msg', 'You cannot submit proposal to this project')
                ->with('type', 'danger');
        }
//
        $user = Auth::guard('web')->user();

        if ($user->proposalsProject()->find($project->id)) {
            return redirect()->back()
                ->with('msg', 'You already submitted proposal to this project')
                ->with('type', 'danger');
        }


        $proposal = $user->proposals()->create( $request->all() );

        return redirect()->back()
            ->with('msg', 'Your proposal has been submitted')
            ->with('type', 'success');
    }
}
