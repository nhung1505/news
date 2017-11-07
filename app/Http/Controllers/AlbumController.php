<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\Album;
use App\Song;
use App\User;

class AlbumController extends Controller
{
    function create(){

        return view('albums.create');

    }

    function store(Request $request){
        $this->validate($request,[
            'name' => 'required|min:3|max:50',
            'image' => 'mimes:jpeg,jpg,png,svg'

        ]);

        $album = new Album();

        $album->name = $request->input('name');

        $album->description = $request->input('description');

        if($request->hasFile('image')){
            $album->image = $request->file('image')->store('image_albums/' . auth()->id(),'public');

        }

        $album->user_id = Auth::id();

        $album->save();

        return redirect()->route('home');

    }
}
