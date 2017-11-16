<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artist;
use App\Song;
use App\User;

class ArtistController extends Controller
{

    public function index(){
        $artists = Artist::orderBy('id','desc')->paginate(8); ;
        return view('artists.list' , compact('artists'));
    }

    public function IndexDetail($id){
        $artist = Artist::with('songs')->find($id);
        return view('artists.detail',compact('artist'));
    }

    public function IndexArtitsSong($id){
        $artist = Artist::with('songs')->find($id);
        return view('artists.songs_detail_artist',compact('artist'));
    }

}
