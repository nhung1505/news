<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    //
    //
    protected $fillable = [
        'id_category',
        'name',
        'unsigned_name',
    ];
    public function category(){
    	return $this->belongsTo('App\Category','id_category','id');
    }
    public function posts(){
    	return $this->hasMany('App\Post','id_type','id');
    }
}
