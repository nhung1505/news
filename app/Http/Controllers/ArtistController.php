<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artist;
use App\Song;
use App\User;

class ArtistController extends Controller
{

    public function index(){
        $artists = Artist::orderBy('id','desc')->paginate(8);

            return view('artists.list' , compact('artists'));
    }

    public function IndexDetail($id){
        $artist = Artist::with('songs')->find($id);
        if ($artist) {
            return view('artists.detail',compact('artist'));
        } else {
            abort('404');
        }

    }

    public function IndexArtitsSong($id){
        $artist = Artist::with('songs')->find($id);
        $songs = Song::where('artist_id',$id)
            ->paginate(10);


        return view('artists.songs_detail_artist',compact('artist','songs'));
    }

    public function PlaySongsArtist($id){
        $artist = Artist::find($id);
        $songs = Song::where('artist_id',$id) ->get();

        return view('artists.play_songs',compact('artist','songs'));
    }

}
