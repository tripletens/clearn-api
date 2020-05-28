<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PastQuestions extends Model
{
    //
    //Table Name
    protected $table = 'past_questions';
    //Primary Key
    public $primaryKey = 'id';
    //Timestamps
    public $timestamps = true;

    // makes reference to author_id
    public function user()
    {
        // return $this->belongsTo('App\User');
        return $this->belongsTo('App\User','author_id','id');
    }
    public function topic()
    {
        return $this->belongsTo('App\Topics', 'topic_id', 'id');
    }
    public function course()
    {
        return $this->belongsTo('App\Courses', 'course_id', 'id');
    }
}
