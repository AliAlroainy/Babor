<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auction extends Model
{
    use HasFactory;

    protected $guarded =[];

    protected $fillable = [
        'startPrice',
        'closeDate',
        'startDate',
        'minInc',  
        'user_id',  
    ];

    public function car(): HasOne
    {
        return $this->hasOne(Car::class, 'car_id');
    }

}
