<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class QuestionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public static $wrap = 'question';
    public function toArray($request)
    {
        return [
            'id' => $this->resource->id,
            'question' => $this->resource->question,
            'image' => $this->resource->image,
            'category' => $this->resource->category,
            'user' => $this->resource->user_id
        ];
    }
}
