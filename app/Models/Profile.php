<?php

namespace App\Models;

use App\Enums\Gender;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profile extends Model
{
    use HasFactory;
    protected $fillable = [
        'username',
        'avatar',
        'phone',
        'address',
    //     'job',
    //     'city'    ,

    //  'bio'     ,
    ];

    protected $casts = [
        'gender' => Gender::class,
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
