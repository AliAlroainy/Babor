<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\car_characteristics;
use Illuminate\Support\Facades\Validator;
class CarCharacteristicsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $car_characteristics=car_characteristics::orderBy('id','desc')->get();
        return view('admin.car_characteristics.list')
        ->with('car_characteristics',$car_characteristics) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('admin.car_characteristics.create');//
    }

    
    public function store(Request $request)
    {
        //
        
        Validator::validate($request->all(),[
            'brand'=>['required','min:5','max:20'],
            'brand_type'=>['required' ,'min:5','max:20'],
            'JIR'=>['required' ],
            'cylinder_number'=>['required' ],
            'fuel_type'=>['required' ],
            'engine_type'=>['required' ]

        ],[
            'brand.required'=>'الرجاء ادخال الشركة ',
            'brand.min'=>'يجب ان لايقل اسم الشركة عن 5 احرف', 
            'brand_type.required'=>'الرجاء ادخال نوع البراند ',
            'brand_type.min'=>'يجب ان لايقل نوع البراند عن 5 احرف',
            'JIR.required'=>'الرجاء ادخال نوع الجير ',
            'fuel_type.required'=>'الرجاء ادخال نوع الوقود ',
            'cylinder_number.required'=>'  الرجاء ادخال رقم الاسطوانة',
            'engine_type.required'=>'الرجاء ادخال نوع المحرك'


        ]);

        $car_det=new car_characteristics();
        
        $car_det->brand=$request->brand;
        $car_det->brand_type=$request->brand_type;
        $car_det->JIR=$request->JIR;
        $car_det->cylinder_number=$request->cylinder_number;
        $car_det->engine_type=$request->engine_type;
        $car_det->fuel_type=$request->fuel_type;
        $car_det->is_active=$request->is_active;
        if($car_det->save())
        return redirect()->route('CarCharacter.index')
        ->with(['success'=>'user created successful']);
        return back()->with(['error'=>'can not create user']);

    }

    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $car_dets=car_characteristics::find($id);
        return view('admin.car_characteristics.edit')
        ->with('car_characteristics',$car_dets);
       
    }

    
    public function update(Request $request, $car_det_id)
    {
        //
        $cars=car_characteristics::find($car_det_id);
        $cars->brand=$request->brand;
        $cars->brand_type=$request->brand_type;
        $cars->JIR=$request->JIR;
        $cars->cylinder_number=$request->cylinder_number;
        $cars->engine_type=$request->engine_type;
        $cars->is_active=$request->is_active;

        if($cars->save())
        return redirect()->route('CarCharacter.index')->with(['success'=>'data updated successful']);
        return redirect()->back()->with(['error'=>'can not update data ']);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($car_det_id)
    {
        //
        $car_det=car_characteristics::find($car_det_id);
        $car_det->is_active*=-1;
       
        if($car_det->save())
        return back()->with(['success'=>'data updated successful']);
        return back()->with(['error'=>'can not update data']);

    }
}
