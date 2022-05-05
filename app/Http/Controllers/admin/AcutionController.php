<?php

namespace App\Http\Controllers\admin;
use App\Models\Auction;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AcutionController extends Controller
{

    public function index()
    {
        $auctions = Auction::orderBy('id')->get();
        return view('Admin.auctions.auctions')->with('auctions',$auctions);

    }

    public function create()
    {
        //

    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($auctions_id)
    {
        $auctions=Auction::find($auctions_id);
        if(!$auctions)
            return abort('404');
        $auctions->is_active*=-1;
        if($auctions->save())
            return back();
    }
}
