<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand_id',
        'series_id',
        'model',
        'color',
        'numberOfKillos',
        'carPosition',
        'thumbnail',
    ];

    public function auction(): BelongsTo
    {
        return $this->belongsTo(Auction::class, 'car_id');
    }
}
