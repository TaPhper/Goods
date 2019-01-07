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
        $data_name = DB::table('type')->where('type_id',$id)->get();
        $goods_count = count($goods);
    	return view('home.index.show',['goods'=>$goods,'goods_count'=>$goods_count,'data_name'=>$data_name]);
    } 
    //商品详情页
    public function introduction($id)
    {
    	$goods_one =DB::table('goods')->where('goods_id',$id)->get();
    	return view('home.goodsinfo.introduction',['goods_one'=>$goods_one]);
    }

    //商品列表页搜索
    public function search()
    {
        $where = [];
        $data = $_GET['search'];

        if(!empty($_GET['search']))
        {
            $where[] = ['gname','like','%'.$_GET['search'].'%'];
        }
        $goods =DB::table('goods')->where($where)->get();
        $count = count($goods);
        return view('home.index.show',['goods'=>$goods,'data'=>$data,'count'=>$count]);
    }

}
