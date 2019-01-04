<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class SearchController extends Controller
{
    public function sear($id)
    {
    	$goods = DB::table('goods')->where('type_id',$id)->get();
    	return view('home.index.show',['goods'=>$goods]);
    }
}
