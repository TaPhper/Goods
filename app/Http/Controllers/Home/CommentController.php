<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Home\Comment;

class CommentController extends Controller
{
    public function index()
    {
    	 $id = session()->get('login_user')['user_id'];
         $datas = Comment::where('user_id',$id)->get();
         // dump($datas);die;
    	return view('home.userinfo.comment.index',['datas'=>$datas]);
    }
}
