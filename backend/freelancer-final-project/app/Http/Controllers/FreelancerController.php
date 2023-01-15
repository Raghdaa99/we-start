<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\Project;
use App\Models\Proposal;
use App\Notifications\ProposalNotification;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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
            return redirect()->route('single.project', $project->slug)
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


        $proposal = $user->proposals()->create($request->all());

        $project->user->notify(new ProposalNotification($proposal, $user));

        return redirect()->back()
            ->with('msg', 'Your proposal has been submitted')
            ->with('type', 'success');
    }

    public function getProposal($id)
    {
        $proposal = Proposal::findOrFail($id);

        return response()->json($proposal, \Illuminate\Http\Response::HTTP_OK);
    }

    public function contract(Request $request)
    {

        $validate = Validator::make($request->all(), [
            'proposal_id' => 'required|exists:proposals,id',
            'start_on' => 'required|before_or_equal:end_on',
            'end_on' => 'required|after_or_equal:start_on',
        ]);

        if (!$validate->fails()) {
            $proposal = Proposal::findOrFail($request->proposal_id);

            $request->merge([
                'project_id' => $proposal->project_id,
                'freelancer_id' => $proposal->freelancer_id,
                'type' => $proposal->project->type,
                'cost' => $proposal->cost,

            ]);
//        dd($request->all());

            if ($proposal->contract->exists){
                return response()->json(['message' => 'You already Contract with this Freelancer'], Response::HTTP_BAD_REQUEST);

            }else{
                $contract = new Contract();

                $isSaved =$contract->create($request->all());
                return response()->json(
                    ['message' => $isSaved ? 'Success Contract ' : ' failed!'],
                    $isSaved ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST
                );
            }


        } else {
            return response()->json(['message' => $validate->messages()->first()], Response::HTTP_BAD_REQUEST);
        }
    }

    public function deleteProposal($id){
        $proposal = Proposal::findOrFail($id);
        if ($proposal->contract->exists){
            return response()->json(['message' => 'You cannot delete, you contract with this freelancer'], Response::HTTP_BAD_REQUEST);

        }else{
            $isDeleted = $proposal->delete();
            return response()->json(
                ['message' => $isDeleted ? 'Success Deleted ' : 'Delete failed!'],
                $isDeleted ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST
            );
        }


    }

}
