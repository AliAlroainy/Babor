<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
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
        'auctioneer_id',
        'car_id' 
    ];

    public function car(): BelongsTo
    {
        return $this->belongsTo(Car::class, 'car_id');
    }

    // public function setAuctioneerIdAttribute(){
    //     $this->attributes['auctioneer_id'] = Auth::user()->id;
    // }

    // public function setStartDateAttribute(){
    //     $this->attributes['startDate'] = now();
    // }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'auctioneer_id');
    }

    public static function getAuctionStatusValues(){
        return ['معلقة','جارية', 'ملغاة', 'مكتملة'];
    }

    public static function matchAuctionStatus($status){
        return Auction::getAuctionStatusValues()[$status];
    }

    public function type_and_model(){
        return $this->car->series->name.'  '. $this->car->model;
    }

    public function bids(): HasMany
    {
        return $this->hasMany(Bid::class, 'auction_id');
    }

        // public function setOpeningBid(){
    //     $this->attributes['openingBid'] = $this->openingBid;
    // }

}
