<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Home\Alveole;
use DB;
class AlveoleController extends Controller
{
    public function index()
    {   $id = session()->get('login_user')['user_id'];
    	$gid = DB::table('goods_collect')->where('user_id',$id)->select('goods_id')->get();
        $push_id = [];
        foreach($gid as $k=>$v)
        {
            array_push($push_id,$v->goods_id);
        }
        $data = [];
        foreach($push_id as $k=>$v)
        {
            array_push($data,Alveole::where('goods_id',$v)->get());
        }
        
        
    	return view('home.userinfo.alveole.collection',['data'=>$data]);
    }

    public function uncollect($id)
    {
    	$uid = session()->get('login_user')['user_id'];
        $res = DB::table('goods_collect')->where('user_id',$uid)->where('goods_id',$id)->delete();
    	if ($res) {
    		echo '<script language="JavaScript">;location.href="/home/collection";alert("成功");</script>;';
    	}else{
    		echo '<script language="JavaScript">;location.href="/home/collection";alert("失败");</script>;';
    	}
    }

    public function edit($id)
    {   
        $uid = session()->get('login_user')['user_id'];
        $data = DB::table('goods_collect')->insert(['user_id'=>$uid,'goods_id'=>$id]);
        if($data){
            echo '<script language="JavaScript">;location.href="/home/shopcart";alert("收藏成功 ");</script>;';
        }else{
            echo '<script language="JavaScript">;location.href="/home/collection";alert("收藏失败或商品已收藏 ");</script>;';
        }  


    }
}
