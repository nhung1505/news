<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commentalbum extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function albums(){
        return $this->belongsToMany('App\Album','commentalbum_album');
    }

}
