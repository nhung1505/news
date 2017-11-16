<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artist;
use App\Song;
use App\User;

class ArtistController extends Controller
{
    public function IndexDetail($id=1){
        $artist = Artist::with('songs')->find($id);
        return view('artists.detail',compact('artist'));
    }
}
