<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Addr;
class AddrController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Addr::paginate(5);
        $count = Addr::count();

        return view('admin.addr.index',['data'=>$data,'count'=>$count]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.addr.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except(['_token']);
        // dump($data);
        $addr = new Addr;
        $addr->ship_addr = $data['ship_addr'];
        $addr->ship_name = $data['ship_name'];
        $addr->sex       = $data['sex'];
        $addr->detailed  = $data['detailed'];
        $addr->email     = $data['email'];
        $addr->phone     = $data['phone'];
        $addr->default   = $data['default'];
         if($data['province'] == '省份'){
                $addr->send_to = $addr->send_to;
            }else{
                $addr->send_to = $data['province'];
                if($data['city'] == '地级市')
                {
                    $addr->send_to = $addr->send_to;
                }else{
                    $addr->send_to = $data['province'].$data['city'];
                    if($data['county'] == '市、县级市'){
                        $addr->send_to = $addr->send_to;
                    }else{
                        $addr->send_to = $data['province'].$data['city'].$data['county'];
                    }
                }
            }
        $res = $addr->save();
        if($res){
            return redirect('admin/addr')->with('success','添加成功');
        }else{
            return back()->with('error','添加失败');
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
        $data = Addr::find($id);
        return view('admin.addr.edit',['data'=>$data]);
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
            // dump($data); 
            $addr = Addr::find($id);
            $addr->ship_addr = $data['ship_addr'];
            $addr->ship_name = $data['ship_name'];
            $addr->sex       = $data['sex'];
            $addr->detailed  = $data['detailed'];
            $addr->email     = $data['email'];
            $addr->phone     = $data['phone'];
            $addr->default   = $data['default'];
            
            if($data['province'] == '省份'){
                $addr->send_to = $addr->send_to;
            }else{
                $addr->send_to = $data['province'];
                if($data['city'] == '地级市')
                {
                    $addr->send_to = $addr->send_to;
                }else{
                    $addr->send_to = $data['province'].$data['city'];
                    if($data['county'] == '市、县级市'){
                        $addr->send_to = $addr->send_to;
                    }else{
                        $addr->send_to = $data['province'].$data['city'].$data['county'];
                    }
                }
            }
            
            $res = $addr->save();
            if($res){
                return redirect('admin/addr')->with('success','修改成功');
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
        $res = Addr::destroy($id);
        if($res){
            return back()->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }
}
