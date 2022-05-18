<?php

namespace App\Http\Livewire;
use App\Models\User;
use App\Models\Brand;
use App\Models\Series;
use App\Models\Auction;
use Livewire\Component;

class FilterAuction extends Component
{

    public $status;
    public $brands;
    public function render()
    {

        $auctions = Auction::orderBy('id', 'desc')->get();
        $brands = Brand::where('is_active', 1)->select('id', 'name')->get();
        $series = Series::where('is_active', 1)->select('id', 'name')->get();
        return view('livewire.filter-auction',[
            'listings'=>Auction::whereLike('model',$this->search ?? '')
            ->when($this->brands,function( $query ,$brands){


                return $query->where ('name',$brands) ->with([
                    'auctions'=> $auctions, 
                    'brands'  => $brands,
                    'series'  => $series
                ]);
            })
        ]);
        
        
        
        
        
       

    }
}
