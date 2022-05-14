<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use App\Models\Auction;
use App\Models\Brand;
use App\Models\Series;
use App\Models\Category;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Babor extends Component
{
    
    public $pe_babor =8;

    // public function load()
    // {
      
    //    $this->pe_babor += 4;
     
        
    // }
    public function render()
    {
        $last_babors = Auction::with(['car' => function ($q){
            return $q->where('category_id', 4)->get();
        }])->where('status', '2')->orderBy('id', 'desc')->paginate($this->pe_babor);
        return view('livewire.babor')->with([
           
           
            'last_babors'=> $last_babors,
           
        ]);
    }
}
