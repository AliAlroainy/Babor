<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'     => 'nullable|string',
            'email'    => 'nullable|email|unique:users',
            'username' => 'nullable|string',
            'address' => 'nullable|string',
            'phone' => 'nullable|string',
        ];
    }

    public function messages(){
        return [
            'name.string' => 'فضلا، الاسم يتكون من أحرف',
            'email.email' => 'ادخل إيميل صالح',
            'email.unique' => 'هذا الإيميل مسجل به من قبل',
            'name.string' => 'فضلا، الاسم يتكون من أحرف',
        ];
    }
}
