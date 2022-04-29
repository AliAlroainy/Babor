<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAuctionRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'brand_id'      =>'required|exists:brands,id',
            'car_images'    => 'nullable',
            'car_images.*'  => 'image|mimes:jpg,png,jpeg,gif,svg|max:200',
        ];
    }
}
