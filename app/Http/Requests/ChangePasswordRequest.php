<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'new_password'        => 'required|min:5',
            'confirm_new_password'=> 'required|same:new_password'
        ];
    }

    public function messages(){
        return [
            'new_password.required'    => 'حقل كلمة السر الجديدة مطلوب',
            'new_password.min'    => 'كلمة السر لا تقل عن 5 أحرف',
            'confirm_new_password.required'    => 'حقل تأكيد كلمة السر مطلوب',
            'confirm_new_password.same'=> 'كلمة السر غير متطابقة',
        ];
    }
}
