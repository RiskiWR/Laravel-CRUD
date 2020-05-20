<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hobby extends Model
{
    protected $table ="hobby";
    

    public function student(){
        return $this->belongsToMany('App\student');
    }

}
