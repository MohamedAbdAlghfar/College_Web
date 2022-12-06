<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class quiz extends Model
{
   
    protected $fillable = [
        'name',
       'course_id', 
    ];
   
   
    public function course()
    {
     return $this->belongsTo('App\Models\course');
    }
   
   
    public function Users() {
        return $this->belongsToMany('App\Models\User');
    }

   
    public function questions() {
        return $this->belongsToMany('App\Models\question');
    }
   
   
    use HasFactory;
}
