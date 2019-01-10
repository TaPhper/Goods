<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Goods extends Model
{
	use SoftDeletes;
    protected $table = 'goods';
    protected $primaryKey ='goods_id';

    public function goodsbrands()
    {
        return $this->belongsTo('App\Models\Admin\Brand','brand_id');
    }

}
