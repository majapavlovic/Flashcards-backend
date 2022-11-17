<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserQuestionAnswerResource;
use App\Models\Answer;
use App\Models\Image;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserQuestionController extends Controller
{
    public function index($user_id)
    {
        $questions = DB::table('questions')->select('questions.id', 'questions.question', 'questions.image_id', 'categories.name as category')->
        join('categories', 'questions.category_id', '=', 'categories.id')->where('questions.user_id', $user_id)->get();
        


        if(is_null($questions))
            return response()->json('Data not found', 404); 
        else {
            foreach($questions as $q)
            {
                $flashcards[] = array(
                    "question"=>$q
                     , "answers" =>new UserQuestionAnswerResource(Answer::get()->where('question_id', $q->id )) ,
                     "image" => Image::find($q->image_id)
                );
            }
            // return response()->json($questions);
            return response()->json(new UserQuestionAnswerResource($flashcards));
        }
    }

    // public function index($user_id)
    // {
    //     $questions = DB::table('questions')->select('questions.id', 'questions.question', 'answers.answer', 'answers.is_correct')->join('users', 'users.id', '=', 'questions.user_id')
    //     ->leftJoin('answers', 'answers.question_id', '=', 'questions.id')
    //     ->where('user_id', '=', $user_id)->get();
        
    //     if(is_null($questions))
    //         return response()->json('Data not found', 404);
    //     return response()->json(new UserQuestionAnswerResource($questions));
    // }
}
