<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'=>'required','between:3,10',
            'logo'=>'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ];
    }

    public function messages(){
        return [
            'name.required' => 'حقل البراند مطلوب',
            'name.between'  => 'مسموح بالإدخال مابين 3 إلى 10 أحرف',
            'logo.image'  => 'ارفع صورة من فضلك',
            'logo.mimes'  => 'الامتدادات المسموح بها للصور هي: (jpg, png, jpeg, gif, svg)',
            'logo.max'  => 'أعلى حجم للصورة مسموح به هو  2048 بايت',
        ];
    }
}
