<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Home\Indents;
class DealController extends Controller
{
    public function order()
    {
    	$id = session()->get('login_user')['user_id'];
    	
    	$data = Indents::where('user_id',$id)->get();
        $brr = [];
        foreach($data as $k=>$v){
           // dump($v->goods);
            $brr[] = $v->indent_number;
            // $in = array_unique($brr);
        }
        $in = array_unique($brr);
        $arr = [];
        foreach($in as $k=>$v){
            $arr[] = Indents::where('user_id',$id)->where('indent_number','=',$v)->get();
        }

        // foreach($arr as $k=>$v){
        //     foreach($v as $kk=>$vv){
        //        dump($vv->goods); 
        //     }   
        // }
        // dump($arr);
    	return view('home.userinfo.user.order',['data'=>$arr]);
    }
}
