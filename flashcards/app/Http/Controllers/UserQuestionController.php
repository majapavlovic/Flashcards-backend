<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class UserQuestionController extends Controller
{
    public function index($user_id)
    {
        $posts = Question::get()->where('user_id', $user_id);
        if(is_null($posts))
            return response()->json('Data not found', 404);
        return response()->json($posts);
    }
}
