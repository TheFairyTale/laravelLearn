<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
// "App\Model" 可用于数据注入
use App\Model;

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
