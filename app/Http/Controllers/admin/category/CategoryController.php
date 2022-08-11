<?php

namespace App\Http\Controllers\admin\category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use function PHPUnit\Framework\containsIdentical;

class CategoryController extends Controller
{
    public function index(){
        $categories=Category::get();
        return view('admin.category.categoriesList',compact('categories'));
    }

    public function create(){
        return view('admin.category.create');
    }

    public function store (Request $request){
        $request->validate([
            'title' => ['required', 'string', 'max:30'],
            'description' => [ 'string', 'max:255', ],
        ]);

        $category=new Category([
            'title'=>$request->title,
            'description'=>$request->description,
        ]);
        $category->save();
        $msg="دسته بندی جدید ثبت گردید";
        return redirect(route('admin.category'))->with('success',$msg);

    }

    public function edit(Category $category){
        return view('admin.category.edit',compact('category'));
    }

    public function update(Request $request,Category $category ){
        $request->validate([
            'title' => ['required', 'string', 'max:30'],
            'description' => [ 'string', 'max:255', ],
        ]);
        $category->title= $request->title;
        $category->description= $request->description;
        $category->save();
        $msg="ویرایش انجام شد";
        return redirect(route('admin.category'))->with('success',$msg);
    }

    public function delete(Category $category){
        $category->delete();
        $msg="دسته مدنظر حذف گردید";
        return redirect(route('admin.category'))->with('warning',$msg);
    }
}
