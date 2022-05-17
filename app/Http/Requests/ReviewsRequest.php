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
            'rating'=>'required',
        
    
        ];
    }

    public function messages(){
        return [
            'name.required' => 'حقل الاسم مطلوب',
            'name.between'  => 'مسموح بالإدخال مابين 3 إلى 20 أحرف',
            'rating.required'  =>'حقل التقييم مطلوب',
        ];
    }
}
