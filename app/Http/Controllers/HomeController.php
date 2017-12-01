<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\Song;
use App\Album;
use App\Artist;
use App\User;
use App\Menu;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $songs = Song::orderBy('id', 'desc')->paginate(8);
        $albums = Album::orderBy('id', 'desc')->paginate(8);
        $artists = Artist::orderBy('id','desc')->paginate(10);
        $menu = Menu::all();
        $request->session()->put('menu',$menu );
        
        return view('home', compact('songs', 'albums', 'artists','menu'));

        
    }
}
