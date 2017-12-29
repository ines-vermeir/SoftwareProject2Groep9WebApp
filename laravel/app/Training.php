<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    protected $table = 'Trainings';
    protected $fillable = [
        'title', 'archive', 'subject', 'language', 'responsible', 'sessions'
    ];
    
    public $timestamps = false;
    
    public function sessionss()
    {
        return $this->hasMany('App\Session', 'training_id');
    }
    
    public function applications()
    {
        return $this->hasMany('App\Application');
    }
}
