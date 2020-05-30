<?php

namespace App\Http\Controllers;

use App\Zan;
use App\Comment;
use App\Post;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

class PostControllers extends Controller
{
    //文章列表页面
    public function index()
    {
        //获取容器
        //$log = app('Log');
        //$log = $app->make('Log');

        // 使用laravel 门脸注入
        //\Log::info("post_index:message", ['data' => 'this is post index.']);

        //获取文章 (模型查找) Descending 降序排列
        // withCount("comments") 获取文章的评论数
        $posts = Post::orderBy('created_at', 'desc')->withCount(['comments', 'zans'])->paginate(9);
        $request = request();

        // 推荐文章功能
        // 排序点赞最多的页面排在最前, 输出前5 篇
        //$post = new Post();
        //$post->zan()->orderBy('post_id', 'desc');
        // 关联post 表中id 到zans 表中post_id 
        
        // TODO 完成 "推荐文章" 处的代码
        //$zans = Zan::


        //要传递的参数名尽量和参数名一致 (不理解算了)
        //使用compact 传递到页面上
        return view("post/index", compact(['posts', 'request']));
    }
    // 详情界面
    // TODO 此处传参的原理究竟是什么？
    public function show(Post $post)
    {
        // 在渲染模板前加载所有评论 (comments), 而不是在渲染模板时去访问数据库来加载评论(MVC思想)
        $post->load('comments');
        //$post_comments = Post::orderBy('created_at', 'desc')->withCount("comments");
        return view("post/show", compact('post'));
        //return view("post/show", ['title' => 'this is title', 'isShow' => true]);
    }
    //创建界面
    public function create(Post $post)
    {

        return view("post/create", compact('post'));
    }
    //创建界面的逻辑
    public function store()
    {
        // TODO: 用户权限验证
        // 对于表单传递，不要相信任何从前端传递过来的参数

        //此处是验证操作(1)
        $this->validate(request(), [
            'title' => 'required | string | max: 72 | min: 4',
            'content' => 'required | string | min: 9',
        ],);

        //Request 所有请求  all 所有参数  request() 也是获取所有参数  request('arg') 获取指定参数
        //dd => dump and die 直接打印数据并结束运行
        //尽量使用dd，与原生函数vardump 相比, dd 会格式化输出的数据, 而原生函数可能会造成页面崩溃
        //dd(\Request::all());

        //使用Post 中的create 方法(参数为Array) 创建文章，调用request 来获取上传的参数
        //request 接受一个数组来指定想要返回的指定内容, 返回值类型为Array
        // * 当一个函数参数要求为Array且使用的方法返回值也和它相同，就可以尽量简化代码，让函数输入=输出 （大概是这样）

        //此处是具体的操作逻辑(2)
        $user_id = \Auth::id();
        $params = array_merge(request(['title', 'content']), compact('user_id'));


        $post = Post::create($params);
        //dd($post);

        //此处是渲染页面(3)(或者传递一个模板)
        return redirect('/');
        /*
         所有的表单逻辑都要过以下三步骤
         验证
         操作逻辑
        */
    }
    //编辑界面
    public function edit(Post $post)
    {
        //TODO: 用户权限验证

        return  view("post/edit", compact('post'));
    }
    //编辑界面的逻辑
    public function update(Post $post)
    {
        //TODO: 用户权限验证
        $this->authorize('update', $post);

        //此处是验证操作(1)
        $this->validate(request(), [
            'title' => 'required | string | max: 72 | min: 4',
            'content' => 'required | string | min: 9',
        ],);

        //此处是具体的操作逻辑(2)
        //$post = Post::save(request(['title', 'content']));
        $post->title = request('title');
        $post->content = request('content');
        $post->save();

        //此处是渲染页面(3)(或者传递一个模板)
        return redirect("/posts/articles/$post->id");
        // 返回到编辑页面并给一个cookie 用于提示是否编辑成功
        /*        return function() {
                response(back()->withInput())->cookie('editSuccess', 'true');
        }; */
    }
    //删除的逻辑
    public function delete(Post $post)
    {
        //TODO: 用户权限验证
        $this->authorize('delete', $post);

        $post->delete();

        return redirect('/');
    }
    // 上传图片
    // Illuminate\Http\Request
    public function imageUpload(Request $request)
    {
        //TODO: 用户权限验证

        return "图片上传不可用。";
        //dd(request()->all());
        $req = request()->all();
        // return 0 => "fileName"
        $return = array_keys($req);
        $jsonArrName = $return[0];
        $obj1 = (object) $req[$jsonArrName];

        $arr1 = json_decode(json_encode($obj1));

        dd($arr1);
        //echo $obj1->scalar;
        //dd($obj1);
        //dd($arrayDecoded);
        //dd($req[$jsonArrName]);
        //$path = $request->input($return);

        //dd($return);
        // return 72581182_p0_png
        //echo $return[0];
        //return asset('storage/'.$path);
    }
    // 提交评论
    public function comment(Post $post)
    {
        // 验证
        $this->validate(request(), [
            'content' => 'required|min:2',
        ]);
        // 逻辑
        // 传递进来的参数是Post 的一个对象,
        $comment = new Comment();
        // 将当前Post 对象的用户设置为发表评论的用户
        $comment->user_id = \Auth::id();
        // 设置评论内容, 内容从请求中取
        $comment->content = request('content');
        // 将评论存储至文章的评论中
        $post->comments()->save($comment);
        // 渲染
        return back();
    }
    // 👍赞模块
    public function zan(Post $post)
    {
        $param = [
            // 当前登录的用户
            'user_id' => \Auth::id(),
            'post_id' => $post->id,
        ];
        // 先查找表中是否有要添加的以上数据, 如已有记录，则返回已有记录; 否则创建记录 这样就不会重复创建数据
        Zan::firstOrCreate($param);
        // 因为是使用get方式, 链接的形式，所以可以用back() 回退到上一个页面
        return back();
    }
    // 👎取消赞
    public function unzan(Post $post)
    {
        // 获取用户对文章的赞, 并删除
        $post->zan(\Auth::id())->delete();
        return back();
    }

    // Search result
    public function search(Post $post)
    {
        return view("post/search", compact('post'));
    }
}
