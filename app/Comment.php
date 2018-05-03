<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $fillable = [
        'id_user',
        'id_post',
        'description',
    ];

    public function post(){
    	return $this->belongsTo('App\Post','id_post','id');
    }

    public function user(){
    	return $this->belongsTo('App\User','id_user','id');
    }
}
