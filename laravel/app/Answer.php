<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $table = 'Survey_Answers';
    public function question()
    {
        return $this->belongsTo('App\Survey');
    }
}
