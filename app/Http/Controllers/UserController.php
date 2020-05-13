<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // User setting page
    public function setting(Post $post) {
        return view('user.setting', compact('post'));
    }
    // User setting store
    public function settingStore() {
        
    }
}
