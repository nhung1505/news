<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Slide;
use App\Type;
use App\User;
use Illuminate\Http\Request;
//use App\LoaiTin;
//use App\TinTuc;
//use App\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage; // phải có lớp này mới có thể sử dụng để đăng nhập
class PagesController extends Controller
{

    function __construct(){
        $categories = Category::all();
        $slides = Slide::all();
        view()->share('categories',$categories);
        view()->share('slides',$slides);
        if(Auth::check()){
            view()->share('user',Auth::user());
        }
    }

    function index(){
        return view('pages.index');
    }

    function post($id){
        $post = Post::find($id);
        $hots = Post::where('hot',1)->take(4)->get();
        $related_news = Post::where('id_type',$post->id_type)->take(4)->get();
        return view('pages.post',['post'=>$post,'hots'=>$hots,'related_news'=>$related_news]);
    }

    function contact(){
        return view('pages.contact');
    }
    function introduce(){
        return view('pages.introduce');
    }

    function type($id){
        $type = Type::find($id);
        $posts = Post::where('id_type',$id)->paginate(5);
        return view('pages.type',['type'=>$type,'posts'=>$posts]);
    }
    function show_sign_in(){
        return view('pages.sign_in');
    }

    function post_sign_in(Request $request){

        $this->validate($request,
            [
                'email' =>'required',
                'password'=>'required|min:3|max:32'
            ],
            [
                'email.required' => 'Bạn chưa nhập email',
                'password.required' => 'Bạn chưa nhập password',
                'password.min' => 'Password không được nhỏ hơn 3 kí tự',
                'password.max' =>'Password không được lớn hơn 32 kí tự'
            ]);

        $data = [
            'email'=>$request->email,
            'password'=>$request->password
        ];
        // check sign_in
        if(Auth::attempt($data)){
            return redirect('index');
        }else{
            $request->session()->flash('loi', 'Đăng nhập thất bại');
            return redirect('sign_in');
        }

    }
    function sign_out(){
        Auth::logout();
        return redirect('index');
    }
    function show_resign(){
        return view('pages.resign');
    }
//
    function resign(Request $request){
        $this->validate($request,
            [
                'name' => 'required|min:3',
                'email' => 'required|email|unique:users,email',
                'password'=>'required|min:3|max:32',
                'password_again' =>'required|same:password'
            ],
            [
                'name.required' => 'Bạn chưa nhập tên người dùng',
                'name.min' => 'Tên người dùng phải có ít nhất 3 kí tự',
                'email.required' => 'Bạn chưa nhập vào địa chỉ email',
                'email.email' =>'Bạn chưa nhập đúng định dạng email',
                'email.unique' =>'Email đã tồn tại',
                'password.required' => 'Bạn chưa nhập mật khẩu',
                'password.min' => 'Mật khẩu phải có ít nhất 3 kí tự',
                'password.max' => 'Mật khẩu chỉ được phép tối đa 32 kí tự',
                'password_again.required' => 'Bạn chưa nhập lại mật khẩu',
                'password_again.same' => 'Mật khẩu nhập lại chưa đúng'
            ]);
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = 0;
        $user->save();
        $request->session()->flash('thongbao', 'Bạn đã đăng ký thành công!');
        return redirect('resign');
    }

        function search(Request $request){
            $key = $request->key;
            $posts = Post::where('title','like',"%$key%")->orWhere('summary','like',"%$key%")->orWhere('description','like',"%$key%")->take(30)->paginate(5);
            return view('pages.search',['posts'=>$posts,'key'=>$key]);
    }
        function get_user(){
            return view('pages.user');
    }
    function post_user(Request $request){
        $this->validate($request,
            [
                'name' => 'required|min:3'
            ],
            [
                'name.required' => 'Bạn chưa nhập tên người dùng',
                'name.min' => 'Tên người dùng phải có ít nhất 3 kí tự'
            ]);
        $user = Auth::user();
        $user->name = $request->name;
        if($request->check_password == "on"){
            $this->validate($request,
                [
                    'password'=>'required|min:3|max:32',
                    'password_again' =>'required|same:password'
                ],
                [
                    'password.required' => 'Bạn chưa nhập mật khẩu',
                    'password.min' => 'Mật khẩu phải có ít nhất 3 kí tự',
                    'password.max' => 'Mật khẩu chỉ được phép tối đa 32 kí tự',
                    'password_again.required' => 'Bạn chưa nhập lại mật khẩu',
                    'password_again.same' => 'Mật khẩu nhập lại chưa đúng'
                ]);
            $user->password = bcrypt($request->password);
        }

        $user->save();
        $request->session()->flash('thongbao', 'Bạn đã sửa thành công!');
        return redirect('user');
    }



 public function create_post($id){
        $post = Post::find($id);
        $hots = Post::where('hot',1)->take(4)->get();
        $related_news = Post::where('id_type',$post->id_type)->take(4)->get();
        return view('pages.admin_create_post',['post'=>$post,'hots'=>$hots,'related_news'=>$related_news]);
    }
public function upload_post(Request $request,$id){
        $post = Post::find($id);
        $hots = Post::where('hot',1)->take(4)->get();
        $related_news = Post::where('id_type',$post->id_type)->take(4)->get();
        $post->title = $request->title;
        $post->unsigned_title = changeTitle($request->title);
        $post->description = $request->description;
        if ($request->hasFile('image')) {
            Storage::disk('public')->delete('' . $post->image);
            $post->image = $request->file('image')->store('post', 'public');
        }

        $post->save();
        $request->session()->flash('thongbao', 'Bạn đã sửa thành công!');
        return view('pages.admin_create_post',['post'=>$post,'hots'=>$hots,'related_news'=>$related_news]);

}

//

//



//
//

}
