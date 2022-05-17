<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\DB;
use App\Models\Auction;
use App\Models\Brand;
use App\Models\Series;
use App\Models\Category;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Taxis extends Component
{
    public $pe_taxi =24;

    public function load2()
    {
      
       $this->pe_taxi += 4;
     
        
    }
    public function render()
    { $last_taxis = Auction::with(['car' => function ($q){
        return $q->where('category_id', 3)->get();

    }])->where('status', '2')->orderBy('id', 'desc')->paginate($this->pe_taxi);
        return view('livewire.taxis')->with([
           
           
            'last_taxis'=> $last_taxis,
           
        ]);
}
}