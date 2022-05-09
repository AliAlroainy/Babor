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
use App\Models\question;
class SeriesController extends Controller
{
    use ImageTrait;
    public function index()
    {
        $series= Series::with('brand')->orderBy('id')->get();
        $brands = Brand::select('id', 'name')->get();
        return view('admin.cars.series', ['brands' => $brands, 'series' => $series]);
    }
   
    public function store(SeriesRequest $request)
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
        if(!$series)
            return abort('404');
        $series->is_active *= -1;
        if($series->save())
            return back();
    }   
}