<?php

namespace App\Models\Home;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    protected $table = 'collection';
    protected $primaryKey = 'id';

    // 收藏属于用户
    public function collection_user()
    {
        return $this->belongsTo('App\Models\Users','user_id');
    }
    // 收藏属于商品
    public function collection_goods()
    {
        return $this->belongsTo('App\Models\Users','good_id');
    }

}
