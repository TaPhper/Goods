<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Admin\Slide;
use App\Models\Users;
use App\Models\Home\Shops;
use App\Models\Home\Goods;
class IndexController extends Controller
{
    public function index()
    {
        // dump(session()->get('login_user'));   
    	if(!session()->get('login_user')){
    		$user = Users::where('user_id','=','0')->first();
    		session()->put('login_user',$user);
            $user = session()->get('login_user');
            $shop = Shops::where('user_id','=',$user['user_id'])->count();
            // dump($shop);
            session()->put('shop_count',$shop);
    	}else{
            $user = session()->get('login_user');
            $shop = Shops::where('user_id','=',$user['user_id'])->count();
            // dump($shop);
            session()->put('shop_count',$shop);
        }
        // dump(session()->get('shop_count'));
    	$slide = Slide::where('slide_status','=','1')->get();
        //今日推荐
        $TheDay= Goods::orderBy('sales','desc')->take(3)->get();
        //坚果
        $Mast  = Goods::orderBy('sales','desc')->where('type_id','=','71')->take(6)->get();
        //饮料
        $Drink = Goods::orderBy('sales','desc')->where('type_id','=','45')->take(6)->get();
        //华为手机
        $Phone = Goods::orderBy('sales','desc')->where('type_id','=','61')->take(6)->get();
    	return view('home.index.index',['slide'=>$slide,'TheDay'=>$TheDay,'Mast'=>$Mast,'Drink'=>$Drink,'Phone'=>$Phone]);
    }
}
