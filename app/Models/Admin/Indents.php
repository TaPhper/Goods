<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Indents extends Model
{
	// 表设置
    protected $table = 'indent';
    // 主键
    protected $primaryKey = 'indent_id';
    //订单属于用户
    public function indentusers()
    {
    	return $this->belongsTo('App\Models\Users','user_id');
    }


}
