<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    protected $guarded=[];
    // protected $fillable = ['message'];
    // protected $fillable = [
    //     'message',
    //     'user_id',
    //     'receiver_id',
    //     'image'

    // ];
    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
