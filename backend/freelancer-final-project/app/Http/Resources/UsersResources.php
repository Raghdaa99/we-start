<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class UsersResources extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
                'user_id'=>$this->user_id,
                'image_url'=>$this->user->imageUrl,
                'username'=>$this->user->name,
                'messages'=>$this->message,
//                'time'=>Carbon::diffForHumans($this->created_at),

        ];
    }
}
