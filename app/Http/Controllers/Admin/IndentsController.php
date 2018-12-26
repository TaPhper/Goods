<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Indents;
use App\Models\Users;
class IndentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // 获取搜索内容
        $indent_id = empty($request->input('indent_id'))?"":$request->input('indent_id');
        $consignee = empty($request->input('consignee'))?"":$request->input('consignee');
        $indent_state = $request->input('indent_state') == '请选择'?"":$request->input('indent_state');
        // 获取搜索之后得到的信息
        $indent = Indents::where('indent_id','like','%'.$indent_id.'%')->where('consignee','like','%'.$consignee.'%')->where('indent_state','like','%'.$indent_state.'%')->paginate(3);
        $count = Indents::count();
        return view('admin.indent.index',['data'=>$indent,'count'=>$count]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($text)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // 获取
        $indents = Indents::find($id);
        // 执行删除
        $res = $indents->delete();
        if($res){
            return redirect('admin/indent')->with('success','添加成功');
        }else{
            return back()->with('error','添加失败');
        }
    }
}
