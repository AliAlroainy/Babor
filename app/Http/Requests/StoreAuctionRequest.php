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
            'thumbnail'     => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:800',
            'car_images.*'  => 'image|mimes:jpg,png,jpeg,gif,svg|max:800',
            // 'model'         => 'required|digits:4|date|min:1900|max:'.date('Y'),
            'openingBid'    => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'minInc'        => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'carPosition'   => 'required|string|between: 5,100',
            'color'         => 'required|regex:/^[\pL\s]+$/u',
            'closeDate'     => 'required|date|after:now',
            'numberOfKillos'=> 'integer',
        ];
    }

    public function messages()
    {
        return [
            'brand_id.required'       => 'حقل الماركة مطلوب',
            'brand_id.exists'         => 'لابد أن يكون هذا الحقل موجودا بالفعل في جدول الماركات بقاعدة البيانات',
            'series_id.required'      => 'حقل نوع السيارة مطلوب',
            'series_id.exists'        => 'لابد أن يكون هذا الحقل موجودا بالفعل في جدول الأنواع بقاعدة البيانات',
            'thumbnail.image'         => 'ارفع صورة من فضلك',
            'thumbnail.mimes'         => 'الامتدادات المسموح بها للصور هي: (jpg, png, jpeg, gif, svg)',
            'thumbnail.max'           => 'أقصى حجم للصورة هو 800 كيلوبايت',
            'thumbnail.required'      => 'حقل الصورة الرئيسية مطلوب',
            'car_images.image'        => 'ارفع صورة من فضلك',
            'car_images.mimes'        => 'الامتدادات المسموح بها للصور هي: (jpg, png, jpeg, gif, svg)',
            'car_images.max'          => 'أقصى حجم للصورة هو 800 كيلوبايت',
            'model.required'          => 'حقل مودل السيارة مطلوب',
            'model.digits'            => 'عدد خانات هذا الحقل = 4',
            'model.date'              => 'هذا الحقل سنة تاريخ',
            // 'model.min'               => 'لا ندخل في مزادنا موديلات ما قبل عام 1900',
            'model.max'               => 'تأكد من سنة الموديل',
            'openingBid.required'     => 'حقل السعر الذي يبدأ به المزاد مطلوب',
            'openingBid.regex'        => 'حقل السعر الذي يبدأ به المزاد يكون أرقاما فقط',
            'minInc.required'         => 'حقل أقل سعر للمزايدة مطلوب',
            'minInc.regex'            => 'حقل أقل سعر للمزايدة يكون أرقاما فقط',
            'carPosition.required'    => 'حقل موقع السيارة مطلوب',
            'carPosition.string'      => 'وصف موقع السيارة مطلوب',
            'carPosition.between'     => 'يجب أن يكون الوصف مابين 5-50 حرف',
            'color.required'          => 'حدد لون السيارة',
            'color.not_regex'         => 'حقل لون السيارة حروف فقط',
            'closeDate.required'      => 'تحديد تاريخ انتهاء المزاد مطلوب',
            'closeDate.date'          => 'هذا الحقل يجب أن يكون تاريخا',
            'closeDate.after'         => 'تاريخ انتهاء المزاد لا يكون تاريخا قديما',
            'numberOfKillos.integer'  => 'هذا الحقل يكون أرقاماا فقط',
        ];
    }
}
