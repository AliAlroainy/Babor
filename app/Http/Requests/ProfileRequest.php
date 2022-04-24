<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'     => 'required|regex:/^[\pL\s]+$/u',
            'username' => 'nullable|alpha_dash',
            'address' => 'nullable|string',
            'phone' => 'nullable|regex:/^[1-9][0-9]+/|not_in:0|digits:9|starts_with:77,73,71,70',
            'bio' => 'nullable|min:5|max:100',
        ];
    }

    public function messages(){
        return [
            'name.alpha'          => 'فضلا، الاسم لابد أن يكون فقط أحرف',
            'username.alpha_dash' => 'فضلا، اسم المستخدم يتكون من أحرف وأرقام و _ و لا يسمح بالفراغات',
            'username.string'     => 'فضلا، العنوان تستطيع كتابته بالأحرف والأرقام إن لزم الأمر',
            'phone.regex'         => 'صيغة غير صحيحة لرقم الهاتف',
            'phone.digits'        => 'أرقام الهواتف لا تزيد عن 9 خانات',
            'phone.starts_with'   => 'أرقام الهواتف في اليمن تبدأ بـ (77,73,71,70)',
            'bio.min'             => 'لابد أن يكون الكلام مابين 5-100 حرف',
            'bio.max'             => 'لابد أن يكون الكلام مابين 5-100 حرف',
        ];
    }
}
