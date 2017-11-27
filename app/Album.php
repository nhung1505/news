<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function songs(){
        return $this->belongsToMany('App\Song','album_song');
    }

    public function commentalbums(){
        return $this->belongsToMany('App\Commentalbum','commentalbum_album');
    }

    public function likealbums(){
        return $this->belongsToMany('App\Likealbum','likealbum_album');
    }

}
