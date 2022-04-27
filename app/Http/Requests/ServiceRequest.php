<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title'         => 'required|between:6,20',
            'description'   => 'required|between:10, 200',
            'pic'           =>'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ];
    }
    public function messages(){
        return [
            'title.required'        => 'هذا الحقل مطلوب',
            'title.between'         => 'العنوان لايقل عن 6 أحرف ولا يزيد عن 20 حرف',
            // 'title.unique'          => 'هذه الخدمة مسجلة من قبل',
            'description.required'  => 'هذا الحقل مطلوب',
            'description.between'   => 'الوصف لايقل عن 10 أحرف ولا يزيد عن 200 حرف',
            'pic.image'             => 'ارفع صورة من فضلك',
            'pic.mimes'             => 'الامتدادات المسموح بها للصور هي: (jpg, png, jpeg, gif, svg)',
            'pic.max'               => 'أعلى حجم للصورة مسموح به هو  2048 بايت',

        ];
    }
}
