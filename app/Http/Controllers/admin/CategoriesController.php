<?php

namespace App\Http\Controllers\admin;
use App\Models\Category;
use App\Trait\ImageTrait;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCategoryRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class CategoriesController extends Controller
{
    use ImageTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $route = \Request::route()->getName();
        $categories=categories::orderBy('id','desc')->get();
        return view('admin.cars.categoriess', ['route' => $route])->with('categoriess',$categoriess);
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        //
        $categories = new categories();
        $categories->Image = $request->hasFile('Image')? $this->saveImage($request->Image, 'images/categories'):"default.png";
        $categories->name=$request->name;
        if($categories->save())
        return redirect()->route('admin.categories.index')->with(['successAdd'=>'تمت الإضافة بنجاح']);
        return back()->with(['errorAdd'=>'حدث خطأ، حاول مرة أخرى']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCategoryRequest  $request, $id)
    {
        //
        $categories = categories::findOrFail($id);
        if(!$categories){
            return redirect()->back()->with(['errorEdit'=>'لا تستطيع التعديل']);
        }else{
            if($request->hasFile('Image')){
                $this->Image_remove($id);
                $categories->Image = $this->saveImage($request->Image, 'images/categories');
            }
            $categories->update($request->except(['_token', 'Image']));
            if($categories->save())
                return redirect()->route('admin.categories.index')->with(['successEdit'=>'تم التعديل بنجاح']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($categories_id)
    {
        $categories=categories::find($categories_id);
        if(!$categories)
            return abort('404');
        $categories->series()->update(['is_active'=> -1]);
        $categories->is_active*=-1;
        if($categories->save())
            return back();
    }
    public function Image_remove($categories_id){
        $categories_Image = categories::where('id', $categories_id)->first()->Image;
        if($categories_Image != 'default.png')
            File::delete(public_path("images/categories/{$categories_Image}"));
        return;
    }
}
