<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Song;

class SongController extends Controller
{
    public function create(){

        return view('songs.upload');

    }

    public function upload(Request $request){
        $this->validate($request,[
            'name' => 'required:songs,name|min:3|max:50',
            'audio' => 'required|mimes:mp3',
        ]);

        $song = new Song();

        $song->name = $request->input('name');

        $song->lyric = $request->input('lyric');

        $song->description = $request->input('description');

        $name_image = $request->file('image')->getClientOriginalName();
        $time_current_image = time();
        $extension_image = $request->file('image')->getClientOriginalExtension();
        $file_name_image = $name_image.$time_current_image. '.' .$extension_image;
        $song->image = $request->file('image')->storeAs('image_songs' . auth()->id(),$file_name_image,'public');

        $name_audio = $request->file('audio')->getClientOriginalName();
        $time_current_audio = time();
        $extension_audio = $request->file('audio')->getClientOriginalExtension();
        $file_name_audio = $name_audio.$time_current_audio. '.' .$extension_audio;
        $song->audio = $request->file('audio')->storeAs('audio_songs' . auth()->id(),$file_name_audio,'public');

        $song->user_id = Auth::id();
        $song->save();


        return redirect()->back();


    }
}
