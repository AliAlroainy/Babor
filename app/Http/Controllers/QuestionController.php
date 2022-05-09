<?php

namespace App\Http\Controllers;

use App\Models\question;
use App\Http\Requests\StorequestionRequest;
use App\Http\Requests\UpdatequestionRequest;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StorequestionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorequestionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatequestionRequest  $request
     * @param  \App\Models\question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatequestionRequest $request, question $question)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(question $question)
    {
        //
    }
}
