<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewsRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'=>'required|between:3,20',
            'email'=>'required|email',
            'rating'=>'required',
            'phone'=>'required|',
    
        ];
    }

    public function messages(){
        return [
            'name.required' => 'حقل الاسم مطلوب',
            'name.between'  => 'مسموح بالإدخال مابين 3 إلى 20 أحرف',
            'email.required'  =>  'حقل الايميل مطلوب',
            'email.email'  => 'صيغة الايميل خاطئة',
            'star_rating.required'  =>'حقل التقييم مطلوب',
        ];
    }
}
