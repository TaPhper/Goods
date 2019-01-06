<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Models\Users;
use Mail;
class LoginController extends Controller
{
    public function login()
    {

    }

    public function register()
    {
    	return view('home.index.register');
    }
    // 邮箱注册
    public function registering(Request $request)
    {
    	$data = $request->except('_token');
        $user = Users::where('user_email','=',$data['user_email'])->first();
        // dump($user);
        if($data['user_email'] != $user['user_email']){
            if($data['user_pwd'] == $data['user_repwd']){
                $users = new Users;
                $users->user_email = $data['user_email'];
                $users->user_pwd = Hash::make($data['user_pwd']);
                $users->user_status = 2;
                $users->token = str_random(60);
                if($users->save()){
                    Mail::send('home.email.index',['token'=>$users->token,'id'=>$users->user_id,'title'=>'【Goods】官方提醒!','email'=>$users->user_email], function ($m) use ($data) {

                        $m->to($data['user_email'])->subject('请激活账号!');
                    });

                }
                // return view('home.email.error',['emai'=>$users->email7);
            }else{
                return back()->with('error','密码不一致');
            }
        }else{
            return back()->with('error','邮箱已注册');
        }
    }

    // 激活验证
    public function setstatus($id,$token)
    {
        $users = Users::find($id);
        if($token != $users->token){
            dd('链接失效');
        }

        if($users->user_status == 1){
            dd('已经激活');
        }

        $users->user_status = 1;
        $users->token = str_random(60);
        $res = $users->save();
        if($res){
            dd('激活成功'); 
        }else{
            dd('激活失效');
        }
    }


    // 手机号注册
    public function insert(Request $request)
    {
        $data = $request->except('_token');
        dump($data);
    }
}
