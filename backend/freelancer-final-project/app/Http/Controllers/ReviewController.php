<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller
{
    public function getReviews()
    {
        $reviews = Review::whereHas('project', function ($query) {
            $query->where('user_id', Auth::id());
        })->latest()->get();
//        dd($reviews);
        return view('frontsite.dashboard-user.reviews', ['reviews' => $reviews]);
    }

    public function getReview($id)
    {
        $review = Review::findOrFail($id);
        $review->load('project', 'freelancer');
        return response()->json($review, \Illuminate\Http\Response::HTTP_OK);
    }

    public function storeReviews(Request $request)
    {
//        dd($request->all());

        $validator = $this->validator($request->all());

        if (!$validator->fails()) {

            $isSaved = Review::create($request->all());
            return response()->json(
                ['message' => $isSaved ? 'Success Review ' : ' failed!'],
                $isSaved ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST
            );


        } else {
            return response()->json(['message' => $validator->messages()->first()], Response::HTTP_BAD_REQUEST);

        }

    }

    public function updateReviews(Request $request, $id)
    {
        $review = Review::where('id', $id)->first();
        if (!$review) {
            return response()->json(['message' => 'not found review'], Response::HTTP_BAD_REQUEST);

        }
        $validator = Validator::make($request->all(), [
            'star' => 'required|numeric',
            'comment' => 'required',
        ]);

        if (!$validator->fails()) {
            $isSaved = $review->update([
                'star' => $request->star,
                'comment' => $request->comment
            ]);
            return response()->json(
                ['message' => $isSaved ? 'Success updated ' : ' failed!'],
                $isSaved ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST
            );


        } else {
            return response()->json(['message' => $validator->messages()->first()], Response::HTTP_BAD_REQUEST);

        }

    }

    public function destroyReviews(Request $request, $id)
    {


    }

    public function validator($data)
    {
        return $validator = Validator::make($data, [
            'freelancer_id' => 'required|numeric|exists:users,id',
            'project_id' => 'required|numeric|exists:projects,id',
            'contract_id' => 'required|numeric|exists:contracts,id',
            'star' => 'required|numeric',
            'comment' => 'required',
        ]);
    }
}
