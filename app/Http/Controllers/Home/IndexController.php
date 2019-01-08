<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Admin\Slide;
class IndexController extends Controller
{
    public function index()
    {
    	$slide = Slide::where('slide_status','=','1')->get();
    	// dump(session()->get('login_user')['user_tel']);
    	return view('home.index.index',['slide'=>$slide]);
    }
}
