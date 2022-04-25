<?php

namespace App\Http\Controllers\admin;

use App\Models\Brand;
use App\Trait\ImageTrait;
use Illuminate\Http\Request;
use App\Http\Requests\BrandRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class BrandsController extends Controller
{
    use ImageTrait;
    public function index()
    {
        $route = \Request::route()->getName();
        $brands=brand::orderBy('id','desc')->get();
        return view('admin.cars.brands', ['route' => $route])->with('brands',$brands);
    }

    public function store(Request $request)
    {  Validator::validate($request->all(),[
        'name'=>['required','min:5','max:20'],
        'logo'=>['required','image','mimes:jpeg,png,jpg,gif,svg'.'max:6000'],

    ],
    );
        $brand = new Brand();
        $brand->logo = $request->hasFile('logo')? $this->saveImage($request->logo, 'images/brands'):"default.png";
        $brand->name=$request->name;
        if($brand->save())
        return redirect()->route('admin.brand.index')->with(['successAdd'=>'تم إضافة البراند بنجاح']);
        return back()->with(['errorAdd'=>'حدث خطأ، حاول مرة أخرى']);
    }

    public function update(BrandRequest $request, $id)
    {
        $brand = Brand::findOrFail($id);
        if(!$brand){
            return redirect()->back()->with(['errorEdit'=>'لا تستطيع التعديل']);
        }else{
            if($request->hasFile('logo')){
                $this->logo_remove($id);
                $brand->logo = $this->saveImage($request->logo, 'images/brands');
            }
            $brand->update($request->except(['_token', 'logo']));
            if($brand->save())
                return redirect()->route('admin.brand.index')->with(['successEdit'=>'تم التعديل بنجاح']);
        }
    }

    public function destroy($brand_id)
    {
        $brand=Brand::find($brand_id);
        $brand->is_active*=-1;
        if($brand->save())
            return back();
    }

    public function logo_remove($brand_id){
        $brand_logo = Brand::where('id', $brand_id)->first()->logo;
        File::delete(public_path("images/brands/{$brand_logo}"));
        return;
    }

}
