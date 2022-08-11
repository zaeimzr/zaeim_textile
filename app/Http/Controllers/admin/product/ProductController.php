<?php

namespace App\Http\Controllers\admin\product;

use App\Http\Controllers\Controller;
use App\Models\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(int $fabricId){
        $products=product::where('fabric_id',$fabricId)->get();
        return view('admin.product.productList',compact('products','fabricId'));
    }

    public function create(int $fabricId){
        $product=product::where('fabric_id',$fabricId)->get()->first;

        return view('admin.product.create',compact('product','fabricId'));
    }
    public function store(Request $request,int $fabricId){
//        dd($request->color_code);
        $request->validate([
            'title' => [ 'string', 'max:30'],
            'color_code'=>['numeric'],
            'capacity'=>['numeric'],
            'price'=>['numeric'],
        ]);
        $product=new product([
            'fabric_id'=>$fabricId,
            'color_hex'=>$request->color_hex,
            'capacity'=>$request->capacity,
            'color_code'=>$request->color_code,
            'price'=>$request->price,

        ]);
        $product->save();
        $msg="کد جدید ثبت گردید";
        return redirect(route('admin.product',$fabricId))->with('success',$msg);

    }

    public function edit(product $product){
        return view('admin.product.edit',compact('product'));
    }

    public function update(Request $request , product $product){
        $request->validate([
            'title' => [ 'string', 'max:30'],
            'color_code'=>['numeric'],
            'capacity'=>['numeric'],
            'price'=>['numeric'],
        ]);
        $product->color_code= $request->color_code;
        $product->capacity= $request->capacity;
        $product->price= $request->price;
        $product->color_hex= $request->color_hex;

        $product->save();
        $msg="ویرایش انجام شد";
        return redirect(route('admin.product',$product->fabric->id))->with('success',$msg);
    }

    public function delete(product $product){
        $product->delete();
        $msg="کد مدنظر حذف گردید";
        return redirect(route('admin.product',$product->fabric->id))->with('warning',$msg);
    }
}
