<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = [
        'training_id', 'user_id', 'manager_id', 'status'
    ];
    
    public function training()
    {
        return $this->belongsTo('App\Training');
    }
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}