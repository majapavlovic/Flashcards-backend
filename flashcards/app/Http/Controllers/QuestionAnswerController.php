<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class QuestionAnswerController extends Controller
{
    public function index($question_id)
    {
        $answers = Answer::get()->where('question_id', $question_id);
        if(is_null($answers))
            return response()->json('Data not found', 404);
        return response()->json($answers);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'question' => 'required',
        ]);

        if ($validator->fails())
            return response()->json($validator->errors());

        $question = Question::create([
            'question' => $request->question,
            'image_id' => $request->image_id,
            'category_id' => $request->category_id,
            'user_id' => $request->user_id,
        ]);
        $qid = $question->id;

        if($request->answer1) {
            $this->storeAnswer($request->answer1, $qid, $request->is_correct1);
        }
        if($request->answer2!=null) {
            $this->storeAnswer($request->answer2, $qid, $request->is_correct2);
        }
        if($request->answer3!=null) {
           $this->storeAnswer($request->answer3, $qid, $request->is_correct3);
        }

        $returnQuestion[] = array([
            "question" => $question,
        ]);

        return response()->json(['Question created successfully.', $returnQuestion]);
    }
    public function storeAnswer($answer, $question_id, $is_correct)
    {
        $answer = Answer::create([
            'answer' => $answer,
            'question_id' => $question_id,
            'is_correct' => $is_correct
        ]);

        return response()->json($answer);
    }
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'question' => 'required',
        ]);

        if ($validator->fails())
            return response()->json($validator->errors());

        $question = Question::create([
            'question' => $request->question,
            'image_id' => $request->image_id,
            'category_id' => $request->category_id,
            'user_id' => $request->user_id,
        ]);
        $qid = $question->id;

        if($request->answer1) {
            $this->storeAnswer($request->answer1, $qid, $request->is_correct1);
        }
        if($request->answer2!=null) {
            $this->storeAnswer($request->answer2, $qid, $request->is_correct2);
        }
        if($request->answer3!=null) {
           $this->storeAnswer($request->answer3, $qid, $request->is_correct3);
        }

        $returnQuestion[] = array([
            "question" => $question,
        ]);

        return response()->json(['Question created successfully.', $returnQuestion]);
    }

}
