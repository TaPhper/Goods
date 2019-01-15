<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Indents;
use App\Models\Users;
class OrderController extends Controller
{
	// 收货单
    public function take()
    {
    	$indent = Indents::paginate(5);
        $brr = [];
        foreach($indent as $k=>$v){
           // dump($v->goods);
            $brr[] = $v->indent_number;
            // $in = array_unique($brr);
        }
        $in = array_unique($brr);
        $arr = [];
        foreach($in as $k=>$v){
            $arr[] = Indents::where('indent_number','=',$v)->get();
        }
        // dump($arr);
    	$count = Indents::count();
    	return view('admin.indent.index',['data'=>$arr,'count'=>$count]);
    }

    // 退款单
    public function sales(Request $request)
    {
    	// 查询的数据
        $indent_number = empty($request->input('indent_number'))?"":$request->input('indent_number');

    	$indent = Indents::where('indent_state','>=',4)->where('indent_state','<=',5)->where('indent_number','like','%'.$indent_number.'%')->paginate(5);
    	// 获取退货单的总数据
    	$count = Indents::where('indent_state','>=',4)->where('indent_state','<=',5)->count();
    	// dump($indent);die;
    	return view('admin.indent.sales',['data'=>$indent,'count'=>$count]);
    }

    // 执行退货
    public function tuihuo($id)
    {

    	$indent = Indents::where('indent_id',$id)->first();
    	// dump($indent);die;
    	if($indent->indent_state = 5){
    		return back()->with('error','已经退货');
    	}
    	$indent->indent_state = 5;
    	$res = $indent->save();
    	
    	if($res){
            return back()->with('success','退货成功');
        }else{
            return back()->with('error','退货失败');
        }
    }


    // 退款申请列表
    public function single(Request $request)
    {
    	// 查询的数据
        $indent_number = empty($request->input('indent_number'))?"":$request->input('indent_number');
        
    	$indent = Indents::where('indent_state','=',4)->where('indent_number','like','%'.$indent_number.'%')->paginate();
    	// 获取退货单的总数据
    	$count = Indents::where('indent_state','=',4)->count();
    	// dump($indent);die;
    	return view('admin.indent.sales',['data'=>$indent,'count'=>$count]);
    }

    // 执行退款
    public function tuikuan($id)
    {
    	$indent = Indents::where('indent_id',$id)->first();
    	$indent->indent_state = 5;
    	$res = $indent->save();
    	
    	if($res){
            return back()->with('success','退款成功');
        }else{
            return back()->with('error','退款失败');
        }
    }
}
