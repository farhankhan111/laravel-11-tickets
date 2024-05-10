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

    public function contact(): BelongsTo
    {
        return $this->belongsTo(Contact::class);
    }
}
