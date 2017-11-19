<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $menu = Menu::all();
        $request->session()->put('menu',$menu );
        return redirect()->route('song.list');
    }
}
