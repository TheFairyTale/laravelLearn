<?php

namespace App;

// 继承时使用App/Model
use App\Model;
//use Illuminate\Database\Eloquent\Model;

// 表zans
class Zan extends Model
{
    //
    public function mostZans() {
        return $this->hasMany(\App\Post::class, 'id', 'post_id');
    }
}
