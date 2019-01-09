<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Users;
class InfoController extends Controller
{
   public function userinfo()
   {  
      
         $user=session()->get('login_user');

            $id=$user->user_id;
         $user=Users::find($id);
    

   	  return view('home.userinfo.information',['user'=>$user]);
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
        // dump($data);
         $user->user_name = $data['user_name'];
         $user->user_email = $data['email'];
         $user->true_name = $data['true_name'];
         $user->user_tel = $data['user_tel'];
         $user->user_sex = $data['sex'];
           $res = $user->save();

           if($res){
               return back()->with('success','修改成功');
           }



   }



}
