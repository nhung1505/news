<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Song;

class SongController extends Controller
{
    public function create(){

        return view('songs.upload');

    }

    public function upload(Request $request){

        $song = new Song();
        $song->name=$request->input('name');
        $song->rysic=$request->input('rysic');
        $song->description=$request->input('description');
        $song->image=$request->file('image')->store('image_songs');

        $song->save();

        return redirect()->back();
    }
}
