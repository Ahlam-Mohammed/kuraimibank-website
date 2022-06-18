<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CityResource extends JsonResource
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
            'name'       => $this->name,
            'is_active'  => $this->is_active,
            'country_id' => $this->country_id,
            'country'    => new CountryResource($this->country),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
