<?php

namespace App\Http\Livewire;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\Auction;
use App\Models\Brand;
use App\Models\Series;
use App\Models\Category;
use Illuminate\Support\Facades\Http;
class Auctions extends Component
{
    public $pe_page = 6;
    public function mount()
    {
        // Auction::loginUsingId(1);
        
    }
    public function load()
    {
      $this->pe_page +=6;
        
    }
    public function load2()
    {
      $this->pe_page +=6;
        
    }
    public function render()
    {$auctions = Auction::with(['car' => function ($q) {
        $q->select('brand_id', 'series_id', 'model', );
    }]);
    $last_cars = Auction::with(['car' => function ($q){
        return $q->where('category_id', 1)->get();
    }])->where('status', '2')->orderBy('id', 'desc')->paginate($this->pe_page);
    $last_salons = Auction::with(['car' => function ($q){
        return $q->where('category_id', 2)->get();
    }])->where('status', '2')->orderBy('id', 'desc')->paginate($this->pe_page);
    $last_taxis = Auction::with(['car' => function ($q){
        return $q->where('category_id', 3)->get();
    }])->where('status', '2')->orderBy('id', 'desc')->paginate($this->pe_page);
    $last_babors = Auction::with(['car' => function ($q){
        return $q->where('category_id', 4)->get();
    }])->where('status', '2')->orderBy('id', 'desc')->paginate($this->pe_page);
    $last_buses = Auction::with(['car' => function ($q){
        return $q->where('category_id', 5)->get();
    }])->where('status', '2')->orderBy('id', 'desc')->paginate($this->pe_page);
    return view('livewire.auctions')->with([
        'auctions'=> $auctions,
        'last_cars' => $last_cars,
        'last_salons'=> $last_salons,
        'last_taxis' => $last_taxis,
        'last_babors' => $last_babors,
        'last_buses' => $last_buses,
    ]);

        
       
    }
    
}
