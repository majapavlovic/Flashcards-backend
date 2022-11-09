<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AnswerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public static $wrap = 'answer';
    public function toArray($request)
    {
        return [
            'id' => $this->resource->id,
            'answer' => $this->resource->answer,
            'question' => $this->resource->question,
            'image' => $this->resource->image,
            'is_correct' => $this->resource->is_correct
        ];
    }
}
