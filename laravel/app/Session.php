<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    protected $table = 'Sessions';
    
    public function training()
    {
        return $this->belongsTo('App\Training', 'training_id');
    }
    
    public function location()
    {
        return $this->belongsTo('App\Location');
    }
}
