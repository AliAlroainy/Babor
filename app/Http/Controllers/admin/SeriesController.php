<?php

namespace App\Http\Controllers\admin;

use App\Models\Brand;
use App\Models\Series;
use App\Trait\ImageTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SeriesRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class SeriesController extends Controller
{
    use ImageTrait;
    public function index()
    {
        $route = \Request::route()->getName();
        $series= Series::with('brand')->orderBy('id','desc')->get();
        $brands = Brand::select('id', 'name')->get();
        return view('admin.cars.series', ['route' => $route, 'brands' => $brands, 'series' => $series]);
    }
   
    public function store(Request $request)
    {
        Series::create($request->except(['_token']));
        return redirect()->route('admin.series.index')->with(['successAdd'=>'تمت الإضافة بنجاح']);
        return back()->with(['errorAdd'=>'حدث خطأ، حاول مرة أخرى']);
    }

    public function update(SeriesRequest $request, $id)
    {
        $series = Series::findOrFail($id);
        if(!$series){
            return redirect()->back()->with(['errorEdit'=>'لا تستطيع التعديل']);
        }else{
            $series->update($request->except(['_token']));
            return redirect()->route('admin.series.index')->with(['successEdit'=>'تم التعديل بنجاح']);
        }
    }

    public function destroy($series_id)
    {
        $series = Series::find($series_id);
        $series->is_active *= -1;
        if($series->save())
            return back();
    }   
}