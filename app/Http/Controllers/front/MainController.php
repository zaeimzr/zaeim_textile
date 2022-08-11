<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\product;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function products(){
        $products = Product::get();
        return view('front.products',compact('products'));
    }

    public function order(){
        $userID=auth()->id();
        if (Order::where('user_id',$userID)->where('status',0)->first() == null){
            $order=new Order([
                'user_id'=>$userID,
                'status'=>0
            ]);
            $order->save();
        }else{
            $order=Order::where('user_id',$userID)->where('status',0)->first();
        }
        $ids=cache()->get('ids');
        DB::table('order_product')->where('order_id',$order->id)->delete();
        foreach ($ids as $id){
            $product_id=$id[0];
                $product=product::where('id',$product_id)->first();
                $order->products()->attach($product,['length'=>$id[1]]);
        }
        $items=$order->products;
        return view('front.order',compact('items'));
    }

    public function ajax(Request $request){
        cache()->put('ids',$request->ids,50000);
    }
}
