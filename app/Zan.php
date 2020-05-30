<?php

namespace App;

use App\Model;
//use Illuminate\Database\Eloquent\Model;

class Zan extends Model
{
    //
    public function mostZans() {
        return $this->hasMany(\App\Post::class, 'id', 'post_id');
    }
}
