<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $table = 'Results';
    protected $fillable = [
        'question_id', 'survey_id', 'answer'
    ];
    
    public $timestamps = false;

    public function survey() {
      return $this->belongsTo(Survey::class);
    }

    public function question() {
      return $this->belongsTo(Question::class);
    }
}
