<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});




// 后台首页
Route::get('admin/index','Admin\IndexController@index');
Route::get('admin/login','Admin\IndexController@login');

// 后台用户管理
Route::resource('/admin/user/index','Admin\UsersController');













 //后台商品管理
Route::resource('/admin/goods/','Admin\GoodsController');
//后台品牌管理
Route::resource('/admin/brand/','Admin\BrandController');