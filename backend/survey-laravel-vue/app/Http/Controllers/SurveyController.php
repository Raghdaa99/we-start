<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSurveyRequest;
use App\Http\Resources\SurveyResource;
use App\Models\Survey;
use App\Models\SurveyQuestion;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Http\Response;

class SurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Request $request)
    {
        $user = $request->user();
        return SurveyResource::collection(Survey::where('user_id', '=', $user->id)->paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return SurveyResource
     */
    public function store(StoreSurveyRequest $request)
    {
        $data = $request->except('image');
        if ($request->hasFile('image')) {
            $data['image'] = $this->upload($request->file('image'));
        }

        $survey = Survey::create($data);

        $questions = json_decode($data['questions']);
        foreach ($questions as $question) {
            $questionArr = (array)$question;
            $questionArr['survey_id'] = $survey->id;
            $this->createQuestion($questionArr);
        }

        return new SurveyResource($survey);
    }


    /**
     * Display the specified resource.
     *
     * @param Survey $survey
     * @param Request $request
     * @return SurveyResource
     */
    public function show(Survey $survey, Request $request)
    {
        $user = $request->user();
        if ($user->id !== $survey->user_id) {
            return abort(403, 'Unauthorized action.');
        }

//        dd($survey);
        return new SurveyResource($survey);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Survey $survey
     * @return SurveyResource
     */
    public function update(Survey $survey, Request $request)
    {

//        dd($request->questions);
        $data = $request->except('image');
        if ($request->hasFile('image')) {
            $data['image'] = $this->upload($request->file('image'));
        }
        $old_image = $survey->image;
        $survey->update($data);
//
        if ($old_image != $survey->image) {
            Storage::disk('public')->delete($old_image);
        }

        // update Questions ----------------->>>>>>>>>>>>>>>


        return new SurveyResource($survey);
    }


    private function createQuestion($data)
    {
        $validator = Validator::make($data, [
            'question' => 'required|string',
            'type' => ['required', Rule::in([
                Survey::TYPE_TEXT,
                Survey::TYPE_TEXTAREA,
                Survey::TYPE_SELECT,
                Survey::TYPE_RADIO,
                Survey::TYPE_CHECKBOX,
            ])],
            'description' => 'nullable|string',
            'data' => 'present',
            'survey_id' => 'exists:App\Models\Survey,id'
        ]);

        return SurveyQuestion::create($validator->validated());

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param Survey $survey
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Survey $survey, Request $request)
    {
        $user = $request->user();
        if ($user->id != $survey->user_id) {
            return abort(403, 'Unauthorized');
        }
        $isDeleted = $survey->delete();
        if ($survey->image){
            Storage::disk('public')->delete($survey->image);
        }

        return response()->json(
            ['message' => $isDeleted ? 'Success Deleted ' : 'Delete failed!'],
            $isDeleted ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST
        );
    }

    protected function upload(UploadedFile $file)
    {
        return $file->store('images_surveys', [
            'disk' => 'public'
        ]);
    }


}
