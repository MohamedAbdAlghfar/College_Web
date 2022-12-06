<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class course extends Model
{
    protected $fillable = [
        'name',
        'link',
        'level'
        
    ];
   
    public function photo() {
        return $this->morphOne('App\Models\Photo', 'photoable');
    }


public function videos()
{
    return $this->hasMany('App\Models\video');
}


public function quizzes()
{
    return $this->hasMany('App\Models\quiz');
}


public function Users() {
    return $this->belongsToMany('App\Models\User');
}


use HasFactory;
}
