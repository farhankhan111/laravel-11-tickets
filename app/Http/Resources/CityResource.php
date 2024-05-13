<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CityResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $country = new CountryResource($this->whenLoaded('country'));

        return [
            'city_name' => $this->name,
            'city_code' => $this->code,
            'country_code' => $country->code ?? '',
            'country_name' => $country->country ?? ''

        ];
    }
}
