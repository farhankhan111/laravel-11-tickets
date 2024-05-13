<?php

namespace App\Http\Resources\front;

use App\Http\Resources\CityResource;
use App\Http\Resources\ContactResource;
use App\Http\Resources\CountryResource;
use App\Http\Resources\TicketResource;
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
            'origin_code' => $this->origin_code,
            'destination_code' => $this->destination_code,
            'departure_date' => date('D, d/m',strtotime($this->departure_date)),
            'return_date' => $this->return_date ? date('D, d/m',strtotime($this->return_date)) : '',
            'type' => $this->type,
            'class' => $this->class,
            //'phone' => $this->phone,
            'trips' => TripResource::collection($this->whenLoaded('trips')),
            'tickets' => TicketResource::collection($this->whenLoaded('tickets')),
            'origin' => new CityResource($this->whenLoaded('origin')),
            'destination' => new CityResource($this->whenLoaded('destination'))

            // 'country' =>$this->country,

            //'contact' => new ContactResource($this->whenLoaded('contact'))

        ];
    }
}
