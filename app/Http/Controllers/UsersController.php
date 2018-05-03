<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoaiTin;
use App\TheLoai;
use App\TinTuc;
use App\Comment;
use App\Slide;
use App\User;
use Illuminate\Support\Facades\Auth; // phải có lớp này mới có thể sử dụng để đăng nhập
class UsersController extends Controller
{
    
	// đăng nhập
	public function show_admin_sign_in(){
		return view('admin.login');
	}

	public function post_admin_sign_in(Request $request){
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
		$data = ['email'=>$request->email,'password'=>$request->password];
		// kiểm tra đăng nhập
		if(Auth::attempt($data)){
			return route('categories.index');
		}else{
			return view('admin.login');
		}
	}

	public function sign_admin_out(){
		Auth::logout();
		return redirect('admin/dangnhap');
	}

//
//    public function getDanhSach(){
//    	$user = User::all();
//    	return view('admin.user.danhsach',['user'=>$user]);
//    }

//    public function getSua($id){
//    	$user = User::find($id);
//    	return view('admin.user.sua',['user'=>$user]);
//    }
//    public function postSua(Request $request,$id){
//    	$this->validate($request,
//    		[
//    			'name' => 'required|min:3'
//    		],
//    		[
//    			'name.required' => 'Bạn chưa nhập tên người dùng',
//    			'name.min' => 'Tên người dùng phải có ít nhất 3 kí tự'
//    		]);
//    	$user = User::find($id);
//    	$user->name = $request->name;
//    	$user->quyen = $request->quyen;
//
//    	if($request->changePassword == "on"){
//    		$this->validate($request,
//	    		[
//	    			'password'=>'required|min:3|max:32',
//	    			'passwordAgain' =>'required|same:password'
//	    		],
//	    		[
//	    			'password.required' => 'Bạn chưa nhập mật khẩu',
//	    			'password.min' => 'Mật khẩu phải có ít nhất 3 kí tự',
//	    			'password.max' => 'Mật khẩu chỉ được phép tối đa 32 kí tự',
//	    			'passwordAgain.required' => 'Bạn chưa nhập lại mật khẩu',
//	    			'passwordAgain.same' => 'Mật khẩu nhập lại chưa đúng'
//	    		]);
//    		$user->password = bcrypt($request->password);
//    	}
//
//    	$user->save();
//    	$request->session()->flash('thongbao', 'Bạn đã sửa thành công!');
//    	return redirect('admin/user/sua/'.$id);
//
//    }

//    public function getThem(){
//		return view('admin.user.them');
//    }
//    public function postThem(Request $request){
//    	$this->validate($request,
//    		[
//    			'name' => 'required|min:3',
//    			'email' => 'required|email|unique:users,email',
//    			'password'=>'required|min:3|max:32',
//    			'passwordAgain' =>'required|same:password'
//    		],
//    		[
//    			'name.required' => 'Bạn chưa nhập tên người dùng',
//    			'name.min' => 'Tên người dùng phải có ít nhất 3 kí tự',
//    			'email.required' => 'Bạn chưa nhập vào địa chỉ email',
//    			'email.email' =>'Bạn chưa nhập đúng định dạng email',
//    			'email.unique' =>'Email đã tồn tại',
//    			'password.required' => 'Bạn chưa nhập mật khẩu',
//    			'password.min' => 'Mật khẩu phải có ít nhất 3 kí tự',
//    			'password.max' => 'Mật khẩu chỉ được phép tối đa 32 kí tự',
//    			'passwordAgain.required' => 'Bạn chưa nhập lại mật khẩu',
//    			'passwordAgain.same' => 'Mật khẩu nhập lại chưa đúng'
//    		]);
//    	$user = new User;
//    	$user->name = $request->name;
//    	$user->email = $request->email;
//    	$user->password = bcrypt($request->password);
//    	$user->quyen = $request->quyen;
//
//
//    	$user->save();
//    	$request->session()->flash('thongbao', 'Bạn đã thêm thành công!');
//    	return redirect('admin/user/them');
//
//    }

//    public function getXoa(Request $request,$id){
//    	$user= User::find($id);
//    	$user->delete();
//    	$request->session()->flash('thongbao', 'Xóa thành công!');
//    	return redirect('admin/user/danhsach');
//    }
}
