<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Goods;
use App\Models\Home\Shops;
use App\Models\Home\Addr;
use App\Models\Home\Indents;
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
    public function pay(Request $request)
    {
        $id = $request->id;
        $asd = explode(" ", $id);
        $arr = [];
        foreach($asd as $k=>$v){
            $arr[] = $shop = Shops::where('good_id',$v)->first();
        }
        
        $user_id = session()->get('login_user')['user_id'];
        $addr = Addr::where('user_id','=',$user_id)->get();
        // dump($addr);
        return view('home.shop.pay',['addr'=>$addr,'shop'=>$arr]);
    }

    // 创建订单
    public function indent(Request $request)
    {
        $data = $request->except('_token');
        dump($data);
        $user_id = session()->get('login_user')['user_id'];
        $shop = Shops::where('user_id','=',$user_id)->get();
        // dump($shop);
        foreach($shop as $k=>$v){
            $goods_id = 'goods_id'.$v->good_id;
            if(isset($data[$goods_id])){
                $indent = new Indents;
                $indent->indent_number = mt_rand(1000, 9999).time();
                $indent->consignee = $data['num'];
                $indent->indent_money = $v->sales_grice;
                $indent->indent_state = '1';
                $indent->goods_id = $v->good_id;
                $indent->indent_count = $v->gnum;
                $indent->user_id = $v->user_id;
                $res = $indent->save();  
                dump($res);
            }
        }

        return view('home.shop.success');
        
    }

}
