<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Users;
use App\Models\Home\Addr;

class InfoController extends Controller
{
   public function info()
   {
      return view('home.userinfo.user_center');
   }
   public function userinfo()
   {  
      
         $user=session()->get('login_user');

            $id=$user->user_id;
         $user=Users::find($id);

        
   	  return view('home.userinfo.user.information',['user'=>$user]);
   }

   public function uploads(Request $request)
   {
   	$id = session()->get('login_user')['user_id'];
  	$user = Users::find($id);

   	 	if($request->hasFile('profile')){
	    	$profile = $request->file('profile');
	    	$res = $profile->store('images'); //执行上传
	    	$user->uface = $res;
	    	$user->save();
	    	echo $res;


    	 }else{
    	 	dd('请选择文件');
    	 }

	
   }

   public function saveinfo(Request $request,$id)
   {
         $user = Users::find($id);
         // dump($user);
        $data = $request->except('_token');
         $user->user_name = $data['user_name'];
         $user->user_email = $data['email'];
         $user->true_name = $data['true_name'];
         $user->user_tel = $data['user_tel'];
         $user->user_sex = $data['sex'];
         $res = $user->save();
         if($res){
          return back()->with('success','修改成功');
         }else{
          return back()->with('error','修改失败');
         }
   }
      //加载收货地址模板
   public function addr()
   {
        $id = session()->get('login_user')['user_id'];
        $data=Addr::where('user_id',$id)->get();
        // dump($data);
          
          return view('home.userinfo.address',['data'=>$data]);

   }
      //收货地址提交
   public function saveaddr(Request $request)
   {
      $data = $request->except('_token');
        $user_addr = new Addr;
        $user_addr->order_name = $data['order_name'];
        $user_addr->tel = $data['tel'];
        $user_addr->detail = $data['detail'];
          $id = session()->get('login_user')['user_id'];
          $user_addr->user_id = $id;

          if($data['province'] == '省份'){
                $user_addr->addr = $user_addr->addr;
            }else{
               $user_addr->addr = $data['province'];
                if($data['city'] == '地级市')
                {
                    $user_addr->addr = $user_addr->addr;
                }else{
                   $user_addr->addr = $data['province'].$data['city'];
                    if($data['county'] == '市、县级市'){
                         $user_addr->addr = $user_addr->addr;
                    }else{
                        $user_addr->addr = $data['province'].$data['city'].$data['county'];
                    }
                }
            }
            $res = $user_addr->save();

            if($res){
                return  back()->with('success');
            }
   }


}
