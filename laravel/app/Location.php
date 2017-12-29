<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $table = 'Locations';
    
    public function sessions()
    {
        return $this->hasMany('App\Session');
    }
}
