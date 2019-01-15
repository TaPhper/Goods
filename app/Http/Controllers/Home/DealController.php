<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Home\Indents;
class DealController extends Controller
{
    public function order()
    {
    	$id = session()->get('login_user')['user_id'];
    	if($id == NULL){
    		echo '<script>alert("请先登陆");location.href="/home/login"</script>';
    	}
    	$data = Indents::where('user_id',$id)->get();
    	
    	return view('home.userinfo.user.order',['data'=>$data]);
    }
}
