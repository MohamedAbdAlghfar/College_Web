<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class question extends Model
{
    protected $fillable = [
        'title',
        'choice1', 
        'choice2',
        'choice3',
        'choice4',
        'right_answer', 
         
        
    ];
   
   

    public function quizzes() {
        return $this->belongsToMany('App\Models\quiz'); 
    }


   
    use HasFactory;
}
