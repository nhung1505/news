<?php

namespace App\Http\Controllers;

use App\Menu;
use App\User;
use App\Role;
use App\Song;
use App\Album;
use App\Artist;
use App\Comment;
use App\Commentalbum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{
    public function index(Request $request){
        $menu = Menu::all()->sortBy('oder');
        $request->session()->put('menu',$menu);
        $users = User::all();
        return view('manager.menu',compact('menu','users'));
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

    public function createUser(){
        $roles = Role::all();
        return view('manager.create_user',compact('roles'));
    }

    public function storeUser(Request $request){
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',

        ]);

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->role = $request->input('role');
        $user->save();
        return redirect()->route('menu');

    }

    public function editRoleUser(Request $request, $id){
        $user = User::find($id);
        $roles = Role::all();
        return view('manager.edit_user',compact('roles','user'));
    }

    public function updateUser(Request $request, $id){
        $user = User::find($id);
        if ($user){
            $user->role = $request->input('role');
            $user->save();
            return redirect()->route('menu');
        } else {
            abort('404');
        }

    }


    public function deleteUser(Request $request){
        $user = User::find($request->id);
        if ($user){
            $song = Song::where('user_id','=',$request->id)->update(['user_id'=>null]);
            $album = Album::where('user_id','=',$request->id)->update(['user_id'=>null]);
            $artist = Artist::where('user_id','=',$request->id)->update(['user_id'=>null]);
            $comment = Comment::where('user_id','=',$request->id)->update(['user_id'=>null]);
            $commentalbum = Commentalbum::where('user_id','=',$request->id)->update(['user_id'=>null]);
            $user->delete();
            return redirect()->route('menu');
        } else {
            abort('404');
        }

    }

}
