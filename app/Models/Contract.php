<?php

namespace App\Models;

use App\Models\Auction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contract extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'payment_bill_id',
        'buyer_confirm', 
        'seller_confirm',
        'buyer_undoReason',
    ];

    public function payment_bill(): BelongsTo 
    {
        return $this->belongsTo(Payment_Bill::class, 'payment_bill_id');
    }

    public static function siteDeduction($auction_id, $commission){
        Auction::whereId($auction_id)->update(['commission' => $commission]);
    }

    
}
