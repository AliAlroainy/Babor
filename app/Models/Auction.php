<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Auction extends Model
{
    use HasFactory;

    protected $guarded =[];

    protected $fillable = [
        'openingBid',
        'reservePrice',
        'closeDate',
        'startDate',
        'minInc',  
        'user_id',
        'car_id' 
    ];

    public function car(): BelongsTo
    {
        return $this->belongsTo(Car::class, 'car_id');
    }

    public static function getAuctionStatusValues(){
        return ['معلقة','جارية', 'ملغاة', 'مكتملة'];
    }
}
