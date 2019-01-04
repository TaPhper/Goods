<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class SearchController extends Controller
{
	//商品列表页
    public function sear($id)
    {
    	$goods = DB::table('goods')->where('type_id',$id)->get();
    	return view('home.index.show',['goods'=>$goods]);
    }
    //商品详情页
    public function introduction($id)
    {
    	$goods_one =DB::table('goods')->where('goods_id',$id)->get();
    	return view('home.goodsinfo.introduction',['goods_one'=>$goods_one]);
    }
}
