<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Admin\Slide;
use App\Models\Users;
class IndexController extends Controller
{
    public function index()
    {
    	if(!session()->get('login_user')){
    		$user = Users::where('user_id','=','0')->first();
    		session()->put('login_user',$user);
    	}
    	$slide = Slide::where('slide_status','=','1')->get();
    	// dump(session()->get('login_user')['user_tel']);
    	return view('home.index.index',['slide'=>$slide]);
    }
}
