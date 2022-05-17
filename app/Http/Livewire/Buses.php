<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\DB;
use App\Models\Auction;
use App\Models\Brand;
use App\Models\Series;
use App\Models\Category;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Buses extends Component
{
    public $pe_bus =4;
    public function render()
    {
        $last_buses = Auction::with(['car' => function ($q){
            return $q->where('category_id', 5)->get();
        }])->where('status', '2')->orderBy('id', 'desc')->paginate($this->pe_bus);
        return view('livewire.buses')->with([
           
           
            'last_buses'=> $last_buses,
           
        ]); 
       
    }
}
