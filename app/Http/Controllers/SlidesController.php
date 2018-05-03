<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Slide;
use Illuminate\Support\Facades\Storage;

class SlidesController extends Controller
{
    //
    public function index(){
        $slides = Slide::all();
        return view('admin.slide.index',['slides'=>$slides]);
    }

    public function edit(Slide $slide)
    {
        $slide = Slide::find($slide->id);
        return view('admin.slide.edit', ['slide'=>$slide]);

    }

    public function update(Request $request, Slide $slide)
    {
        $slideUpdate = Slide::where('id', $slide->id)->first();
        $this->validate($request,
            [
                'name' => 'required',
                'description' => 'required'
            ],
            [
                'name.required' => 'Bạn chưa nhập tên',
                'description.required' => 'Bạn chưa nhập nội dung'
            ]);
        $slideUpdate->name = $request->name;
        $slideUpdate->description = $request->description;
        if($request->has('link')){
            $slideUpdate->link = $request->link;
        }

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete('' . $slideUpdate->image);
            $slideUpdate->image = $request->file('image')->store('slide/', 'public');
        }
        $slideUpdate->save();
        if($slideUpdate){
            return redirect()->route('slides.index', ['slide' => $slide->id])
                ->with('success', 'slide update successfully');
        }
        return back()->withInput();
    }

    public function create()
    {
        return view('admin.slide.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,
            [
                'name' => 'required',
                'description' => 'required'
            ],
            [
                'name.required' => 'Bạn chưa nhập tên',
                'description.required' => 'Bạn chưa nhập nội dung'
            ]);
        $slide = new Slide();
        $slide->name = $request->name;
        $slide->description = $request->description;
        if($request->has('link')){
            $slide->link = $request->link;
        }
        $slide->image = $request->file('image')->store('slide/', 'public');
        $slide->save();
        return redirect()->route('slides.index', ['slide'=>$slide->id])
            ->with('success', 'slide create successfully');
    }

    public function getXoa(Request $request,$id){
    	$slide= Slide::find($id);
    	$slide->delete();
    	$request->session()->flash('thongbao', 'Xóa thành công!');
    	return redirect('admin/slide/danhsach');
    }

    public function destroy(Slide $slide){

    }
}
