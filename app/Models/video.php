<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class video extends Model
{
   
    protected $fillable = [
    'name',
    'link',
    'course_id',
    ];
   public function course()
   {
    return $this->belongsTo('App\Models\course');
   }


   
    use HasFactory;
}
