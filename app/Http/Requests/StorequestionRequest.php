<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorequestionRequest extends FormRequest
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
     * @return array
     */
   
    public function rules()
    {
        return [
            'question'         => 'required|between:10,40',
            'answer'   => 'required|between:10, 200',
           
        ];
    }
    public function messages(){
        return [
            'question.required'        => 'هذا الحقل مطلوب',
            'question.between'         => 'العنوان لايقل عن 10 أحرف ولا يزيد عن 20 حرف',
            'answer.required'  => 'هذا الحقل مطلوب',
            'answer.between'   => 'الاجابة لايقل عن 10 أحرف ولا يزيد عن 200 حرف',
            

        ];
    }

}
