<?php

namespace App\Http\Controllers;

use App\Http\Resources\QuestionResource;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Question::all();
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
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'question' => 'required|string',
            
        ]);

        if ($validator->fails())
            return response()->json($validator->errors());

        $question = Question::create([
            'question' => $request->question,
            'image_id' => $request->image_id,
            'category_id' => $request->category_id,
            'user_id' => $request->user_id,
        ]);

        return response()->json(['Question created successfully.', new QuestionResource($question)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show($question_id)
    {
        $question = Question::find($question_id);
        if (is_null($question_id))
            return response()->json('Data not found', 404);
        return response()->json(new QuestionResource($question_id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        $validator = Validator::make($request->all(), [
            'question' => 'required|string',
            
        ]);

        if ($validator->fails())
            return response()->json($validator->errors());

        $question->question = $request->question;
        $question->image_id = $request->image_id;
        $question->category_id = $request->category_id;
        $question->user_id = $request->user_id;

        return response()->json(['Question created successfully.', new QuestionResource($question)]);        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        $question->delete();

        return response()->json('Question is deleted successfully.');
    }
}
