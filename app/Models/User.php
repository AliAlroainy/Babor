<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Bavix\Wallet\Traits\HasWallet;
use Bavix\Wallet\Interfaces\Wallet;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use Laratrust\Traits\LaratrustUserTrait;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class User extends Authenticatable  implements Wallet
{
    use LaratrustUserTrait;
    use HasApiTokens, HasFactory, Notifiable, HasWallet;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profile(): HasOne
    {
        return $this->hasOne(Profile::class, 'user_id');
    }

    public function auctions(): HasMany
    {
        return $this->hasMany(Auction::class, 'auctioneer_id');
    }

    public function bids(): HasMany
    {
        return $this->hasMany(Bid::class, 'bidder_id');
    }

    public function favorite(): BelongsToMany
    {
        return $this->belongsToMany(Auction::class, 'favorites')->withTimestamps();
    }

    public function favoriteHas($auction_id)
    {
        return self::favorite()->where('auction_id', $auction_id)->exists();
    }

    // public const PASSWORD_VALIDATION_RULES  = [
    //     'password'        => 'required|min:5',
    //     'confirm_password'=> 'same:password'
    // ];
    public function messages()
    {
        return $this->hasMany(Message::class);
    }
    public function ReviewData()
    {
    return $this->hasMany('App\Models\ReviewRating','user_id');
    }
}
