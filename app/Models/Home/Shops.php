<?php

namespace App\Models\Home;

use Illuminate\Database\Eloquent\Model;

class Shops extends Model
{
    protected $table = 'shop_cart';
    protected $primaryKey = 'id';
    // 一对多 商品和购物车
    public function shopgoods()
    {
        return $this->belongsTo('App\Models\Admin\Goods','goods_id');
    }
    // 一对一  购物车和用户
    public function shopuser()
    {
        return $this->hasOne('App\Models\Users','user_id');
    }
}
