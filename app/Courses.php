<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    //
    //Table Name
    protected $table = 'courses';
    //Primary Key
    public $primaryKey = 'id';
    //Timestamps
    public $timestamps = true;

    // courses has many past questions
    public function past_questions()
    {
        return $this->hasMany('App\PastQuestions');
    }
    //courses has many topics
    public function topics()
    {
        return $this->hasMany('App\Topics','course_id','id');
    }
}
