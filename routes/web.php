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
Route::resource('admin/user','Admin\UsersController');
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
Route::resource('/admin/admins','Admin\AdminController')->middleware('admins');
// 权限管理
Route::resource('/admin/power','Admin\PowerController')->middleware('power');
// 轮播图管理
Route::resource('/admin/slide','Admin\SlideController')->middleware('slide');








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
Route::resource('/admin/cates/index','Admin\CatesController')->middleware('cates');
Route::get('/admin/cates/index/create/{id}','Admin\CatesController@create')->middleware('cates');
//信息管理
Route::resource('/admin/comment','Admin\CommentController');



// 前台首页
Route::get('/','Home\IndexController@index');

// 前台商品列表页

Route::get('home/index/search/{id}','Home\SearchController@sear');















//个人中心
Route::get('home/userinfo','Home\InfoController@userinfo');
Route::post('/home/uploads','Home\InfoController@uploads');
Route::post('home/saveinfo/{id}','Home\InfoController@saveinfo');

Route::get('home/index/introduction/{id}','Home\SearchController@introduction');
//商品列表页搜索
Route::get('home/index/sear','Home\SearchController@search');
//商品品牌页
Route::get('home/index/brand/{id}','Home\SearchController@brand');
// 前台注册
Route::get('/home/register','Home\LoginController@register');
// 邮箱注册
Route::post('/home/registering','Home\LoginController@registering');
// 邮箱激活
Route::get('/home/registering/setstatus/{id}/{token}','Home\LoginController@setstatus');
// 手机号注册
Route::post('/home/insert','Home\LoginController@insert');




Route::get('/home/insert/sendMobileCode','Home\LoginController@sendMobileCode');


// 登陆
Route::get('/home/login','Home\LoginController@login');
Route::post('/home/implement','Home\LoginController@implement');
// 退出
Route::get('/home/logout','Home\LoginController@logout');

// 购物车首页
Route::get('/home/shopcart','Home\ShopController@shopcart');
