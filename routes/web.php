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



// 后台首页
Route::get('admin/index','Admin\IndexController@index')->middleware('login');
Route::get('admin/login','Admin\IndexController@login');
Route::get('admin/loginout','Admin\IndexController@loginout');
Route::post('admin/logining','Admin\IndexController@logining');




//后台用户管理   叶尚君25-40
Route::resource('admin/user','Admin\UsersController')->middleware('user');
// 后台订单管理
Route::resource('admin/indent','Admin\IndentsController')->middleware('indent');
// 后台单据管理
Route::get('/admin/Order/take','Admin\OrderController@take')->middleware('order');
Route::get('/admin/Order/sales','Admin\OrderController@sales')->middleware('order');
Route::get('/admin/Order/tuihuo/{id}','Admin\OrderController@tuihuo')->middleware('order');
Route::get('/admin/Order/deliver','Admin\OrderController@deliver')->middleware('order');
Route::get('/admin/Order/single','Admin\OrderController@Single')->middleware('order');
Route::get('/admin/Order/tuikuan/{id}','Admin\OrderController@tuikuan')->middleware('order');
// 后台员工管理
Route::resource('admin/admins','Admin\AdminController')->middleware('admins');
// 权限管理
Route::resource('admin/power','Admin\PowerController')->middleware('power');









//后台商品管理   王润朗  41-50
Route::resource('/admin/goods','Admin\GoodsController')->middleware('goods');
//网站配置
Route::resource('/admin/net','Admin\NetController')->middleware('net');
Route::get('/admin/index/ajax/{id}','Admin\IndexController@config');
//商品回收站(软删除)
Route::get('/admin/goods_show','Admin\GoodsController@goods_show')->middleware('goods');
Route::delete('/admin/goods/delete/{id}','Admin\GoodsController@delete')->middleware('goods');
//后台品牌管理
Route::resource('/admin/brand','Admin\BrandController')->middleware('brand');
//后台收货地址管理
Route::resource('/admin/addr','Admin\AddrController')->middleware('addr');





//类别管理   厉常建 51-60
Route::resource('admin/cates/index','Admin\CatesController')->middleware('cates');
Route::get('admin/cates/index/create/{id}','Admin\CatesController@create')->middleware('cates');
//信息管理
Route::resource('/admin/comment','Admin\CommentController');



// 前台首页
Route::get('/','Home\IndexController@index');
// 前台商品列表页

Route::get('home/index/search/{id}','Home\SearchController@sear');














//个人中心
Route::get('home/info','Home\InfoController@info');