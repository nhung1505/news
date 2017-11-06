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

        if($request->hasFile('image')){
            $song->image = $request->file('image')->store('image_songs/' . auth()->id(),'public');
        }

        if($request->hasFile('audio')) {
            $song->audio = $request->file('audio')->store('audio_songs/' . auth()->id(),'public');
        }

        $song->user_id = Auth::id();

        $song->save();


        return redirect()->back();
    }

    public function index(){

        $song = Song::paginate(10);

        $songs = Song::with('user')->get();

        return view('songs.list',compact('songs'));

    }

    public function showEditForm($id) {
        $song = Song::find($id);
        return view('songs.edit', compact('song'));
    }

    public function edit(Request $request, $id) {
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
        return view('songs.list');
    }
}
