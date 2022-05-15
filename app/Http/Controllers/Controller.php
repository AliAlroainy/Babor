<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    // public $apiURL = 'https://waslpayment.com/api/test/merchant/payment_order';
    // public $headers = [
    //     'private-key' => 'rRQ26GcsZzoEhbrP2HZvLYDbn9C9et',
    //     'public-key' => 'HGvTMLDssJghr9tlN9gr4DVYt0qyBy',
    //     'Content-Type' => 'application/x-www-form-urlencoded'
    // ];
    // public function apiConnect($ref, $product, $total, $meta){
    //     $data = [
    //         "order_reference" => $ref,
    //         "products"=> [$product],
    //         "total_amount" => $total,
    //         "currency" => "YER",
    //         "success_url" => "http://localhost:8000/payment/success",
    //         "cancel_url"=> "http://localhost:8000/payment/failed",
    //         "metadata"=> (object)$meta,
    //     ];
    //     $response = Http::withHeaders($this->headers)->post($this->apiURL, $data);
    //     // $statusCode = $response->status();
    //     // $responseBody = json_decode($response->getBody(), true);
    //     // echo $statusCode;  // status code
    //     // return response($responseBody); // body response
    //     return $response->json($key = null);
    //     Payments::create('user_id', Auth::id())
    //             ->where('limit', '<=', 4)
    //             ->where('limit', '>=', 0)
    //             ->decrement('limit');
    // }

}
