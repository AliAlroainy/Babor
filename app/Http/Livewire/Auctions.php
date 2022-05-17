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
    public $pe_car =36;

    public function load()
    {
      
       $this->pe_car += 4;
     
        
    }
    public function load2()
    {
      $this->pe_page +=6;
        
    }
    public function render()
    { $last_cars = Auction::with(['car' => function ($q){
        return $q->where('category_id', 1)->get();

    }])->where('status', '2')->orderBy('id', 'desc')->paginate($this->pe_car);
        return view('livewire.auctions')->with([
           
           
            'last_cars'=> $last_cars,
           
        ]);
}
    
}
