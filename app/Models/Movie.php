<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $table = "movies";
    protected $fillable = ['name', 'description','user_id','state_id'];
    protected $guarded = ['id'];    

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function state()
    {
    	return $this->belongsTo('App\Models\State');
    }

    public function categories()
    {
    	return $this->belongsToMany('App\Models\Category');		
    }
}	
