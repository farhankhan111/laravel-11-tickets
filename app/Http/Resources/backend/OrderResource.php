<?php

namespace App\Http\Resources\backend;

use App\Http\Resources\ContactResource;
use App\Http\Resources\TripResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'origin_code' => $this->origin_code,
            'destination_code' => $this->destination_code,
            'departure_date' => $this->departure_date,
            'return_date' => $this->return_date,
            'type' => $this->type,
            'phone' => $this->phone,
            'stage' => $this->stage,
            'created_at' => $this->created_at,
            'trips' => TripResource::collection($this->whenLoaded('trips')),
            'contact' => new ContactResource($this->whenLoaded('contact'))

        ];
    }
}
