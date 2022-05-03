<?php

namespace App\Http\Controllers\admin;
use App\Models\Category;
use App\Trait\ImageTrait;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use App\Http\Requests\StoreCategoryRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class CategoriesController extends Controller
{
    use ImageTrait;
    public function index()
    {
        $categorie=Category::orderBy('id','desc')->get();
        return view('Admin.cars.categories')->with('categorie',$categorie);
    }

    public function create()
    {

    }

    public function store(StoreCategoryRequest $request)
    {
        $categories = new Category();
        $categories->image = $request->hasFile('image')? $this->saveImage($request->image, 'images/categories'):"default.png";
        $categories->name=$request->name;
        if($categories->save())
            return redirect()->route('admin.category.index')->with(['successAdd'=>'تمت الإضافة بنجاح']);
        return back()->with(['errorAdd'=>'حدث خطأ، حاول مرة أخرى']);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(StoreCategoryRequest  $request, $id)
    {
        //
        $categories = Category::findOrFail($id);
        if(!$categories){
            return redirect()->back()->with(['errorEdit'=>'لا تستطيع التعديل']);
        }else{
            if($request->hasFile('image')){
                $this->image_remove($id);
                $categories->image = $this->saveImage($request->image, 'images/categories');
            }
            $categories->update($request->except(['_token', 'image']));
            if($categories->save())
                return redirect()->route('admin.category.index')->with(['successEdit'=>'تم التعديل بنجاح']);
        }
    }

    public function destroy($categories_id)
    {
        $category = Category::find($categories_id);
        if(!$category)
            return abort('404');
        $category->is_active *= -1;
        if($category->save())
            return back();
    }

    public function image_remove($categories_id){
        $categories_image = Category::where('id', $categories_id)->first()->image;
        if($categories_image != 'default.png')
            File::delete(public_path("images/categories/{$categories_image}"));
        return;
    }
}
