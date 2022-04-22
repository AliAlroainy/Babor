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
            'name'     => 'nullable|alpha',
            'username' => 'nullable|alpha_dash',
            'address' => 'nullable|string',
            'phone' => 'nullable|numeric|digits:9',
        ];
    }

    public function messages(){
        return [
            'name.alpha' => 'فضلا، الاسم لابد أن يكون فقط أحرف',
            'username.alpha_dash' => 'فضلا، اسم المستخدم يتكون من أحرف وأرقام و _',
        ];
    }
}
