<?php

namespace App\Http\Requests;

use App\Models\Auction;
use Illuminate\Foundation\Http\FormRequest;

class StoreBidRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $id = $this->route('auction');
        dd($id);
        return [
            'bidPrice' => 'required|numeric|min:'.Auction::where('id', $id)->first()->minInc,
        ];
    }

    public function messages()
    {
        return [
            'bidPrice.required' => 'هذا الحقل مطلوب',
            'bidPrice.numerice' => 'هذاالحقل يجب أن يكون رقما',
            'bidPrice.min' => 'أقل سعر تستطيع المزايدة به هو : '.Auction::where('id', $id)->first()->minInc,
        ];
    }
}
