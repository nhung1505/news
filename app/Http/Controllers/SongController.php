<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\Song;
use App\User;

class SongController extends Controller
{
    public function create(){

        return view('songs.upload');

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
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

        Session::flash('announcement','Add Success');

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

            return view('songs.details_song', compact('detail_song','size_mb'));

        }else{
            
            abort('404');
        }


    }
    public function delete($id){
        $song = Song::find($id);
        if ($song){
            Storage::delete('public/'.$song->image);
            Storage::delete('public/'.$song->audio);
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

    public function search(Request $request) {
        $key = $request->input('key');
        $songs = Song::where('name', 'like', '%'.$key.'%')->paginate(10);
        return view('songs.search', compact('key','songs'));
    }
}
