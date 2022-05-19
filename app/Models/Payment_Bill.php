<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment_Bill extends Model
{
    use HasFactory;
    protected $table = 'payment_bills';
    const UPDATED_AT = null;

    protected $fillable = [
        'invoice_reference',
        'created_at', 
        'payment_status',
        'bid_id',  
    ];

    public function bid(): BelongsTo
    {
        return $this->belongsTo(Bid::class, 'bid_id');
    }
    
    public function contract(): HasOne
    {
        return $this->hasOne(Contract::class, 'payment_bill_id');
    }
}

