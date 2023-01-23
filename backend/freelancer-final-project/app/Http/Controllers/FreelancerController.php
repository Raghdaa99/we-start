<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\Project;
use App\Models\Proposal;
use App\Models\User;
use App\Notifications\ProposalNotification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class FreelancerController extends Controller
{
    public function proposal_store(Request $request)
    {
//        dd($request->all());
        $validator = Validator::make($request->all(), [
            'description' => ['required', 'string'],
            'cost' => ['required', 'numeric', 'min:1'],
            'duration' => ['required', 'int', 'min:1'],
            'duration_unit' => ['required', 'in:day,week,month,year'],
        ]);

        if (!$validator->fails()) {
            $project = Project::findOrFail($request->project_id);

            if ($project->status !== 'open') {

                return response()->json(['message' => 'You cannot submit proposal to this project'], Response::HTTP_BAD_REQUEST);

            }
//
            $user = Auth::guard('web')->user();

            if ($user->proposalsProject()->find($project->id)) {

                return response()->json(['message' => 'You already submitted proposal to this project'], Response::HTTP_BAD_REQUEST);

            }


            $proposal = $user->proposals()->create($request->all());
            $proposal->load('freelancer.profile');

            $project->user->notify(new ProposalNotification($proposal, $user));


            return response()
                ->json(['message' => 'Your proposal has been submitted', 'proposal' => $proposal],
                    Response::HTTP_OK);

        } else {
            return response()->json(['message' => $validator->messages()->first()], Response::HTTP_BAD_REQUEST);

        }

    }

    public function getProposal($id)
    {
        $proposal = Proposal::findOrFail($id);

        $proposal->load('freelancer','contract');
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

            if ($proposal->contract->exists) {
                return response()->json(['message' => 'You already Contract with this Freelancer'], Response::HTTP_BAD_REQUEST);

            } else {

                $contract = new Contract();

                $isSaved = $contract->create($request->all());
                return response()->json(
                    ['message' => $isSaved ? 'Success Contract ' : ' failed!'],
                    $isSaved ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST
                );
            }


        } else {
            return response()->json(['message' => $validate->messages()->first()], Response::HTTP_BAD_REQUEST);
        }
    }


    public function update_contract(Request $request)
    {
//        dd($request->all());
        $validate = Validator::make($request->all(), [
            'contract_id' => 'required|exists:contracts,id',
            'status' => 'required|in:active,completed,terminated',
        ]);

        if (!$validate->fails()) {
            $contract = Contract::findOrFail($request->contract_id);
            if ($request->status == 'completed') {
                $contract->status = 'completed';
                $contract->completed_on = Carbon::now();
                $isUpdated = $contract->update();
                if ($isUpdated) {
                    if (Auth::user()->wallet > $contract->cost ){
                        $contract->freelancer->increment('wallet', $contract->cost / 1.2);
                        Auth::user()->decrement('wallet', $contract->cost / 1.2);

                    }else{
                        return response()->json(['message' => 'Error'], Response::HTTP_BAD_REQUEST);

                    }

                }
                return response()->json(['message' => $isUpdated ? 'Completed Project' : 'Failed'],
                    $isUpdated ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);

            }

        } else {
            return response()->json(['message' => $validate->messages()->first()], Response::HTTP_BAD_REQUEST);
        }
    }

    public function deleteProposal($id)
    {
        $proposal = Proposal::findOrFail($id);
        if ($proposal->contract->exists) {
            return response()->json(['message' => 'You cannot delete, you contract with this freelancer'], Response::HTTP_BAD_REQUEST);

        } else {
            $isDeleted = $proposal->delete();
            return response()->json(
                ['message' => $isDeleted ? 'Success Deleted ' : 'Delete failed!'],
                $isDeleted ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST
            );
        }


    }

}
