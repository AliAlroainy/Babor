<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            //
            'name'=>['required','min:3'],
            'email'=>['required','email','unique:users,email'],
            'password' => 'required|min:6',
            'confirm_password'=> 'required|same:password'
        ];
    }
    public function messages(){
        return [
            'name.required'=>'الرجاء ادخال الاسم',
            'name.min'=>'يجب الايقل عدد احرف الاسم عن 3 احرف',
            'email.unique'=>'هذا البريد موجود مسبقا',
            'email.required'=>'الرجاءادخال عنوان البريد الالكتروني',
            'email.email'=>'الرجاءادخال عنوان بريد صالح',
            'password.required'=>'الرجاءادخال كلمة السر',
            'password.min'=> 'يجب الايقل عدد احرف كلمة السر عن 6 احرف',
            'confirm_pass.same'=>'كلمة المرور لا تتطابق',
        ];
    }
}
