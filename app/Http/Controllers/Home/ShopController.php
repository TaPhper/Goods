<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Goods;


class ShopController extends Controller
{
	// 购物车首页
    public function shopcart()
    {
    	 $carts = session('carts');
    	 // dump($carts);die;
    	 $cnt = 0;
    	 $sum = 0;
    	 foreach($carts as $k=>$v){
    	 	$cnt += $v['cnt'];
    	 	$sum += $v['market_price'] * $v['cnt'];
    	 }

    	 session(['orders.cnt'=>$cnt]);
    	 session(['orders.sum'=>$sum]);


    	return view('home.shop.index',[
    		                    'carts'=>$carts,
    		                     'cnt' =>$cnt,
    		                     'sum' =>$sum

              ]);
    
    }

     public function save(Request $request,$id)
    {
         $goods=Goods::find($id);
         // dump($goods);
         $goods->cnt = $request->input('cnt');

        session(["carts.$id"=>$goods]);
        // $request->session()->push('carts', $goods);
        // dump(session('cate'));
        return back()->with('success','添加购物车成功');
    }

}
