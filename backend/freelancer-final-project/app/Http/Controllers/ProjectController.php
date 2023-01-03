<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\Models\Category;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $projects = Auth::user()->projects;
        return view('frontsite.dashboard-user.projects.manage-projects',['projects'=>$projects]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {

        return view('frontsite.dashboard-user.projects.post-project', [
            'types' => Project::types(),
            'categories' => Category::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectRequest $request)
    {
//       dd($request->all());
        $user = $request->user();

        $request->merge([
            'user_id' => $user->id,
        ]);
//         $project = Project::create($request->all());

        $data = $request->except('files');


        $project = $user->projects()->create( $data );
        $this->uploadFiles($request,$project);
        if (strlen(trim($request->input('tags'))) > 0){
            $tags = explode(', ', $request->input('tags'));
            $project->syncTags($tags);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Project $project)
    {
        return view('frontsite.dashboard-user.projects.edit-project',['project'=>$project]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $user = Auth::user();
        $project = $user->projects()->findOrFail($project->id);

        //******************* Complete here

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //
    }

    protected function uploadFiles(Request $request , $project)
    {
        if (!$request->hasFile('files')) {
            return;
        }
        $files = $request->file('files');
//        $files = [];
        foreach ($files as $file) {
            if ($file->isValid()) {
                $path = $file->store('/files', [
                    'disk' => 'public',
                ]);
//                $files[] = $path;
                $project->files()->create([
                    'path' => $path,
                    'feature' => 1
                ]);
            }
        }

        return $files;
    }
}
