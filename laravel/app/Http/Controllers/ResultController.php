<?php

namespace App\Http\Controllers;

use App\Result;
use App\Survey;
use Illuminate\Http\Request;

class ResultController extends Controller
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Survey $survey) 
    {
    // remove the token
        
        $surveyid = $request->surveyid;
        
        
        $userInput = $request->answer;
        
        
        
        foreach ($userInput as $key => $value) {
         
            $newAnswer = new Result();
            $newAnswer->question_id = $key;
            $newAnswer->answer = $value;
            $newAnswer->survey_id = $surveyid;
            $newAnswer->save();
        }
        
        
        return view('survey.bedankt');
        
//        $arr = $request->except('_token');
//        foreach ($arr as $key => $value) {
//            $newAnswer = new Result();
//            $newValue = $value['answer'];
//            $newAnswer->question_id = $key;
//            $newAnswer->survey_id = 1;
//            $newAnswer->answer = $value['answer'];
//            $newAnswer->save();
//            $answerArray[] = $newAnswer;
//        };
//        $surveys = Survey::all();
//        return view('survey.index', compact('surveys'));
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function show(Result $result)
    {
        hey;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function edit(Result $result)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Result $result)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function destroy(Result $result)
    {
        //
    }
}
