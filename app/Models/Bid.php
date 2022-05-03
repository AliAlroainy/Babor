<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    use HasFactory;
    protected $fillable = [
        'currentPrice',
        'bidPrice',
        'bidder_id',
        'auction_id',
    ];


    public function auction(): BelongsTo
    {
        return $this->belongsTo(Auction::class, 'auction_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'bidder_id');
    }

    public function setAuctioneerIdAttribute(){
        $this->attributes['auctioneer_id'] = Auth::user()->id;
    }

    public function setCurrentPriceAttribute(){
        
        $this->attributes['currentPrice'] = $this->auction->openingBid;
    }
}
