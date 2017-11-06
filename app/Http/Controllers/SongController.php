<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Song;
use App\User;

class SongController extends Controller
{
    public function create(){

        return view('songs.upload');

    }

    public function upload(Request $request){
        $this->validate($request,[
            'name' => 'required|min:3|max:50',
            'audio' => 'required|mimes:mp3,mpga',
            'image' => 'mimes:jpeg,jpg,png,svg'

        ]);

        $song = new Song();

        $song->name = $request->input('name');

        $song->lyric = $request->input('lyric');

        $song->description = $request->input('description');

        if ($request->hasFile('image')){
            $song->image = $request->file('image')->store('image_songs/' . auth()->id(),'public');
        }

        if ($request->hasFile('audio')) {
            $song->audio = $request->file('audio')->store('audio_songs/' . auth()->id(),'public');
        }

        $song->user_id = Auth::id();

        $song->save();

        return redirect()->back();
    }

    public function index(){

        $songs = Song::paginate(10);

        if ($songs){

            return view('songs.list', compact('songs'));

        }else {

            abort('404');

        }
        
    }

    public function detailSong($id){

        $detail_song = Song::with('user')->find($id);

        if ($detail_song){

           $size = Storage::size('public/'.$detail_song->audio);

           $size_mb = round(($size/1024)/1024, 2);

        }else {

            abort('404');

        }

        return view('songs.details_song', compact('detail_song','size_mb'));
    }
    public function delete($id){
        $song = Song::find($id);
        if ($song){
            Storage::delete('public/'.$song->image);
            Storage::delete('public/'.$song->audio);
            $song->delete();
            return redirect()->route('song.list');
        } else {
            abort('404');
        }
    }

    public function edit($id) {
        $song = Song::find($id);
        return view('songs.edit', compact('song'));
    }

    public function update(Request $request, $id) {
        $song = Song::find($id);
        $this->validate($request,[
            'name' => 'required|min:3|max:50',
            'image' => 'mimes:jpeg,jpg,png,svg'
        ]);

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete(''.$song->image);
            $song->image = $request->file('image')->store('image_songs/' . auth()->id(),'public');
        }
        $song->save();
        return redirect()->route('song.details_song', ['id'=>$id]);
    }
}
