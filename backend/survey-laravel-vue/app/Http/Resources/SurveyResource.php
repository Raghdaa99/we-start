<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

class SurveyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'description' => $this->description,
            'image' => '/storage/' . $this->image,
            'status' => (bool)$this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
//            'expire_date' => Carbon::createFromFormat('Y-m-d H:i:s', $this->expire_date)->format('Y-m-d'),
            'expire_date' => (new \DateTime($this->expire_date))->format('Y-m-d'),
            'questions' => SurveyQuestionResource::collection($this->questions),
        ];
    }
}
