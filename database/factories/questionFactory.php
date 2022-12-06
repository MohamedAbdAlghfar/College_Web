<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\question>
 */
class questionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $answers = $this->faker->paragraph; 
        $right_answer = $this->faker->randomElement(explode(' ', $answers));
        
        return [
            'title' => $this->faker->sentence,
            'answers' => $answers,
            'right_answer' => $right_answer,
            
            
        ];
    }
}
