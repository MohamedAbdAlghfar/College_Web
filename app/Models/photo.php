<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class photo extends Model
{
    protected $table = 'photoable' ;
    
    protected $fillable = [
        'filename',
    	'photoable_id',
    	'photoable_type'
    ];
  
  public function photoable ()
{
        return $this->morphTo('App\Models\photo');
}


  
    use HasFactory;
}
