<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserInfoController extends Controller
{
    public function index()
    {
    	return view('home.userinfo.user.safety');
    }
    public function pass()
    {
    	return view('home.userinfo.user.password');
    }
    public function email()
    {
    	return view('home.userinfo.user.email');
    }
    public function phone()
    {
    	return view('home.userinfo.user.phone');
    }
}
