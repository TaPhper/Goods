<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InfoController extends Controller
{
   public function userinfo()
   {

   	  return view('home.userinfo.information');
   }

   public function uploads()
   {
   	 $profile = $_FILES['profile'];
	$filename= './uploads/images/'.time().'.jpg';
	// 执行上传
	$res = move_uploaded_file($profile['tmp_name'],$filename);
	if($res){
		$arr = [
			'msg'=>'success',
			'path'=>$filename
		];
	}else{
		$arr = [
			'msg'=>'error',
			'path'=>''
		];
	}

	echo json_encode($arr);
   }



}
