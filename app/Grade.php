<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $table='grade';

    public function student(){
        return $this->hasMany('App\student');
    }
}
