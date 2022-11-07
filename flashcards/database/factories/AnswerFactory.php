<?php

namespace Database\Factories;

use App\Models\Image;
use App\Models\Question;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Answer>
 */
class AnswerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [

            'answer'=>$this->faker->sentence(),
            'question_id'=>Question::factory(),
            'image_id'=>Image::factory()

        ];
    }
}
