<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\Users;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Users::paginate(5);
        $count = Users::count();
        // dump($count);
        return view('admin.users.index',['data'=>$data,'count'=>$count]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');
        // dump($data);die;
        $users = new Users;
        $users->user_name = $data['user_name'];
        $users->user_email = $data['user_email'];
        $users->user_pwd = Hash::make($data['user_pwd']);
        $users->true_name = $data['true_name'];
        $users->user_sex = $data['user_sex'];
        $users->user_tel = $data['user_tel'];
        $users->user_status = $data['user_status'];
        $res = $users->save();
        if($res){
            return redirect('admin/user')->with('success','添加成功');
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
    public function show(Request $request)
    {
        $name = $request->get('name');  
        if(empty($name)){
            echo '';
        }else if(empty($data = Users::where('user_name','=',$name)->first())){
            echo 'error';
        }else{
            echo 'success';
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
        $data = Users::where('user_id','=',$id)->first();
        // dump($data[0]->user_name);
        return view('admin.users.edit',['data'=>$data,'id'=>$id]);
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
        $data = $request->except('_token');
        // dump($data);
        $user = Users::where('user_id','=',$id)->first();
        // dump($user->user_pwd);
        $user->user_pwd = Hash::make($data['user_pwd']);
        // dump($user->user_pwd);
        $res = $user->save();
        // dump($res);
        if($res){
            return redirect('admin/user')->with('success','修改密码成功');
        }else{
            return back()->with('error','修改密码失败');
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
        $res = Users::where('user_id','=',$id)->delete();
        // dump($user);
        // $res = $user->delete();
        if($res){
            return redirect('admin/user')->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }

}