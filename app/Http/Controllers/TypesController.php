<?php

namespace App\Http\Controllers;

use App\Category;
use App\Type;
use Illuminate\Http\Request;

class TypesController extends Controller
{
    //
    public function index(){
        $types = Type::all();
        return view('admin.type.index',['types'=>$types]);
    }

    public function edit(Type $type)
    {
        $categories = Category::all();
        $type = Type::find($type->id);
        return view('admin.type.edit', ['type'=>$type, 'categories'=>$categories]);

    }

    public function update(Request $request, Type $type)
    {
        $typeUpdate = Type::where('id', $type->id)->first();
        $this->validate($request,
            [
                'name' => 'required|unique:types,name|min:1|max:100',
                'id_category' => 'required'
            ],
            [
                'name.required' => 'Bạn chưa nhập tên thể loại',
                'name.unique' => 'Tên thể loại đã tồn tại',
                'name.min' => 'Tên thể loại phải có độ dài từ 3 đến 100 ký tự.',
                'name.max' => 'Tên thể loại phải có độ dài từ 3 đến 100 ký tự.',
                'id_category.required' => 'Bạn chưa chọn thể loại'
            ]);

        $typeUpdate -> name = $request->name;
        $typeUpdate -> id_category = $request->id_category;
        $typeUpdate->unsigned_name = changeTitle($request->name);
        $typeUpdate->save();
        if($typeUpdate){
            return redirect()->route('types.index', ['type' => $type->id])
                ->with('success', 'company update successfully');
        }
        return back()->withInput();
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.type.create', ['categories'=>$categories]);
    }


    public function store(Request $request)
    {
        $this->validate($request,
            [
                'name' => 'required|unique:types,name|min:1|max:100',
                'id_category' => 'required'
            ],
            [
                'name.required' => 'Bạn chưa nhập tên thể loại',
                'name.unique' => 'Tên thể loại đã tồn tại',
                'name.min' => 'Tên thể loại phải có độ dài từ 3 đến 100 ký tự.',
                'name.max' => 'Tên thể loại phải có độ dài từ 3 đến 100 ký tự.',
                'id_category.required' => 'Bạn chưa chọn thể loại'
            ]);
        $type = new Type();
        $type->name = $request->name;
        $type->id_category = $request->id_category;
        $type->unsigned_name = changeTitle($request->name);
        $type->save();
        return redirect()->route('types.index', ['type'=>$type->id])
            ->with('success', 'Type create successfully');


    }
    public function destroy(Type $type)
    {
//        $findType= Type::find($type->id);
//        if($findType->delete()){
//            return redirect()->route('types.index')
//                ->with('success', 'Type deleted successfully');
//        }
    }
}
