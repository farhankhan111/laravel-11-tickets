<?php

namespace App\Http\Resources\front;

use App\Http\Resources\ContactResource;
use App\Http\Resources\TripResource;
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
            'departure_date' => date('D, d/m',strtotime($this->departure_date)),
            'return_date' => $this->return_date ? date('D, d/m',strtotime($this->return_date)) : '',
            'type' => $this->type,
            'class' => $this->class,
            //'phone' => $this->phone,
            'trips' => TripResource::collection($this->whenLoaded('trips')),
            //'contact' => new ContactResource($this->whenLoaded('contact'))

        ];
    }
}
