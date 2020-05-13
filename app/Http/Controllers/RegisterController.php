<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class RegisterController extends Controller
{
    // register page
    public function index() {
        return view('register.index');
    }

    // register action
    public function register() {
        // 1验证
        $this->validate(request(), [
            'name' => 'required|min:3|max:32|unique:users,name',
            'email' => 'required|unique:users,email|email',
            'password' => 'required|min:8|max:18|confirmed',

        ]);
        // 2逻辑
        $name = request('name');
        $email = request('email');
        $password = bcrypt(request('password'));

        // 创建用户
        $user = User::create(compact('name', 'email', 'password'));

        // 3渲染
        return redirect('/login');
    }
}
