<?php

namespace App\Http\Resources;

use App\Models\Contact;
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
            'origin' => $this->origin,
            'destination' => $this->destination,
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
