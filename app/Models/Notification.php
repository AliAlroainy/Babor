<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'auction_id',
        'state',
        'message',
        'link',
    ];


    public function auction(): BelongsTo
    {
        return $this->belongsTo(Auction::class, 'auction_id');
    }

}
