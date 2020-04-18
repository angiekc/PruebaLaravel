<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $table = "states";
    protected $fillable = ['state'];
    protected $guarded = ['id'];   

    public function users()
    {
    	return $this->hasMany('App\User');
    }

    public function movies()
    {
    	return $this->hasMany('App\Models\State');
    }

    public function categories()
    {
    	return $this->hasMany('App\Models\Category');
    }
   
}
