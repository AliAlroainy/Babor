<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'brand_id',
        'series_id',
        'model',
        'color',
        'numberOfKillos',
        'carPosition',
        'thumbnail',
        'car_images',
    ];


    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    
    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function series(): BelongsTo
    {
        return $this->belongsTo(Series::class, 'series_id');
    }

    public function auction(): HasOne
    {
        return $this->hasOne(Auction::class, 'car_id');
    }

    public static function getStatusAttribute($key){
        return $key == 0 ? 'جديدة' : 'مستعملة';
    }

    public static function getSizOfDamageValues(){
        return ['لا يوجد', 'سطحي', 'متوسط', 'كبير'];
    }
}
