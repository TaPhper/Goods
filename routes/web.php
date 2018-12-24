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
Route::resource('admin/user/index','Admin\UsersController');




//类别管理
Route::resource('admin/cates/index','Admin\CatesController');
Route::get('admin/cates/index/create/{id}','Admin\CatesController@create');

