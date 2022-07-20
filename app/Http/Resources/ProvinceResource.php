<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProvinceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this?->id,
            'country_id' => $this?->country_id,
            'name' => $this?->name,
            'code' => $this?->code,
            'short_code' => $this?->short_code,
            'status' => $this?->status,
            'zone_number' => $this->counties?->max('zone')
        ];
    }
}
