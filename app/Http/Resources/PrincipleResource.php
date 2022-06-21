<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PrincipleResource extends JsonResource
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
            'id'         => $this->id,
            'title'      => $this->title,
            'desc'       => $this->desc,
            'is_active'  => $this->is_active,
            'created_at' => $this->created_at->format('Y/m/d - h:m A'),
            'updated_at' => $this->updated_at->format('Y/m/d - h:m A')
        ];
    }
}
