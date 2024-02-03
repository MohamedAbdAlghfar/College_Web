<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
class course extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    
    protected $fillable = [
        'name',
        'link',
        'level',
        'deleted_by',
        'enrollment_status',
        'point',
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
    return $this->belongsToMany('App\Models\User')->withPivot('pass_course','grade');
}
protected static function boot()
{
    parent::boot();

    static::deleting(function ($course) {
        $course->deleted_by = Auth::user()->id;
        $course->save();
    });
}


use HasFactory;
}
