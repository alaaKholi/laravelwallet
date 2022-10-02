<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        //dd($request);
        return [
            'id'=>$this->id,
            'text'=>$this->text,
            'user_id'=>$this->user_id,
            'likes' => $this->likes,
            'comments'=>CommentResource::collection($this->comments),
       ];
    }
}