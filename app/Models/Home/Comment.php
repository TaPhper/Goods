<?php

namespace App\Models\Home;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
     protected $table = 'comment';
    protected $primaryKey ='comment_id';

    //评论表与用户表的模型关联
   public function usercomment()
   {
   	   return $this->belongsTo('App\Models\Users','user_id');
   }

    //评论表与商品表的模型关联
   public function goodscomment()
   {
      
      return $this->belongsTo('App\Models\Admin\Goods','goods_id');

   }
}
