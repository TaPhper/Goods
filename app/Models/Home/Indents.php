<?php

namespace App\Models\Home;

use Illuminate\Database\Eloquent\Model;

class Indents extends Model
{
    protected $table = 'indent';
    protected $primaryKey = 'indent_id';

    public static function goods()
    {
    	return $this->hasOne('App\Models\Home\Goods','goods_id','goods_id');
    }
}
