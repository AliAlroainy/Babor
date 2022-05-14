<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\DB;
use App\Models\Auction;
use App\Models\Brand;
use App\Models\Series;
use App\Models\Category;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Salons extends Component
{
    public $pe_salons =23;
    public function loadsalon()
    {
      
    //   $this->pe_salons +=3;
     
        
    }
    public function render()
    {
        $last_salons = Auction::with(['car' => function ($q){
            return $q->where('category_id', 2)->get();
        }])->where('status', '2')->orderBy('id', 'desc')->paginate($this->pe_salons);
        return view('livewire.salons')->with([
           
           
            'last_salons'=> $last_salons,
           
        ]);
    }
}
