<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Album;
use App\Song;
use App\User;
use App\Artist;

class ArtistController extends Controller
{
    public function index(){
        $artists = Artist::orderBy('id','desc')->paginate(8); ;
        return view('artists.list' , compact('artists'));
    }

    public function create(Request $request)
    {
        if (isset($request->id)){
            $song = Song::find($request->id);
        }
        return view('artists.create',compact('song'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3|max:50',
            'stage_name' => 'required|unique:artists|max:50',
            'image' => 'mimes:jpeg,jpg,png,svg'
        ]);
        $artist = new Artist();
        $artist->name = $request->input('name');
        if ($request->hasFile('image')) {
            $artist->image = $request->file('image')->store('image_artists/' . auth()->id(), 'public');

        }
        $artist->dob = $request->input('dob');
        $artist->stage_name = $request->input('stage_name');
        $artist->description = $request->input('description');
        $artist->user_id = Auth::id();
        $artist->save();
        return redirect()->route('artist.list');
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
