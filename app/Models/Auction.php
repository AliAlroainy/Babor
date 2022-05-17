<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Auction extends Model
{
    use HasFactory;
    public function ReviewData()
    {
    return $this->hasMany('App\Models\ReviewRating','auction_id');
    }
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
    // public function setCommissionAttribute(){
    //     $this->attributes['commission'] = 10;
    // }
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
        return ['معلقة', 'مرفوضة', 'جارية', 'ملغاة', 'غير مكتملة', 'مكتملة'];
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

    public static function getAuctions($status) {
        $auctions = DB::table('auctions');
        // Filter By Brand
        // if($brand) {
        //     $auctions = $auctions->where('auctions.car.brand', $brand);
        // }

        // // Filter By Series
        // if($series_item) {
        //     $auctions = $auctions->where('auctions.car.series', $series_item);
        // }

        // Filter By status
        if ($status && $status != 'All') {
            $auctions = $auctions->where('auctions.status', $status);
        }
        
        return $auctions->get();
    }

}
