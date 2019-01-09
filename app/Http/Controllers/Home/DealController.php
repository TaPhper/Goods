<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DealController extends Controller
{
    public function order()
    {
    	return view('home.userinfo.user.order');
    }
}
