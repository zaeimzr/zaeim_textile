<?php

namespace App\Http\Controllers\admin\fabric;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Fabric;
use Illuminate\Http\Request;

class FabricController extends Controller
{
    public function index(){
        $fabrics=Fabric::get();
        return view('admin.fabric.fabricsList',compact('fabrics'));
    }

    public function create(){
        return view('admin.fabric.create');
    }

    public function store(Request $request){
        $request->validate([
            'title' => ['required', 'string', 'max:30'],
        ]);
        $fabric=new Fabric([
            'title'=>$request->title,
            'category_id'=>$request->category_id,
        ]);
        $fabric->save();
        $msg="پارچه جدید ثبت گردید";
        return redirect(route('admin.fabric'))->with('success',$msg);

    }

    public function edit(Fabric $fabric){
        return view('admin.fabric.edit',compact('fabric'));
    }

    public function update(Request $request , Fabric $fabric){
        $request->validate([
            'title' => ['required', 'string', 'max:30'],
        ]);
        $fabric->title= $request->title;
        $fabric->category_id= $request->category_id;
        $fabric->save();
        $msg="ویرایش انجام شد";
        return redirect(route('admin.fabric'))->with('success',$msg);
    }

    public function delete(Fabric $fabric){
        $fabric->delete();
        $msg="پارچه مدنظر حذف گردید";
        return redirect(route('admin.fabric'))->with('warning',$msg);
    }
}
