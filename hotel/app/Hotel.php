<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    public function rooms()
    {
    	return $this->hasMany('App\Room');
    }

    public function ratings()
    {
    	return $this->hasMany('App\Rating');
    }

    public function comments()
    {
    	return $this->hasMany('App\Comment');
    }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function district()
    {
    	return $this->belongsTo('App\District');
    }

   
}
