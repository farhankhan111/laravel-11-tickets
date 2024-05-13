<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Order extends Model
{
    use HasFactory;


    public function getClassAttribute($value): string
    {
        return ucfirst($value);
    }

    public function getTypeAttribute($value): string
    {
        return ucwords($value);
    }


    public function trips(): HasMany
    {
        return $this->hasMany(Trip::class);
    }

    public function tickets(): HasMany
    {
        return $this->hasMany(Ticket::class);
    }


    public function contact(): BelongsTo
    {
        return $this->belongsTo(Contact::class);
    }


    public function origin(): BelongsTo
    {

        return $this->belongsTo(City::class,'origin_code','code');
    }


    public function destination(): BelongsTo
    {

        return $this->belongsTo(City::class,'destination_code','code');
    }

    public function scopeWithOriginDestination($query)
    {
        return $query->with('origin.country', 'destination.country');
    }



}
