<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    // login page
    public function index(Post $post) {
        return view('login.index', compact('post'));
    }
    // login action
    public function login() {
        // 验证
        $this->validate(request(), [
            'email' => 'required|email',
            'password' => 'required',
            'is_remember' => 'integer'
        ]);

        // 逻辑
        $user = request(['email', 'password']);
        // boolval() 转换为布尔值
        $is_remember = boolval(request('is_remember'));
        
        // 渲染
        if (\Auth::attempt($user, $is_remember)) {
            return redirect('/');
        } 
        // 返回至上一页
        return \Redirect::back()->withErrors("Wrong email or password.");
        
    }
    // logout action
    public function logout() {
        \Auth::logout();
        return redirect('/');
    }
}
