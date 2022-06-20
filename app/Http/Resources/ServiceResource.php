<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ServiceResource extends JsonResource
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
            'id'                 => $this->id,
            'name'               => $this->name,
            'desc'               => $this->desc,
            'background'         => $this->background,
            'image'              => $this->image,
            'other_advantage'    => $this->other_advantage,
            'service_condition'  => $this->service_condition,
            'is_active'          => $this->is_active,
            'sub_category_id'    => $this->sub_category_id,
            'category_id'        => $this->category_id,
            'subCategory'       => new SubCategoryResource($this->subCategory),
            'category'           => new CategoryResource($this->category),
            'created_at'         => $this->created_at->format('Y/m/d - h:m A'),
            'updated_at'         => $this->updated_at->format('Y/m/d - h:m A'),

        ];
    }
}
