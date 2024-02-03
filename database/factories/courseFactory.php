<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\course>
 */
class courseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
        'name' => $this->faker->sentence,    	
    	'link' => $this->faker->url,
    	'level' => $this->faker->randomElement([1,2,3,4]),
        'point' => $this->faker->randomElement([1,2,3]),
        'enrollment_status' => 0,
               ];
    }
}
