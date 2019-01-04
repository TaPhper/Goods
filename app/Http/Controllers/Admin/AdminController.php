<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Admins;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin\Powers;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        

        $data = Admins::paginate(5);

        $count = Admins::count();
        return view('admin.admins.index',['data'=>$data,'count'=>$count]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $power = Powers::all();
        return view('admin.admins.create',['power'=>$power]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
        'admin_name' => 'required',
        'admin_pwd' => 'required|regex:/^[\w]{6,18}$/',
        'admin_repwd' => 'required|same:admin_pwd',
        'admin_email' => 'required|email',
        'admin_phone' => 'required|regex:/^1{1}[3-9]{1}[0-9]{9}$/',
        ],[
            'admin_name.required' => '用户必填',
            'admin_pwd.required' => '密码必填',
            'admin_pwd.regex' => '密码格式不正确',
            'admin_repwd.required' => '确认密码必填',
            'admin_repwd.same' => '两次密码不一致',
            'admin_phone.required' => '联系方式必填',
            'admin_phone.regex' => '联系方式格式不正确',
            'admin_email.required' => '邮箱必填',
            'admin_email.email' => '邮箱格式不正确',
        ]);

        // dump($request->except(['_token']));
        $data = $request->except(['_token']);

        $admin = Admins::where('admin_name','=',$data['admin_name'])->first();
        if(!$admin){
            $admin = new Admins;
            $admin->admin_name = $data['admin_name'];
            $admin->admin_pwd = Hash::make($data['admin_pwd']);
            $admin->admin_sex = $data['admin_sex'];
            $admin->admin_email = $data['admin_email'];
            $admin->admin_phone = $data['admin_phone'];
            $admin->admin_post = $data['admin_post'];
            $admin->admin_status = 1;
            $res = $admin->save();
            if($res){
                return redirect('admin/admins')->with('success','添加成功');
            }else{
                return back()->with('error','添加失败');
            }
        }else{
            return back()->with('error','已拥有此用户');
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
        $admin = Admins::find($id);
        $data = $admin->admin_status == 1 ? '2' : 1;
        $admin->admin_status = $data;
        $res = $admin->save();
        if($res){
            return redirect('admin/admins')->with('success','修改成功');
        }else{
            return back()->with('error','修改失败');
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
        $admin = Admins::find($id);
        $res = $admin->delete();
        if($res){
            return redirect('admin/admins')->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }

    }
}
