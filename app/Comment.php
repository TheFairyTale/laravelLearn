<?php

namespace App;

// 继承时使用App/Model
use App\Model;

// 表comments
class Comment extends Model
{
    // 第七章, 不理解

    // 评论所属文章
    // 反向一对多 belongsTo
    public function post() {
        return $this->belongsTo('App\Post');
    }

    // 评论所属用户
    public function user() {
        return $this->belongsTo('App\User');
    }
}
