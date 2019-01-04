<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Net;
use App\Models\Admin\Admins;
use Illuminate\Support\Facades\Hash;
class IndexController extends Controller
{

    public static function config()
    {
    	$data = Net::first();
    	return $data;
    }

    public function index()
    {        
        // dd(date('Y-m-d H:i:s',time()));  
        return view('admin.index.index');
    }


    public function login()
    {
    	return view('admin.login.index');
    }

    public function loginout()
    {
        session()->put('login_admin','');
        return redirect('/admin/login');
    }

    public function logining(Request $request)
    {
        $data = $request->except('_token');
        $admin = Admins::where('admin_name','=',$data['admin_name'])->first();
        if(Hash::check($data['admin_pwd'], $admin['admin_pwd'])){
            session()->put('login_admin',$admin);
            return redirect('admin/index')->with('success','登陆成功');
        }else{
            return back()->with('error','登陆失败');
        }
       
    }




}
