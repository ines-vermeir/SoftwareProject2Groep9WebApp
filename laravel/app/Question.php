<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'Survey_Questions';
    
    public function survey()
    {
        return $this->belongsTo('App\Survey');
    }
    
    public function answers()
    {
        return $this->hasMany('App\Answer');
    }
}
