<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ServicePointResource extends JsonResource
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
            'id'            => $this->id,
            'name'          => $this->name,
            'address'       => $this->address,
            'phone'         => $this->phone,
            'second_phone'  => $this->second_phone,
            'working_hours' => $this->working_hours,
            'category'      => $this->category,
            'lng'           => $this->lng,
            'lat'           => $this->lat,
            'is_active'     => $this->is_active,
            'city_id'       => $this->city_id,
            'city'          => new CityResource($this->city),
            'created_at'    => $this->created_at->format('Y/m/d - h:m A'),
            'updated_at'    => $this->updated_at->format('Y/m/d - h:m A'),
        ];
    }
}
