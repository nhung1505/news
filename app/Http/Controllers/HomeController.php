<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
	public function index()
	{
		return view('upload');
	}
	/**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $stt = $request->input('stt');
        $num = $request->input('num');
        $name = $request->input('name');
        $file = $request->file('file');
        $file->move(public_path().'/uploads', $file->getClientOriginalName().$stt);
        
        if ($stt == $num) {
            $this->chunk($num, $name);
        }
    }

    public function chunk($number, $name) {
        $target_file = public_path().'\uploads\blob';
        for ($i = 1; $i <= 4; $i++) {
            $file = fopen($target_file.$i, 'r');
            $buff = fread($file, 256000);
            fclose($file);

            $final = fopen(public_path().'/uploads/'.$name, 'a');
            $write = fwrite($final, $buff);
            fclose($final);

            unlink($target_file.$i);
        }
    }
}