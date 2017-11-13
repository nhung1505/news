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

    function create(Request $request)
    {
        if (isset($request->id)){
           $song = Song::find($request->id);
        }

        return view('albums.create',compact('song'));

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
        if (isset($request->id)){
            $song = Song::find($request->id);
            return redirect()->route('song.details_song',['id'=>$song->id]);
        }
        return redirect()->route('album.list');
    }

    public function index()
    {
        $albums = Album::orderBy('id', 'desc')->paginate(8);
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

    public function searchAddSong($id ){
        $album = Album::find($id);
        $songs = Song::all();
        return view('albums.search_add',compact('album','songs'));
    }

    public function addSong(Request $request , $id ){
        $album = Album::find($id);
        $album->songs()->attach($request->input('song_id'));
        return redirect(route('album.search_add',['id'=>$album->id]));

    }

    public function removeSong(Request $request,$id){
        $album = Album::find($id);
        $album->songs()->detach($request->input('song_id'));
        return redirect()->back();
    }

    public function searchSong(Request $request , $id){
        $songs = Song::take(5)
                ->where('name' , 'LIKE' , '%'.$request->term.'%')
                ->whereDoesntHave('albums' , function ($q) use($id){
                    $q->where('albums.id','<>', $id);
        })
        ->get();
        $result = array();
        foreach ($songs as $song){
            $result[] = ['id' =>$song->id , 'value' =>$song->name];
        }
        return response()->json($result);
    }


    public function delete($id)
    {
        $album = Album::find($id);
        $album->songs()->detach();
        if ($album) {
            if (isset($album->image)) {
                Storage::delete('public/' . $album->image);
            }
            $album->delete();
            Session::flash('announcement', 'Delete Success');
            return redirect()->route('album.list');
        } else {
            abort('404');
        }
    }


    public function remove($albumId,$songId = null)
    {
        $songId = $_GET['song'];
        $song = Song::find($songId);
        $detail_album = Album::find($albumId);
        if ($song) {
            $detail_album->songs()->detach($songId);
            Session::flash('announcement', 'Delete Success');
            return redirect()->route('album.detail_album', ['id' => $albumId]);

        } else {
            abort('404');
        }
    }


}

