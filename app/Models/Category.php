<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $table = "categories";
    protected $fillable = ['name','state_id'];
    protected $guarded = ['id'];   

    public function state()
    {
    	return $this->belongsTo('App\Models\State');		
    }

    public function movies()
    {
    	return $this->belongsToMany('App\Models\Movie');		
    }
}
