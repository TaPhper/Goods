<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Goods;
use App\Models\Home\Shops;
class ShopController extends Controller
{
	// 购物车首页
    public function shopcart(Request $request)
    {
    	$id = $request->id;
    	$user_id = session()->get('login_user')['user_id'];
    	if($user_id){
	    	if($id){
	    		// 获取商品数据
		    	$goods = Goods::where('goods_id',$id)->first();
		    	// 登录用户信息
		    	// dump($goods);die;
		    	if(!$shop = Shops::where('good_id','=',$goods['goods_id'])->first()){
		    		$shop = new Shops;
			    	$shop->user_id = $user_id;
			    	$shop->good_id = $goods['goods_id'];
			    	$shop->gname = $goods['gname'];
			    	$shop->gnum = 1;
			    	$shop->sales_grice = $goods['sales_grice'];
			    	$shop->save();
		    	}
	    	}
	    	$shop = Shops::where('user_id',$user_id)->get();
    	}else{
    		// 匿名用户
    	}
    	
    	
    	
    	return view('home.shop.index',['shop'=>$shop]);
    }
    // 点击减
    public function down(Request $request)
    {
    	$id = $request->id;
    	$gnum = $request->num;
    	$sales_grice = $request->html;
    	$shop = Shops::where('good_id','=',$id)->first();
    	$shop->gnum = $gnum;
    	$shop->sales_grice = $sales_grice*$gnum;
    	$res = $shop->save();
    	echo $shop->sales_grice;
    }
    // 点击加
    public function up(Request $request)
    {
    	$id = $request->id;
    	$gnum = $request->num;
    	$sales_grice = $request->html;
    	$shop = Shops::where('good_id','=',$id)->first();
    	$shop->gnum = $gnum;
    	$shop->sales_grice = $sales_grice*$gnum;
    	$res = $shop->save();
    	echo $shop->sales_grice;
    }

    public function destroy($id)
    {
    	$shop = Shops::find($id)->delete();
    	
    	if($shop){
            return redirect('/home/shopcart')->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
       	}
    }
}
