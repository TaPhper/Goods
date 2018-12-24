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
        $data = Users::paginate(10);
        return view('admin.users.index',['data'=>$data]);
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
        // dump($data);
        $users = new Users;
        $users->user_name = $data['user_name'];
        $users->user_email = $data['user_email'];
        $users->user_pwd = $data['user_pwd'];
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
            return redirect('admin/user')->with('success','添加成功');
        }else{
            return back()->with('error','添加失败');
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
            return redirect('admin/user')->with('success','添加成功');
        }else{
            return back()->with('error','添加失败');
        }
    }
}
