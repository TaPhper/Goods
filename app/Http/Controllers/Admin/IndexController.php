<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Net;
use App\Models\Admin\Admins;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin\Power;
class IndexController extends Controller
{

    public static function config()
    {
    	$data = Net::first();
    	return $data;
    }

    public function index()
    {   
        $admin = session()->get('login_admin');
            
        // dd(date('Y-m-d H:i:s',time()));  
        return view('admin.index.index');
    }


    public function login()
    {
    	return view('admin.login.index');
    }

    public function loginout()
    {
        session()->put('login_admin',false);
        return redirect('/admin/login');
    }

    public function logining(Request $request)
    {
        $this->validate($request, [
            'captcha' => 'required|captcha',
        ],[
            'captcha.required' => '验证码必填',
            'captcha.captcha' => '验证码不正确',
        ]);
        $data = $request->except('_token');
        // $userInput = request('captcha');
        // dump($userInput);

        $admin = Admins::where('admin_name','=',$data['admin_name'])->first();
        // dump($admin);
        if(!empty($admin)){
            if($admin['admin_status'] == 1){
                if(Hash::check($data['admin_pwd'], $admin['admin_pwd'])){
                    session()->put('login_admin',$admin);
                    return redirect('admin/index')->with('success','登陆成功');
                }else{
                    return back()->with('error','账号密码不正确');
                }
            }else{
                return back()->with('error','此用户已冻结');
            }
        }else{
            return back()->with('error','没有此用户');
        }
        
       
    }




}
