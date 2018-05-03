<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\LoaiTin;
use App\TheLoai;
use App\TinTuc;
use App\Comment;
use Illuminate\Support\Facades\Auth; // phải có lớp này mới có thể sử dụng để đăng nhập
class CommentsController extends Controller
{

//    public function destroy(Request $request,$id,$idTinTuc){
//    	$comment= Comment::find($id);
//    	$comment->delete();
//    	$request->session()->flash('thongbao', 'Xóa comment thành công!');
//    	return redirect('admin/post/sua/'.$idTinTuc);
//    }

    public function comment(Request $request,$id){
        $post = Post::find($id);
        $comment = new Comment();
        $comment->id_post = $id;
        $comment->id_user = Auth::user()->id;
        $comment->description = $request->description;
        $comment->save();
        return back();
        }
}
