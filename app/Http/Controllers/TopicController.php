<?php

namespace App\Http\Controllers;

use App\Topic;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    // show topic page
    public function show(Topic $topic) {
        return view('topic/show');
    }
    // post a new topic
    public function submit(Topic $topic) {
        return ;
    }
}
