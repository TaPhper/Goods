<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Net;
class NetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $data = Net::all();

        return view('admin.net.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.net.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('logo')){
            $profile = $request->file('logo');
            $path = $profile->store('images');
            $data = $request->except(['_token','logo']);
            
            $net = new Net;
            $net->net_name = $data['net_name'];
            $net->net_key  = $data['net_key'];
            $net->net_phone= $data['net_phone'];
            $net->net_logo = $path;
            $res = $net->save();
            if($res){
                return redirect('/admin/net')->with('success','设置成功');
            }else{
                return back()->with('error','设置失败');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Net::find($id);
        return view('admin.net.edit',['data'=>$data]);
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
        $data = $request->except(['_token','_method']);
        $net = Net::find($id);
        $net->net_name = $data['net_name'];
        $net->net_key  = $data['net_key'];
        $net->net_phone= $data['net_phone'];
        if($request->hasFile('logo')){
            $path = $request->file('logo')->store('images');
            $net->net_logo = $path;
        }
        $res = $net->save();
        if($res){
            return redirect('/admin/net')->with('success','修改成功');
        }else{
            return back()->with('error','修改失败');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res = Net::destroy($id);
        if($res){
            return back()->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }

    

   
}
