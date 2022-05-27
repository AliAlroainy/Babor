<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeriesRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'  =>'required|between:3,50',
            'brand_id' =>'required|exists:brands,id',
        ];
    }

    public function messages(){
        return [
            'name.required' => 'حقل اسم السلسلة مطلوب',
            'name.between'  => 'مسموح بالإدخال مابين 3 إلى 10 أحرف',
            'brand_id.required' => 'حقل اسم الماركة المنتمي إليها مطلوب',
            'brand_id.exists'  => 'لابد أن يكون هذا الحقل موجودا بالفعل في جدول البراند بقاعدة البيانات',
        ];
    }
}
