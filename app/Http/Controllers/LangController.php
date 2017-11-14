<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LangController extends Controller
{
    public function postLang(Request $request)
    {
        $request->session()->put("locale", $request->input('locale'));

//        dd($request->session()->get('lacale'));

        return redirect()->back();
    }
}