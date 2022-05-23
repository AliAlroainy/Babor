<?php

namespace Tests\Feature;

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Contracts\Cookie\Factory;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Testing\Fluent\AssertableJson;

class AuctionTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

public function test_it_stor_auction(){

    Auth::check();
    $user=User::factory()->create()->attachRole('admin');
    $this->ActingAs($user);
    $response = $this->post('/save_post', [

    'category_id' => '1',
     'brand_id' => '1',
     'model' => '2020',
     'description' =>'لايوجد',
     'openingBid' =>'500',
     'numberOfKillos' =>'100',
     'color' =>'blue',
     'thumbnail' =>'car.jpg',
     'car_images' =>['car.jpg','car.png'],
     'carPosition' =>'Taiz',
     'sizOfDamage' =>'1',
     'car_id' =>'2',
     'reservePrice' =>'7000',
     'auctioneer_id' =>'1',
     'start_date' =>now(),
     

    ]);

    $response->assertRedirect('/');
}





}
