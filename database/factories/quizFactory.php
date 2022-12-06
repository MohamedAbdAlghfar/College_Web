<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\course;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\quiz>
 */
class quizFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
    	'course_id' => course::all()->random()->id,
        ];
    }
}
