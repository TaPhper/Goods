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
    	if($id){
    		// 获取商品数据
	    	$goods = Goods::where('goods_id',$id)->first();
	    	// 登录用户信息
	    	if(!$shop = Shops::where('good_id','=',$goods['goods_id'])->where('user_id','=',$user_id)->first()){
	    		$shop = new Shops;
		    	$shop->user_id = $user_id;
		    	$shop->good_id = $goods['goods_id'];
                $shop->gname = $goods['gname'];
		    	$shop->goods_img = $goods['goods_img'];
		    	$shop->gnum = 1;
                $shop->sales_grice = $goods['sales_grice'];
		    	$shop->grice = $goods['sales_grice'];
		    	$shop->save();
	    	}
    	}
        if($user_id != 0){
            // 登录之后 匿名商品改成登录用户的商品
            $xshop = Shops::where('user_id','=',0)->get();
            foreach($xshop as $k=>$v){
                $xshop = Shops::where('id',$v->id)->first();
                if(!$shopp = Shops::where('good_id','=',$xshop->good_id)->where('user_id','=',$user_id)->first()){
                    $v->user_id = $user_id;
                    $v->save();
                }else{
                    $v->delete();
                }
                
            }
            
        }

        $shop = Shops::where('user_id',$user_id)->get();
    	$nshop = Shops::where('user_id',$user_id)->first();
    	return view('home.shop.index',['shop'=>$shop,'nshop'=>$nshop]);
    }
    // 点击减
    public function down(Request $request)
    {  
        $user_id = $request->user_id;
    	$id = $request->id;
    	$gnum = $request->num;
    	$sales_grice = $request->html;
    	$shop = Shops::where('good_id','=',$id)->where('user_id','=',$user_id)->first();
    	$shop->gnum = $gnum;
    	$shop->sales_grice = $sales_grice*$gnum;
    	$res = $shop->save();
    	echo $shop->sales_grice;
    }
    // 点击加
    public function up(Request $request)
    {
        $user_id = $request->user_id;
    	$id = $request->id;
    	$gnum = $request->num;
    	$sales_grice = $request->html;
    	$shop = Shops::where('good_id','=',$id)->where('user_id','=',$user_id)->first();
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



    // 结算
    public function pay()
    {
        
        return view('home.shop.pay');
    }


}
