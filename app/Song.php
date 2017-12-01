<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function artist(){
        return $this->belongsTo('App\Artist');
    }

    public function albums(){
        return $this->belongsToMany('App\Album','album_song');
    }

    public function comments(){
        return $this->belongsToMany('App\Comment','comment_song');
    }
}
