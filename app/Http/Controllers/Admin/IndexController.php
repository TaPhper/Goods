<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Net;
class IndexController extends Controller
{
    
    public static function config()
    {
    	$data = Net::first();
    	return $data;
    }

    public function index()
    {
        return view('admin.index.index');
    }


    public function login()
    {
    	return view('admin.login.index');
    }




}
