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
        $choice1 = $this->faker->word;  
        $choice2 = $this->faker->word;
        $choice3 = $this->faker->word;
        $choice4 = $this->faker->word;
        $choices = [$choice1, $choice2, $choice3, $choice4];
        $right_answer = $this->faker->randomElement($choices);
        
        return [
            'title' => $this->faker->sentence,
            'choice1' => $choice1,
            'choice2' => $choice2,
            'choice3' => $choice3,
            'choice4' => $choice4,
            'right_answer' => $right_answer,
            
            
        ];
    }
}
