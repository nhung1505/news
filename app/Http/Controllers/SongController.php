<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\Song;
use App\User;
use App\Album;

class SongController extends Controller
{
    public function create(Request $request){
        if(isset($request->id)){
            $album=Album::find($request->id);
        }
        return view('songs.upload',compact('album'));
    }

    public function upload(Request $request){
        $this->validate($request,[
            'name' => 'required|min:3|max:50',
            'audio' => 'required|mimes:mpga',
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

        if ($request->album_id){
            $album = Album::find($request->input('album_id'));
            $album->songs()->attach($song->id);
            Session::flash('announcement','Upload Success!');
            return redirect()->route('album.detail_album',['id'=>$album->id]);
        }
        if ($request->input('check') != 1) {
            Session::flash('announcement','Add Success');
            return redirect()->route('song.list');
        } else {
            Session::flash('announcement','Add Success');
            return redirect()->back();
        }
    }

    public function index(){
        $songs = Song::orderBy('id', 'desc')->paginate(10);
        if ($songs){
            return view('songs.list', compact('songs'));
        } else {
            abort('404');
        }
        
    }

    public function detailSong($id){
        $detail_song = Song::with('user')->find($id);
        $albums = Album::with('user')->get();
        if ($detail_song){

            return view('songs.details_song', compact('detail_song','albums'));

        } else {
            
            abort('404');
        }
    }

    public function delete($id){
        $song = Song::find($id);
        if ($song){
            if(isset($song->image)){
                Storage::delete('public/'.$song->image);
            }
            Storage::delete('public/'.$song->audio);
            $song->albums()->detach();
            $song->delete();
            Session::flash('announcement','Delete Success');
            return redirect()->route('song.list');
        } else {
            abort('404');
        }
    }

    public function edit($id) {
        $song = Song::find($id);
        if ($song){
            return view('songs.edit', compact('song'));;
        }else{
            abort('404');
        }
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
        $song->name = $request->input('name');
        $song->lyric = $request->input('lyric');
        $song->description = $request->input('description');
        $song->save();
        Session::flash('announcement','Edit Success!');
        return redirect()->route('song.details_song', ['id' => $id]);
    }

    public function search(Request $request)
    {
        $key = $request->input('key');

        $songs = Song::where('name', 'like', '%' . $key . '%')->paginate(10);
        return view('songs.search', compact('key', 'songs', 'albums'));
    }

    public function addSong(Request $request, $id){
        $album = Album::find($request->input('album_id'));
        dd($album);
        $song = Song::find($id);
        if (isset($song)){
            $album->songs()->attach($request->input('song_id'));
            return redirect()->route('song.details_song',['id'=>$song->id]);
        } else {
            abort('404');
        }
    }

}
