<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class question extends Model
{
    protected $fillable = [
        'title',
        'answers', 
        'right_answer',
         
        
    ];
   
   

    public function quizzes() {
        return $this->belongsToMany('App\Models\quiz');
    }


   
    use HasFactory;
}
