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
    
}
