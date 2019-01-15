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
        $user = session()->get('login_user');
        $shop = Shops::where('user_id','=',$user['user_id'])->count();
            // dump($shop);
        session()->put('shop_count',$shop);

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

    // 删除商品
    public function destroy($id)
    {   
    	$shop = Shops::find($id)->delete();
        $user = session()->get('login_user');
        $shop = Shops::where('user_id','=',$user['user_id'])->count();
            // dump($shop);
        session()->put('shop_count',$shop);
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
        $default = Addr::where('user_id','=',$user_id)->where('default','=','1')->first();
        // dump($default);
        return view('home.shop.pay',['addr'=>$addr,'shop'=>$arr,'default'=>$default]);
    }

    // 创建订单
    public function indent(Request $request)
    {
        $data = $request->except('_token');
        // dump($data);
        $user_id = session()->get('login_user')['user_id'];
        $shop = Shops::where('user_id','=',$user_id)->get();
        $addr = Addr::where('user_id','=',$user_id)->where('default','=','1')->first();
        // dump($shop);
        $indent_number = mt_rand(1000, 9999).time();
        foreach($shop as $k=>$v){
            
            $goods_id = 'goods_id'.$v->good_id;
            if(isset($data[$goods_id])){
                $Indents_id = Indents::insertGetId(
                    [
                    'indent_number' => $indent_number,
                    // 'consignee' => $data['num'],
                    'indent_money' => $v->sales_grice,
                    'indent_state' => '3',
                    'goods_id' => $v->good_id,
                    'indent_count' => $v->gnum,
                    'user_id' => $v->user_id,
                    'payway' => $data['payway'],
                    
                    ]);
                // dump($Indents_id);
                $indent = Indents::where('indent_id','=',$Indents_id)->first();
                $indent->consignee = $addr->order_name;
                $indent->address = $addr->addr.$addr->detail;
                $indent->tel = $addr->tel;
                $res = $indent->save();
                // dump($indent->updated_at);

                // dump($v->goods_id)
                $shop = Shops::where('good_id','=',$v->good_id)->first();
                $shop->delete();

            }
        }
        $indent = Indents::where('indent_id','=',$Indents_id)->first();

        return redirect("/home/shop/success?id=$indent->indent_number");
          
    }

    // 修改用户默认地址
    public function addr(Request $request)
    {
        $id = $request->id;
        $user_id = $request->user_id;
        $addr = Addr::where('user_id','=',$user_id)->where('default','=','1')->first();
        $addr->default = '0';
        $addr->save();
        $addr = Addr::where('user_id','=',$user_id)->where('id','=',$id)->first();
        $addr->default = '1';
        $res = $addr->save();
        echo $addr->default;
        // echo $user_id
        // echo 'sd';
    }


    public function success(Request $request)
    {
        // 获取订单信息
        $indent_number = $request->id;
        $indent = Indents::where('indent_number','=',$indent_number)->get();
        $indent_money = 0;
        foreach($indent as $k=>$v){
            $indent_money += $v->indent_money;
            // dump($v->indent_money);
        }
        // dump($indent_money);
        // 获取收货人信息
        // $user_id = session()->get('login_user')['user_id'];
        // $default = Addr::where('user_id','=',$user_id)->where('default','=','1')->first();
        return view('home.shop.success',['indent'=>$indent,'money'=>$indent_money]);  
    }

    public function state(Request $request)
    {
        $id = $request->id;
        // dump($id);
        $indent = Indents::where('indent_number','=',$id)->get();
        foreach($indent as $k=>$v){
            if($v->indent_state == '2'){
                $v->indent_state = '1';
                $res = $v->save();
            }else if($v->indent_state == '3'){
                $v->indent_state = '2';
                $res = $v->save();
            }
           
            // dump($res);
        }
        return back();
    }

    // 删除订单
    public function delete(Request $request)
    {
        $id = $request->id;
        // dump($id);
        $indent = Indents::where('indent_number','=',$id)->get();
        foreach($indent as $k=>$v){
            $res = $v->delete();
            // dump($res);
        }
        return back();
    }


}
