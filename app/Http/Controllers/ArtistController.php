<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Album;
use App\Song;
use App\User;
use App\Artist;

class ArtistController extends Controller
{
    
    public function index(){
        $artists = Artist::orderBy('id','desc')->paginate(8);
        return view('artists.list' , compact('artists'));
    }

    public function create(Request $request)
    {
        if (isset($request->id)){
            $song = Song::find($request->id);
        }
        return view('artists.create',compact('song'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3|max:50',
            'image' => 'mimes:jpeg,jpg,png,svg'
        ]);
        $artist = new Artist();
        $artist->name = $request->input('name');
        if ($request->hasFile('image')) {
            $artist->image = $request->file('image')->store('image_artists/' . auth()->id(), 'public');

        }
        $artist->dob = $request->input('dob');
        $artist->stage_name = $request->input('stage_name');
        $artist->description = $request->input('description');
        $artist->user_id = Auth::id();
        $artist->save();
        if (isset($request->id)){
            $song = Song::find($request->id);
            return redirect()->route('song.details_song',['id'=>$song->id]);
        }
        return redirect()->route('artist.list');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }






}
