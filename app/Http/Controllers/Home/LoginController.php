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
        if($data['phone_code'] == session('mobile_code')){
            if($data['user_pwd'] == $data['user_repwd']){
                $users = new Users;
                $users->user_tel = $data['user_phone'];
                $users->user_pwd = Hash::make($data['user_pwd']);
                $users->user_status = 1;
                if($users->save()){
                    return redirect('/home/login')->with('success','添加成功');
                }
            }else{
                return back()->with('error','密码不一致');
            }
        }else{
             return back()->with('error','验证码不正确');
        }
    }

    public function sendMobileCode(Request $request)
    {

        $phone = $request->input('phone');
        if($users = Users::where('user_tel','=',$phone)->first()){
            echo 'false';exit;
        }
        
        $mobile_code = rand(1000,9999);
        session(['mobile_code'=>$mobile_code]);
        // 短信接口地址
        $target = "http://106.ihuyi.com/webservice/sms.php?method=Submit";
        $target .= "&account=C23446849&password=f8504711b04107878ce81d4d15a5dd7c&format=json&mobile=".$phone."&content=".rawurlencode("您的验证码是：".$mobile_code."。请不要把验证码泄露给其他人。");
        // echo $target;
        // 请求接口
        // CURL 通过代码 模拟浏览器请求
        $ch = curl_init();
        //设置选项，包括URL
        curl_setopt($ch, CURLOPT_URL, $target);  // 设置url地址
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);  //设置不自动输出

        //执行并获取HTML文档内容
        $res = curl_exec($ch); // 发送
        //释放curl句柄
        curl_close($ch);
        
        echo $res;
    }
}
