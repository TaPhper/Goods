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

        $brand = DB::table('brand')->get();

    	$goods = DB::table('goods')->where('type_id',$id)->paginate(20);
        $data_name = DB::table('type')->where('type_id',$id)->get();
        $goods_count = count($goods);
        $sales = DB::table('goods')->orderBy('sales','desc')->take(4)->get();
    	return view('home.index.show',['sales'=>$sales,'goods'=>$goods,'goods_count'=>$goods_count,'data_name'=>$data_name,'brand'=>$brand]);
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
        $brand = DB::table('brand')->get();
        $where = [];
        $data =isset( $_GET['search'])? $_GET['search']:'';
        if(!empty($_GET['search']))
        {
            $where[] = ['gname','like','%'.$_GET['search'].'%'];
        }
        $goods =DB::table('goods')->where($where)->paginate(20);
        
        $count = count($goods);
        $sales = DB::table('goods')->orderBy('sales','desc')->take(4)->get();

        return view('home.index.show',['sales'=>$sales,'goods'=>$goods,'data'=>$data,'count'=>$count,'brand'=>$brand]);
    }
    //品牌搜索
    public function brand($id)
    {
        $goods = DB::table('goods')->where('brand_id',$id)->get();
        return json_decode($goods);
    }
    //销量排序
    public function sales($id)
    {   
        if($id == 0)
        {
            $brand = DB::table('brand')->get();
            $goods = DB::table('goods')->paginate(20);
            $count = count($goods);
            $sales = DB::table('goods')->orderBy('sales','desc')->take(4)->get();
            return view('home.index.show',['sales'=>$sales,'goods'=>$goods,'count'=>$count,'brand'=>$brand]);  
        }
        if($id == 1){
            $brand = DB::table('brand')->get();
            $goods = DB::table('goods')->orderBy('sales','desc')->paginate(20);
            $count = count($goods);
            $sales = DB::table('goods')->orderBy('sales','desc')->take(4)->get();
            return view('home.index.show',['sales'=>$sales,'goods'=>$goods,'count'=>$count,'brand'=>$brand]);
        }
        if($id == 2)
        {
            $brand = DB::table('brand')->get();
            $goods = DB::table('goods')->orderBy('market_price','asc')->paginate(20);
            $count = count($goods);
            $sales = DB::table('goods')->orderBy('sales','desc')->take(4)->get();
            return view('home.index.show',['sales'=>$sales,'goods'=>$goods,'count'=>$count,'brand'=>$brand]); 
        }
    }


}
