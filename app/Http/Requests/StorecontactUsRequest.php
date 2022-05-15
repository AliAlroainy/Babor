<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorecontactUsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required|regex:/^[\pL\s]+$/u','min:3'],
            'email'=> ['required','email'],
            'phone'=> 'regex:/^[1-9][0-9]+/|digits:9|starts_with:77,73,71,70',
            'title'=> 'string|between:10,100',
            'message'=> 'required|string|between:20,100',
           
        ];
    }
    public function messages(){
        return [
    'name.required'=>'الرجاء ادخال الاسم',
    'name.min'=>'يجب الايقل عدد احرف الاسم عن 3 احرف','email.unique'=>'هذا البريد موجود مسبقا',
    'email.required'=>'الرجاءادخال عنوان البريد الالكتروني',
    'email.email'=>'الرجاءادخال عنوان بريد صالح',
    'phone.digits'=> 'أرقام الهواتف لا تزيد عن 9 خانات',
    'phone.starts_with'=>'أرقام الهواتف في اليمن تبدأ بـ (77,73,71,70)',
    'phone.regex'=> 'صيغة غير صحيحة لرقم الهاتف',
    'title.between'=> 'لابد أن يكون العنوان مابين 10-100 حرف',
     'title.string' => 'لابد أن تكون العنوان نصا',
     'message.between'=> 'لابد أن يكون العنوان مابين 20-100 حرف',
     'message.string' => 'لابد أن تكون الرسالة نصا',
     'message.required' => '  محتوى الرسالة مطلوب' ,


        ];
    }
}
