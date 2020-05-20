<?php

namespace App;




use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Student extends Model
{
    protected $fillable = ['name','major_id','grade_id'];
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function major(){
        return $this->belongsTo('App\major');
    }

    public function grade(){
        return $this->belongsTo('App\grade');
    }

    public function hobby(){
        return $this->belongsToMany('App\hobby');
    }

}
