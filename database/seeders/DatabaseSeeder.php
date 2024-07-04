<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\course;
use App\Models\photo;
use App\Models\question;
use App\Models\User;
use App\Models\quiz;
use App\Models\video;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //$this->call([UsersTableSeeder::class]);
        $users = User::factory(10)->create();
        $courses = course::factory(10)->create();
   //     foreach ($users as $user) {
  //          $courses_ids = [];
 //           $courses_ids[] = course::all()->random()->id;
 //           $courses_ids[] = course::all()->random()->id;

  //          $user->courses()->sync( $courses_ids );
   //     }
        ///

        foreach ($users as $user) {
            $courses = course::inRandomOrder()->limit(3)->get();
            
            foreach ($courses as $course) {
                $pass_course = random_int(-1, 1); 
                $grade = random_int(0, 100);    
                $user->courses()->attach($course, [
                    'pass_course' => $pass_course, 
                    'grade' => $grade,
                ]);
            }
        }
       /////






        photo::factory(5)->create();
 
       $quizzes = quiz::factory(5)->create();
        foreach ($users as $user) {
     $quizzes_ids = [];

     $quizzes_ids[] = quiz::all()->random()->id;
     $quizzes_ids[] = quiz::all()->random()->id;
     $quizzes_ids[] = quiz::all()->random()->id;

     $user->quizzes()->sync( $quizzes_ids );
 }
 
 
 
 
        $questions = question::factory(50)->create();
        foreach ($quizzes as $quiz) {
            $questions_ids = [];

            $questions_ids[] = question::all()->random()->id;
            $questions_ids[] = question::all()->random()->id;
            $questions_ids[] = question::all()->random()->id;
            $questions_ids[] = question::all()->random()->id;
            $quiz->questions()->sync( $questions_ids );
        }
        
 
        
        
        video::factory(50)->create();
    }
}
