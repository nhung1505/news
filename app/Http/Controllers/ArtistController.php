<?php

namespace App\Http\Controllers;

use App\Artist;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    public function index(){
        $artists = Artist::orderBy('id','desc')->paginate(8); ;
        return view('artists.list' , compact('artists'));
    }


}
