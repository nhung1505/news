<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable = [
        'title',
        'unsigned_title',
        'summary',
        'description',
        'image',
        'hot',
        'view_count',
        'id_type',
    ];
    public function type(){
    	return $this->belongsTo('App\Type','id_type','id');
    }

    public function comments(){
    	return $this->hasMany('App\Comment','id_post','id');
    }
}
