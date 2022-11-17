<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Answer;
use App\Models\Category;
use App\Models\Image;
use App\Models\Question;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


        
        Category::truncate();
        User::truncate();
        Question::truncate();
        Answer::truncate();
        Image::truncate();

        $user = User::factory()->create();

        $cat1 = Category::factory()->create();
        $cat2 = Category::factory()->create();
        
        $img1 = Image::factory()->create();
        $img2 = Image::factory()->create();
        $img3 = Image::factory()->create();

        $q1 = Question::factory()->create([
            'user_id'=>$user->id,
            'category_id'=>$cat1->id,
            'image_id'=>$img1->id
        ]);
        $q2 = Question::factory()->create([
            'user_id'=>$user->id,
            'category_id'=>$cat2->id,
            'image_id'=>$img3->id
        ]);
        $q3 = Question::factory()->create([
            'user_id'=>$user->id,
            'category_id'=>$cat1->id,
            'image_id'=>$img1->id
        ]);

        Answer::factory()->create([
            'question_id'=>$q1->id,
        ]);
        Answer::factory()->create([
            'question_id'=>$q2->id,
        ]);
        Answer::factory()->create([
            'question_id'=>$q3->id,
        ]);
    }
}
