<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Admins extends Model
{
    protected $table = 'admin';
    protected $primaryKey = 'admin_id';

    public function adminpower()
    {
        return $this->belongsTo('App\Models\Admin\Powers','admin_post');
    }
}
