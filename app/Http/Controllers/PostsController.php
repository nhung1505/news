<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Type;
use Illuminate\Http\Request;
use App\Comment;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
    //
    public function index(){
        $posts = Post::all();
        return view('admin.post.index',['posts'=>$posts]);
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        $types = Type::all();
        $post = Post::find($post->id);
        return view('admin.post.edit', ['categories'=>$categories, 'types'=>$types,'post'=>$post]);

    }

    public function update(Request $request, Post $post)
    {
        $postUpdate = Post::where('id', $post->id)->first();
        $this->validate($request,
            [
                'title' => 'required|unique:posts,title|min:1|max:100',
                'id_type' => 'required',
                'summary' => 'required',
                'description' =>'required'
            ],
            [
                'id_type.required' => 'Bạn chưa chọn loại tin',
                'title.required' => 'Bạn chưa nhập tiêu đề',
                'title.unique' => 'Tiêu đề đã tồn tại',
                'title.min' => 'Tên tiêu đề  phải có độ dài từ 3 đến 100 ký tự.',
                'title.max' => 'Tên tiêu đề phải có độ dài từ 3 đến 100 ký tự.',
                'summary.required' => 'Bạn chưa nhập tóm tắt',
                'description.required' => 'Bạn chưa nhập nội dung'

            ]);

        $postUpdate->title = $request->title;
        $postUpdate->unsigned_title = changeTitle($request->title);
        $postUpdate->id_type = $request->id_type;
        $postUpdate->summary = $request->summary;
        $postUpdate->description = $request->description;
        $postUpdate->hot = $request->hot;
        if ($request->hasFile('image')) {
            Storage::disk('public')->delete('' . $postUpdate->image);
            $postUpdate->image = $request->file('image')->store('post/', 'public');
        }
        $postUpdate->save();
        if($postUpdate){
            return redirect()->route('posts.index', ['post' => $post->id])
                ->with('success', 'post update successfully');
        }
        return back()->withInput();
    }

    public function create()
    {
        $categories = Category::all();
        $types = Type::all();
        return view('admin.post.create', ['categories' => $categories, 'types' => $types]);
    }

    public function store(Request $request)
    {
        $this->validate($request,
            [
                'title' => 'required|unique:posts,title|min:1|max:100',
                'id_type' => 'required',
                'summary' => 'required',
                'description' =>'required'
            ],
            [
                'id_type.required' => 'Bạn chưa chọn loại tin',
                'title.required' => 'Bạn chưa nhập tiêu đề',
                'title.unique' => 'Tiêu đề đã tồn tại',
                'title.min' => 'Tên tiêu đề  phải có độ dài từ 3 đến 100 ký tự.',
                'title.max' => 'Tên tiêu đề phải có độ dài từ 3 đến 100 ký tự.',
                'summary.required' => 'Bạn chưa nhập tóm tắt',
                'description.required' => 'Bạn chưa nhập nội dung'

            ]);
        $post = new Post();
        $post->title = $request->title;
        $post->unsigned_title = changeTitle($request->title);
        $post->id_type = $request->id_type;
        $post->summary = $request->summary;
        $post->description = $request->description;
        $post->image = $request->file('image')->store('post/', 'public');
        $post->hot = 0;
        $post->save();
        return redirect()->route('posts.index', ['post'=>$post->id])
            ->with('success', 'Post create successfully');
    }

    public function destroy(Post $post)
    {
//    	$findPost= Post::find($post->id);
//        if($findPost->delete()){
//           return redirect()->route('posts.index')
//               ->with('success', 'Post deleted successfully');
//        }
    }
}
