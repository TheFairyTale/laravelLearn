<?php

namespace App;

//继承时使用App/Model
//use Illuminate\Database\Eloquent\Model;
use App\Model;
use PhpParser\Node\Expr\FuncCall;
//use Laravel\Scout\Searchable;

// 表 => Posts
class Post extends Model
{
/* 
    use Searchable;

    // 用于定义索引中的type 值
    public function searchableAs() {
        return "post";
    }

    // 定义有那些字段需要搜索
    public function toSearchableArray() {
        return [
            'title' => $this->title,
            'content' => $this->content,
        ];
    }
     */

    // 由于在Post 控制器中的store 方法中使用了Post::create 方法来更简洁方便地添加文章，
    // 因此需要在对应的模型类中添加 $guarded 变量和 $fillable 变量来告诉laravel 哪些
    // 数组字段可以被注入而哪些不能。
    // 但由于许多的页面都会用到类似的添加文章操作(比如添加评论)，而每个用到这个操作的控制器
    // 的对应的模型类都需要添加这样一个变量，为了使它们减少重复，将这两个变量放在一个Model
    // 类中，其他模型使用时，引用即可解决这个问题。 所以继承App下的Model 

    // 关联用户(将文章与用户关联, 一文章一用户)
    public function user() {
        return $this->belongsTo('App\User');
    }

    // 评论模型
    // 一文章有多个评论:  一对多 hasMany
    public function comments() {
        return $this->hasMany('App\Comment')->orderBy('created_at', 'desc');
    }

    // 关联👍赞
    // 判断一篇文章对于某一个用户是否有赞
    public function zan($user_id) {
        // 一篇文章和某一个用户只能产生一个关联 故使用hasOne
        // where 判断user_id
        return $this->hasOne(\App\Zan::class)->where('user_id', $user_id);
    }

    // 文章所有赞
    public function zans() {
        // 因为一篇文章有多个赞, 故用hasMany()
        return $this->hasMany(\App\Zan::class);
    }

}
