<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    //
    public function index(){
    	$categories = Category::all();
    	return view('admin.category.index',['categories'=>$categories]);
    }

    public function edit(Category $category)
    {
        $category = Category::find($category->id);
        return view('admin.category.edit', ['category'=>$category]);

    }
    public function update(Request $request, Category $category)
    {
        $categoryUpdate = Category::where('id', $category->id)->first();
    	$this->validate($request,
    		[
    			'name' => 'required|unique:categories,name|min:3|max:100'
    		]
    		,[
    			'name.required' => 'Bạn chưa nhập tên thể loại',
    			'name.unique' => 'Tên thể loại đã tồn tại',
    			'name.min' => 'Tên thể loại phải có độ dài từ 3 đến 100 ký tự.',
    			'name.max' => 'Tên thể loại phải có độ dài từ 3 đến 100 ký tự.'
    		]);

        $categoryUpdate -> name = $request->name;
        $categoryUpdate->unsigned_name = changeTitle($request->name);
        $categoryUpdate->save();
        if($categoryUpdate){
            return redirect()->route('categories.index', ['category' => $category->id])
                ->with('success', 'company update successfully');
        }
        return back()->withInput();
    }
    	
//    	$request->session()->flash('thongbao', 'Sửa thành công!');
//    	return redirect('admin/theloai/sua/'.$categoryUpdate->id);
//
//    }
    public function create()
    {
		return view('admin.category.create');
    }

    public function store(Request $request)
    {
    	//echo $request->Ten;
    	$this->validate($request,
    		[
    			'txtCateName' => 'required|unique:categories,name|min:3|max:100'
    		],
    		[
    			'txtCateName.required' => 'Bạn chưa nhập tên thể loại',
    			'txtCateName.unique' => 'Tên thể loại đã tồn tại',
    			'txtCateName.min' => 'Tên thể loại phải có độ dài từ 3 đến 100 ký tự.',
    			'txtCateName.max' => 'Tên thể loại phải có độ dài từ 3 đến 100 ký tự.'
    		]);
    	$category = new Category();
        $category->name = $request->txtCateName;
        $category->unsigned_name = changeTitle($request->txtCateName);
        $category->save();
        return redirect()->route('categories.index', ['category'=>$category->id])
            ->with('success', 'Category create successfully');
//    	$request->session()->flash('thongbao', 'Bạn đã thêm thành công!');
//    	return redirect('admin/theloai/danhsach');

    }

    public function destroy(Category $category)
    {
    	$findCategory= Category::find($category->id);
        if($findCategory->delete()){
            return redirect()->route('categories.index')
                ->with('success', 'Category deleted successfully');
        }
//    	$request->session()->flash('thongbao', 'Xóa thành công!');
//    	return redirect('admin/theloai/danhsach');
    }

//    public function destroy(Company $company)
//    {
//        $findCompany = Company::find($company->id);
//        foreach ($findCompany->projects as $project){
//            $project_id = $project->id;
//            $project = Project::where('id', '=', $project_id)->update(['company_id'=>null]);
//        }
//        Storage::delete('public/'.$findCompany->company_image);
//        if($findCompany->delete()){
//            return redirect()->route('companies.index')
//                ->with('success', 'Company deleted successfully');
//        }
//        return back()->withInput()->with('errors', 'Company could not be delete ');
//    }

//    public function destroy(Company $company)
//    {
//        $findCompany = Company::find($company->id);
//        foreach ($findCompany->projects as $project){
//            $project_id = $project->id;
//            $project = Project::where('id', '=', $project_id)->update(['company_id'=>null]);
//        }
//        Storage::delete('public/'.$findCompany->company_image);
//        if($findCompany->delete()){
//            return redirect()->route('companies.index')
//                ->with('success', 'Company deleted successfully');
//        }
//        return back()->withInput()->with('errors', 'Company could not be delete ');
//    }
}
