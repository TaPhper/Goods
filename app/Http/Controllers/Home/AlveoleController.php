<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Home\Alveole;
use DB;
class AlveoleController extends Controller
{
    public function index()
    {
    	$data = Alveole::where('is_collect',1)->get();
    	return view('home.userinfo.alveole.collection',['data'=>$data]);
    }

    public function uncollect($id)
    {
    	$data = Alveole::find($id);
    	$data['is_collect'] = 0;
    	$res = $data->save(); 
    	if ($res) {
    		echo '<script language="JavaScript">;location.href="/home/collection";alert("成功");</script>;';
    	}else{
    		echo '<script language="JavaScript">;location.href="/home/collection";alert("失败");</script>;';
    	}
    }

    public function edit($id)
    {   
        $data = DB::table('goods')->where('goods_id',$id)->update(['is_collect'=>1]);
        if($data){
            echo '<script language="JavaScript">;location.href="/home/shopcart";alert("收藏成功 ");</script>;';
        }else{
            echo '<script language="JavaScript">;location.href="/home/collection";alert("收藏失败或商品已收藏 ");</script>;';
        }  


    }
}
