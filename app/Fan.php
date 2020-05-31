<?php

namespace App;

// 继承时使用App/Model
//use Illuminate\Database\Eloquent\Model;
// "App\Model" 可用于数据注入
use App\Model;

// 表fans
class Fan extends Model
{
    // fan user
    public function fuser() {
        return $this->hasOne(\App\User::class, 'id', 'fan_id');
    }

    // su
    public function suser() {
        return $this->hasOne(\App\User::class, 'id', 'star_id');
    }
}
