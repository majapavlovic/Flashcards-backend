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
    public function toArray($request)
    {
        return [
            'id' => $this->resource->id,
            'question' => $this->resource->question,
            'image_id' => $this->resource->image_id,
            'category_id' => $this->resource->category_id,
            'user_id' => $this->resource->user_id
        ];
    }
}
