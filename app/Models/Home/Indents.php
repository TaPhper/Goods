<?php

namespace App\Models\Home;

use Illuminate\Database\Eloquent\Model;

class Indents extends Model
{
    protected $table = 'indent';
    protected $primaryKey = 'indent_id';

    public function goods()
    {
    	return $this->hasMany('App\Models\Home\Goods','goods_id','goods_id');
    }
}
