<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class IndexController extends Controller
{
    public function index()
    {
    	// dump(session()->get('login_user')['user_tel']);
    	return view('home.index.index');
    }
}
