<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\Comment;
use Illuminate\Support\Facades\Auth; // phải có lớp này mới có thể sử dụng để đăng nhập
class CommentsController extends Controller
{


    public function get_delete(Request $request,$id,$id_post){
        $comment= Comment::find($id);
        $comment->delete();
        $request->session()->flash('success', 'Xóa comment thành công!');
        return redirect()->route('posts.edit', ['id_post' => $id_post]);

//        return redirect('admin/posts/edit/'.$id_post);
    }
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
