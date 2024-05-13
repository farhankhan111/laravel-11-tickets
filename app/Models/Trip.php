<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Trip extends Model
{
    use HasFactory;

    public function flights(): HasMany
    {
        return $this->hasMany(Flight::class);
    }

    public function fares(): HasOne
    {
        return $this->hasOne(Fare::class);
    }

    public function tickets(): HasOne
    {
        return $this->hasOne(Ticket::class);
    }
}
