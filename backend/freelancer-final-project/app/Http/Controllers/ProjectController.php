<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\Models\Category;
use App\Models\Image;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

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
//        dd($project->files);
        return view('frontsite.dashboard-user.projects.edit-project',
            [
                'project'=>$project,
                'categories' => Category::all(),
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Project $project)
    {
        $user = Auth::user();
        $project = $user->projects()->findOrFail($project->id);

        //******************* Complete here

        $data = $request->except('files');

        $isUpdated =$project->update( $data );
        $this->uploadFiles($request,$project);
        if (strlen(trim($request->input('tags'))) > 0){
            $tags = explode(', ', $request->input('tags'));
            $project->syncTags($tags);
        }

       return response()->json(
           ['message' => $isUpdated ? 'Success Updated ' : 'Failed Updated!'],
           $isUpdated ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Project $project)
    {
        $user = Auth::user();
        $project = $user->projects()->findOrFail($project->id);
        $isDeleted=$project->delete();

        $project->files()->delete();

        foreach ($project->files as $file) {
            File::delete(public_path('storage/' . $file->path));
        }

        return response()->json(
            ['message' => $isDeleted ? 'Success Deleted ' : 'Delete Updated!'],
            $isDeleted ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
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
                    'feature' => 1,
                    'name' => explode('.',$file->getClientOriginalName())[0],
                ]);
            }
        }

        return $files;
    }

    public function deleteFile($id)
    {
        $image = Image::findOrFail($id);
        $isDeleted = $image->delete();
        File::delete(public_path('storage/' . $image->path));
        return response()->json(
            ['message' => $isDeleted ? 'Success Deleted ' : 'Delete failed!'],
            $isDeleted ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST
        );
    }
}
