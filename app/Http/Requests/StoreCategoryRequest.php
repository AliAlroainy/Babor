<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
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
            'name'=>'required|between:3,10',
            'image'=>'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ];
    }
    public function messages(){
        return [
            'name.required' => 'حقل البراند مطلوب',
            'name.between'  => 'مسموح بالإدخال مابين 3 إلى 10 أحرف',
            'image.image'  => 'ارفع صورة من فضلك',
            'image.mimes'  => 'الامتدادات المسموح بها للصور هي: (jpg, png, jpeg, gif, svg)',
            'image.max'  => 'أعلى حجم للصورة مسموح به هو  2048 بايت',
        ];
    }
}
