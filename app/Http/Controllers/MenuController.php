<?php

namespace App\Http\Controllers;

use App\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(Request $request){
        $menu = Menu::all()->sortBy('oder');
        $request->session()->put('menu',$menu);
        return view('manager.menu',compact('menu'));
    }

    public function create(){
        return view('manager.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required|min:3|max:50',
            'link' => 'required|unique:menus|max:50',
            'oder' => 'required|unique:menus'
        ]);

        $menu = new Menu();
        $menu->name = $request->input('name');
        $menu->link = $request->input('link');
        $menu->oder = $request->input('oder');
        $menu->save();
        return redirect()->route('menu');

    }

    public function edit($id){
        $menu = Menu::find($id);

        return view('manager.edit',compact('menu'));

    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|min:3|max:50',
            'link' => 'required:menus|max:50',
            'oder' => 'required:menus'
        ]);

        $menu = Menu::find($id);
        $menu->name = $request->input('name');
        $menu->link = $request->input('link');
        $menu->oder = $request->input('oder');

        $allMenu = Menu::all();

        foreach ($allMenu as $item){
            if ($item->oder >= $request->input('oder')){
                $item = Menu::where('oder','=',$request->input('oder'))->update(['oder'=>($item->oder + 1)]);

            }else{}

            $menu->save();
        }

        return redirect()->route('menu');
    }

    public function delete(Request $request, $id){
        $menu =Menu::find($id);
        $menu->delete();
        return redirect()->route('menu');

    }
}
