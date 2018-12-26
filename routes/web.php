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




//后台用户管理   叶尚君25-40
Route::resource('admin/user','Admin\UsersController');














//后台商品管理   王润朗  41-50
Route::resource('/admin/goods','Admin\GoodsController');
//商品回收站(软删除)
Route::get('/admin/goods_show','Admin\GoodsController@goods_show');
Route::get('/admin/goods/delete/{id}','Admin\GoodsController@delete');
//后台品牌管理
Route::resource('/admin/brand','Admin\BrandController');






//类别管理   厉常建 51-60
Route::resource('admin/cates/index','Admin\CatesController');
Route::get('admin/cates/index/create/{id}','Admin\CatesController@create');

