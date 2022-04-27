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
            'address'  => 'nullable|string',
            'phone'    => 'nullable|regex:/^[1-9][0-9]+/|digits:9|starts_with:77,73,71,70',
            'bio'      => 'nullable|between:5,100',
            'job'      => 'nullable|string|between:5,20',
            'city'     => 'nullable|string|between:2,12',
        ];
    }

    public function messages(){
        return [
            'name.required'       => 'فضلا، هذا الحقل مطلوب',
            'name.regex'          => 'فضلا، الاسم لابد أن يكون فقط أحرف',
            'username.alpha_dash' => 'فضلا، اسم المستخدم يتكون من أحرف وأرقام و _ و لا يسمح بالفراغات',
            'username.string'     => 'فضلا، العنوان تستطيع كتابته بالأحرف والأرقام إن لزم الأمر',
            'phone.regex'         => 'صيغة غير صحيحة لرقم الهاتف',
            'phone.digits'        => 'أرقام الهواتف لا تزيد عن 9 خانات',
            'phone.starts_with'   => 'أرقام الهواتف في اليمن تبدأ بـ (77,73,71,70)',
            'bio.between'         => 'لابد أن يكون الكلام مابين 5-100 حرف',
            'job.between'         => 'لابد أن يكون مدخلك مابين 5-20 حرف',
            'job.string'          => 'لابد أن تكون المهنة نصا',
            'city.between'        => 'لابد أن يكون مدخلك مابين 2-12 حرف',
            'city.string'         => 'لابد أن تكون المدينة نصا',
        ];
    }
}
