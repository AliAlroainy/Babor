<?php

namespace App\Models;

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

    
}
