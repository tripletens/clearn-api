<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topics extends Model
{
    //
    //Table Name
    protected $table = 'topics';
    //Primary Key
    public $primaryKey = 'id';
    //Timestamps
    public $timestamps = true;

    // makes reference to author_id
    public function course()
    {
        // return $this->belongsTo('App\User');
        return $this->belongsTo('App\Courses', 'course_id', 'id');
    }
    public function past_questions()
    {
        return $this->hasMany('App\PastQuestions', 'topic_id', 'id');
    }
}
