<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\service;
use Illuminate\Support\Facades\Validator;
class ServicesController extends Controller
{
   
    public function index()
    {
        $route = \Request::route()->getName();
        $services=service::orderBy('id','desc')->get();
        return view('admin.services.service', ['route' => $route])->with('services',$services);
    }

   
    public function create()
    {
        //
        return view('admin.service.create');
    }

   
    public function store(Request $request)
    {
        //
        Validator::validate($request->all(),[
            'title'=>['required','min:6','max:20'],
            'content'=>['required' ]

        ],[
            'title.required'=>'الرجاء ادخال عنوان الخدمة',
            'title.min'=>'يجب الايقل العنوان عن 6 احرف', 
            'content.min'=>'الرجاء ادخال المحتوى',
           


        ]);

        $serv=new service();
        $serv->pic=$request->hasFile('pic')?$this->uploadFile($request->file('pic')):"default_ser.png";
        // $serv->pic=$request->pic;
        $serv->title=$request->title;
        $serv->content=$request->content;
        $serv->is_active=$request->is_active;
        if($serv->save())
        return redirect()->route('service.index')
        ->with(['success'=>'user created successful']);
        return back()->with(['error'=>'can not create user']);

    }

    
    public function show($id)
    {
        //
    }

   
    public function edit($service_id)
    {
        //
        $services=service::find($service_id);
        return view('admin.service.edit')
        ->with('services',$services);
    }

   
    public function update(Request $request, $service_id)
    {
        //
        $services=service::find($service_id);
        $services->title=$request->title;
        $services->content=$request->content;
        $services->pic=$request->pic;
       
        $services->is_active=$request->is_active;
        
        if($services->save())
        return redirect()->route('service.index')->with(['success'=>'data updated successful']);
        return redirect()->back()->with(['error'=>'can not update data ']);



    }

    public function destroy($service_id)
    {
        $service=service::find($service_id);
        $service->is_active*=-1;
        /*if($cat->is_active==0)
        $cat->is_active=1;
        else 
        $cat->is_active=0;*/
        if($service->save())
        return back()->with(['success'=>'data updated successful']);
        return back()->with(['error'=>'can not update data']);
    }

    public function uploadFile($file){
        $dest=public_path()."/images/";

        //$file = $request->file('image');
        $filename= time()."_".$file->getClientOriginalName();
        $file->move($dest,$filename);
        return $filename;

    }
   
}
