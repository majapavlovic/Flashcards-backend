<?php

namespace App\Http\Controllers;

use App\Http\Resources\AnswerResource;
use App\Models\Answer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Answer::all();
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
            'answer' => 'required|string',
            'question_id' => 'required',
            'is_correct' => 'required|boolean',
        ]);

        if ($validator->fails())
            return response()->json($validator->errors());

        $answer = Answer::create([
            'answer' => $request->answer,
            'question_id' => $request->question_id,
            'is_correct' => $request->is_correct,
            'image_id' => $request->image_id,
        ]);

        return response()->json(['Answer created successfully.', new AnswerResource($answer)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function show($answer_id)
    {
        $answer = Answer::find($answer_id);
        if (is_null($answer))
            return response()->json('Data not found', 404);
        return response()->json(new AnswerResource($answer));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function edit(Answer $answer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Answer $answer)
    {
        $validator = Validator::make($request->all(), [
            'answer' => 'required|string',
            'question_id' => 'required',
            'is_correct' => 'required|boolean',
        ]);

        if ($validator->fails())
            return response()->json($validator->errors());

        $answer->answer = $request->answer;
        $answer->question_id = $request->question_id;
        $answer->is_correct = $request->is_correct;
        $answer->image_id = $request->image_id;

        return response()->json(['Answer created successfully.', new AnswerResource($answer)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Answer $answer)
    {
        //
    }
}
