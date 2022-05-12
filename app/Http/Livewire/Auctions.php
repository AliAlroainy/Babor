<?php

namespace App\Http\Livewire;
use Livewire\Component;
use Illuminate\Support\Auction;

class Auctions extends Component
{
    public $pe_page = 5;
    public function render()
    {
        return view('livewire.auctions',[
        "auctions" => Auction::Query()->paginate(this->$pe_page)
        ]);
    }
    public function mount()
    {
        Auction::loginUsingId(1);
        
    }
}
