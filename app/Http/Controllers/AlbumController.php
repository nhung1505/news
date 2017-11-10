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

    function create()
    {


        return view('albums.create');

    }

    function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3|max:50',
            'image' => 'mimes:jpeg,jpg,png,svg'

        ]);

        $album = new Album();

        $album->name = $request->input('name');

        if ($request->hasFile('image')) {
            $album->image = $request->file('image')->store('image_albums/' . auth()->id(), 'public');

        }

        $album->description = $request->input('description');
        $album->user_id = Auth::id();
        $album->save();
        return redirect()->route('album.list');
    }

     public function index()
    {
        $albums = Album::paginate(8);
        return view('albums.list', compact('albums'));
    }

    public function detailAlbum($id)
    {
        $detail_album = Album::with('user', 'songs')->find($id);
        if ($detail_album) {

            return view('albums.detail_album', compact('detail_album'));

        } else {

            abort('404');
        }

    }

    public function edit($id)
    {
        $album = Album::find($id);
        if ($album) {
            return view('albums.edit', compact('album'));;
        } else {
            abort('404');
        }
    }

    public function update(Request $request, $id)
    {
        $album = Album::find($id);
        $this->validate($request, [
            'name' => 'required|min:3|max:50',
            'image' => 'mimes:jpeg,jpg,png,svg'
        ]);
        if ($request->hasFile('image')) {
            Storage::disk('public')->delete('' . $album->image);
            $album->image = $request->file('image')->store('image_songs/' . auth()->id(), 'public');
        }
        $album->name = $request->input('name');
        $album->description = $request->input('description');
        $album->save();
        Session::flash('announcement', 'Edit Success!');
        return redirect()->route('album.detail_album', ['id' => $id]);
    }


    public function addOneSong(Request $request, $id)
    {
        $album = Album::find($id);

        return view();
    }
    public function delete($id){
        $album = Album::find($id);
        $album->songs()->detach();
        if ($album){
            if(isset($album->image)){
                Storage::delete('public/'.$album->image);
            }
            $album->delete();
            Session::flash('announcement','Delete Success');
            return redirect()->route('album.list');
        } else {
            abort('404');
        }
    }
    public function remove($id){
        $song = Song::find($id);
        $detail_album = Album::find($id);
        if ($song){
        $detail_album->songs()->detach();
            Session::flash('announcement','Delete Success');
            return redirect()->route('album.detail_album', ['id' => $id]);

        } else {
            abort('404');
        }
    }


    }