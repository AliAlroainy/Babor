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
            'brand_id'      => 'required|exists:brands,id',
            'series_id'     => 'required|exists:series,id',
            'thumbnail'     => 'image|mimes:jpg,png,jpeg,gif,svg|max:200',
            'car_images.*'  => 'image|mimes:jpg,png,jpeg,gif,svg|max:200',
            'model'         => 'required|digits:4|integer|min:1900|max:'.date('Y'),
            'startPrice'    => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'minInc'        => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'carPosition'   => 'required|string|between: 5,10',
            'color'         => 'required|not_regex:/[1-9]/',
            'closeDate'     => 'required|date|after:now',
            'numberOfKillos'=> 'required|integer',
        ];
    }
}
