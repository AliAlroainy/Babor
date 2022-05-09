<?php

namespace App\Http\Controllers\admin;
use App\Models\question;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StorequestionRequest;
use Illuminate\Support\Facades\Validator;

class QustionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $question=question::orderBy('id')->get();
        return view('admin.question.question')->with('questions',$question);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    public function store(Request $request)
    {
        
        
        $qes = new question();
        $qes->question=$request->title;
        $qes->answer=$request->description;
        if($qes->save())
            return redirect()->route('admin.question.index')->with(['successAdd'=>'تم إضافة السؤال بنجاح']);
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
    public function update(StorequestionRequest $request, $id)
    {
        $qes = question::findOrFail($id);
        if(!$qes){
            return redirect()->back()->with(['errorEdit'=>'لا تستطيع التعديل']);
        }else{
            $qes->update($request->except(['_token']));
            return redirect()->route('admin.questions.index')->with(['successEdit'=>'تم التعديل بنجاح']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $qes = question::find($id);
        $qes->is_active *= -1;
        if($qes->save())
            return back();
    }
}
