<?php
//Route::get('/', '[Controller]@[Behavior/Function]');
// 添加缓存控制
//Route::middleware('cache.headers:public;max_age=2628000;etag')->group(function () {
    // 全局资源获取
    /* Route::get('/storage/{resourceName}', function(Request $request) {
        //return header('Cache-Control', 'public');
    })->where('resourceName', '*'); */

    /**
     * CommentPost
     */
    // 提交评论
    Route::post('/posts/{post}/comment', '\App\Http\Controllers\PostControllers@comment');
    // 👍点赞
    Route::get('/posts/article/{post}/zan', '\App\Http\Controllers\PostControllers@zan');
    Route::get('/posts/article/{post}/unzan', '\App\Http\Controllers\PostControllers@unzan');


    /**
     * UserModel
     */
    // Register Page
    Route::get('/register', '\App\Http\Controllers\RegisterController@index');
    // Register Action
    Route::post('/register', '\App\Http\Controllers\RegisterController@register');
    // Login Page
    Route::get('/login', '\App\Http\Controllers\LoginController@index');
    // Login Action
    Route::post('/login', '\App\Http\Controllers\LoginController@login');
    // Logout Action
    Route::get('/logout', '\App\Http\Controllers\LoginController@logout');

    /**
     * indexPage
     */
    Route::get('/', '\App\Http\Controllers\PostControllers@index');
    // 文章列表页
    Route::get('/posts', '\App\Http\Controllers\PostControllers@index');
    // 文章详情页
    Route::get('/posts/articles/{post}', '\App\Http\Controllers\PostControllers@show');
    // 创建文章
    Route::get('/posts/create', '\App\Http\Controllers\PostControllers@create');
    // 储存页面
    Route::post('/posts/store', '\App\Http\Controllers\PostControllers@store');
    // 访问编辑文章页面
    Route::get('/posts/articles/{post}/edit', '\App\Http\Controllers\PostControllers@edit');
    // 提交编辑的页面
    Route::post('/posts/{post}', '\App\Http\Controllers\PostControllers@update');
    // 删除文章
    Route::get('/posts/articles/{post}/delete', '\App\Http\Controllers\PostControllers@delete');

    // 上传图片
    Route::post('image/upload', '\App\Http\Controllers\PostControllers@imageUpload');

    // Search
    Route::get('/articles/search', '\App\Http\Controllers\PostControllers@search');
    Route::post('/articles/search', '\App\Http\Controllers\PostControllers@search');

    // 个人中心
    Route::get('/user/{user}', '\App\Http\Controllers\UserController@show');
    Route::post('/user/{user}/fan', '\App\Http\Controllers\UserController@fan');
    Route::post('/user/{user}/unfan', '\App\Http\Controllers\UserController@unfan');
    // User setting
    Route::get('/user/me/setting', '\App\Http\Controllers\UserController@setting');
    // User setting action
    Route::post('/user/me/setting', '\App\Http\Controllers\UserController@settingStore');
//});
