<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Goods;


class ShopController extends Controller
{
	// 购物车首页
    public function shopcart()
    {
    	

       return view('home.shop.index');
    
    }


}
