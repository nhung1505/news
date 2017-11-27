<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Song;
use App\User;
use App\Album;
use App\Artist;
use App\Comment;

class SongController extends Controller
{
    public function create(Request $request){
        if(isset($request->id)){
            $album=Album::find($request->id);
        }
        $artists =  Artist::all();
        return view('songs.upload',compact('album','artists'));
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
        $song->artist_id = $request->input('artist_id');
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

    public function index(Request $request){
        $artists = Artist::all();
        $songs = Song::orderBy('id', 'desc')->paginate(10);
        $testsession=$request->session()->get('lacale');
        if ($songs){
            return view('songs.list', compact('songs','testsession','artists'));
        } else {
            abort('404');
        }

    }

    public function detailSong(Request $request, $id){
        $detail_song = Song::with('user')->find($id);
        if ($detail_song){
            $comments = $detail_song->comments()->orderBy('id','desc')->paginate(10);
            $lyric = str_limit($detail_song->lyric,100);
        } else {
            abort('404');
        }
        $albums = Album::with('user')->get();
        $artists = Artist::all();
        if ($detail_song){
            return view('songs.details_song', compact('detail_song','albums', 'artists','lyric','comments'));
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

    public function edit(Request $request,$id) {
        $song = Song::find($id);
        $artists =  Artist::all();
        if ($song){
            return view('songs.edit', compact('song','artists'));
        }else{
            abort('404');
        }
    }

    public function update(Request $request, $id) {
        $this->validate($request,[
            'name' => 'required|min:3|max:50',
            'image' => 'mimes:jpeg,jpg,png,svg'
        ]);
        $song = Song::find($id);
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
        $song = Song::find($id);
        if (isset($song)){
            $album->songs()->attach($id);
            return redirect()->route('song.details_song',['id'=>$song->id]);
        } else {
            abort('404');
        }
    }
    public function storeComment(Request $request, $id){
        $song = Song::find($id);
        $comment = new Comment();
        $comment->content = $request->input('content');
        $comment->user_id = Auth::id();
        $comment->save();
        $song->comments()->attach($comment->id);
        return redirect()->back();
    }

    public function deleteComment(Request $request, $id)
    {
        $song = Song::find($id);
        $comment = Comment::find($request->comment_id);
        if (isset($comment)){
            $song->comments()->detach($comment->id);
            $comment->delete();
            return redirect()->back();
        }
    }

}
