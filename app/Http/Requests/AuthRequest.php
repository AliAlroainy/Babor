<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'password'        => 'required|min:5',
        'confirm_password'=> 'same:password'
    ];
        return $rules;
    }
}
