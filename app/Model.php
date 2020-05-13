<?php

namespace App;

//as 用于给类名起一个别名
use Illuminate\Database\Eloquent\Model as BaseModel;

class Model extends BaseModel
{
    // 由于在Post 控制器中的store 方法中使用了Post::create 方法来更简洁方便地添加文章，
    // 因此需要在对应的模型类中添加 $guarded 变量和 $fillable 变量来告诉laravel 哪些
    // 数组字段可以被注入而哪些不能。
    // 但由于许多的页面都会用到类似的添加文章操作(比如添加评论)，而每个用到这个操作的控制器
    // 的对应的模型类都需要添加这样一个变量，为了使它们减少重复，将这两个变量放在一个Model
    // 类中，其他模型使用时，引用即可解决这个问题。

    //也可通过将不允许注入字段设为空数组来允许所有字段注入
    protected $guarded = [];      //不可以被数组注入的字段
    //protected $fillable = ['title', 'content'];    //可以注入数据的字段
    
}
