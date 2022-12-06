<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\course;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\photo>
 */
class photoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
  




        $userid = User::all()->random()->id;
        $courseid = course::all()->random()->id;
    
        $photoable_id = $this->faker->randomElement([ $userid, $courseid ]);
        $photoable_type = $photoable_id == $userid ? 'App\Models\User' : 'App\Models\course';
    
        return [
            'filename' => $this->faker->randomElement(['1.jpeg','2.jpg','3.jpg','4.jpg','5.jpg','6.jpg','7.jpg','8.jpg','9.jpg','10.jpg',]),
    
            'photoable_id' => $photoable_id,
            'photoable_type' => $photoable_type,
        ];





    }
}
