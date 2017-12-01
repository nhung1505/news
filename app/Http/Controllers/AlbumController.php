<?php

namespace App\Http\Controllers;

use App\Likealbum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\Album;
use App\Song;
use App\User;
use App\Commentalbum;

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
        $detail_album = Album::with('user', 'songs','commentalbums')->find($id);
        if ($detail_album) {
            $commentAlbums = $detail_album->commentalbums()->orderBy('id','desc')->paginate(5);
            $AllcommentAlbums = $detail_album->commentalbums()->orderBy('id','desc')->get();
            return view('albums.detail_album', compact('detail_album','commentAlbums','AllcommentAlbums'));

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
        $this->validate($request, [
            'name' => 'required|min:3|max:50',
            'image' => 'mimes:jpeg,jpg,png,svg'
        ]);
        $album = Album::find($id);
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

    public function searchAddSong(Request $request,$id )
    {
        $album = Album::find($id);
        $user = User::find(Auth::id());
        if (isset($request->song_add)){
            $songAdd = Song::find($request->song_add);
        }
        return view('albums.search_add',compact('album','songAdd','user'));
    }

    public function addSong(Request $request , $id )
    {
        $album = Album::find($id);
        $song_add = Song::find($request->input('song_id'));
        $album->songs()->attach($request->input('song_id'));
        return redirect(route('album.search_add',['id'=>$album->id,'song_add'=>$song_add]));

    }

    public function removeSongSearchAdd(Request $request,$id)
    {
        $album = Album::find($id);
        $album->songs()->detach($request->input('songAdd_id'));
        return redirect()->route('album.search_add',['id'=>$album->id]);
    }

    public function searchSong(Request $request , $id)
    {
        $songs = Song::
                where('name' , 'LIKE' , '%'.$request->term.'%')
                ->whereDoesntHave('albums' , function ($q) use($id){
                    $q->where('albums.id','<>', $id);
        })->get();
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

    public function storeCommentAlbum(Request $request, $id)
    {
        $this->validate($request, [
            'content' => 'required|min:1|max:50',
        ]);
        $album = Album::find($id);
        $commentAlbum = new Commentalbum();
        $commentAlbum->content = $request->input('content');
        $commentAlbum->user_id = Auth::id();
        $commentAlbum->save();
        $album->commentalbums()->attach($commentAlbum->id);
        return redirect()->back();

    }

    public function deleteComment(Request $request, $id)
    {
        $album = Album::find($id);
        $comment = Commentalbum::find($request->comment_id);
        if (isset($comment)){
            $album->commentalbums()->detach($comment->id);
            $comment->delete();
            return redirect()->back();
        }
    }

    public function like($id){
        $album = Album::find($id);
        $album = Album::where('id',$album->id)->update(['likes'=>$album->likes + 1]);

        return redirect()->route('album.detail_album',$id);
    }
}
