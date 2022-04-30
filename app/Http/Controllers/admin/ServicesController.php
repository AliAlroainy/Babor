<?php

namespace App\Http\Controllers\admin;

use App\Models\service;
use App\Trait\ImageTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\ServiceRequest;
use Illuminate\Support\Facades\Validator;

class ServicesController extends Controller
{
    use ImageTrait;
    public function index()
    {
        $route = \Request::route()->getName();
        $services=service::orderBy('id','desc')->get();
        return view('admin.services.service', ['route' => $route])->with('services',$services);
    }
   
    public function store(ServiceRequest $request)
    {
        $serv = new service();
        $serv->pic = $request->hasFile('pic')? $this->saveImage($request->pic, 'images/services'):"default.png";
        $serv->title=$request->title;
        $serv->description=$request->description;
        if($serv->save())
            return redirect()->route('admin.service.index')->with(['successAdd'=>'تم إضافة الخدمة بنجاح']);
        return back()->with(['errorAdd'=>'حدث خطأ، حاول مرة أخرى']);

    }

    public function update(ServiceRequest $request, $id)
    {
        $serv = service::findOrFail($id);
        if(!$serv){
            return redirect()->back()->with(['errorEditService'=>'لا تستطيع التعديل']);
        }else{
            if($request->hasFile('pic')){
                $this->pic_remove($id); 
                $serv->pic = $this->saveImage($request->pic, 'images/services');
            }
            $serv->update($request->except(['_token', 'pic']));
            if($serv->save())
                return redirect()->route('admin.service.index')->with(['successEdit'=>'تم التعديل بنجاح']);
        }
    }

    public function destroy($service_id)
    {
        $service = Service::find($service_id);
        $service->is_active *= -1;
        if($service->save())
            return back();
    }

    public function pic_remove($service_id){
        $serv_pic = service::where('id', $service_id)->first()->pic;
        if($serv_pic != 'default.png')
            File::delete(public_path("images/services/{$serv_pic}"));
        return;
    }
   
}
