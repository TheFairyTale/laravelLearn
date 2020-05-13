@extends("layout.main")

@section("content")
<style>
    p>iframe {
        position: relative;
        height: 617px;
        width: 100%;
        /* width: 510px; 
        height: 498px;
        padding-bottom: 56.25%;
        border: 1px solid rgba(114, 114, 114); */
        box-shadow: 0 0 8px 0px #e5e9ef;
        overflow: hidden;
    }
</style>

<!-- 
    @if ( \Auth::check() )
                                <a href="/posts/articles/{{ $post->id }}/edit"><button type="button" class="btn btn-sm btn-outline-secondary">Edit</button></a>
                                @endif
    将其添加到侧边栏, 编辑文章(普通块状颜色按钮)    , 删除文章 (红色块状按钮)
 -->

<div class="mdui-col-xs-12 mdui-hidden-sm-down" style="min-height: 80px;">
    &nbsp;
</div>
<div class="mdui-row" style="margin-top: 20px; margin-bottom: 24px;">
    <!-- Main view page-->
    <div class="mdui-col-md-9 mdui-col-sm-12" style="margin-bottom: 16px;">
        <div class="mdui-card ">
            <div class="mdui-card-primary mdui-col">
                <div class="mdui-card-primary-title">{{ $post->title }}</div>
                <div class="mdui-card-primary-subtitle">
                    Create at {{ $post->created_at }}
                </div>
            </div>

            <div class="mdui-card-content mdui-typo">
                <div>{!! $post->content !!}</div>
            </div>
        </div>
    </div>
    <div class="mdui-col-md-3 mdui-col-sm-12">
        <div class="mdui-card">
            <ul class="mdui-list">
                <a href="/user/{{ $post->user->name }}" target="_blank">
                    <li class="mdui-list-item mdui-ripple">
                        <div class="mdui-list-item-avatar"><img src="https://i1.hdslb.com/bfs/face/f469b49f73ee48147d0801b63f220a830dd051f6.jpg_64x64.jpg" />
                        </div>
                        <div class="mdui-list-item-content">
                            <div class="mdui-list-item-title">{{ $post->user->name }}</div>
                            <div class="mdui-list-item-text mdui-list-item-one-line" style="overflow: hidden;">
                                Created by the {{ $post->user->name }}</div>
                        </div>
                    </li>
                </a>
            </ul>
        </div>
        @if ( \Auth::check() )
        <div class="">
            <div class="mdui-card">
                <ul class="mdui-list">
                    <form action="POST">
                        @csrf
                        <!-- 判断对象是否存在 -->
                        @if($post->zan(\Auth::id())->exists())
                        <a href="/posts/article/{{ $post->id }}/unzan" type="button" style="width: 100%;">
                            <li class="mdui-list-item mdui-ripple">
                                <div class="mdui-list-item-content">
                                    <div class="mdui-list-item-text mdui-list-item-one-line" style="overflow: hidden;">👎取消赞</div>

                                </div>
                            </li>
                        </a>
                        @else
                        <a href="/posts/article/{{ $post->id }}/zan" type="button" style="width: 100%;">
                            <li class="mdui-list-item mdui-ripple">
                                <div class="mdui-list-item-content">
                                    <div class="mdui-list-item-title">👍点赞文章</div>
                                </div>
                            </li>
                        </a>
                        @endif
                    </form>
                </ul>
            </div>
        </div>
        @endif
    </div>

</div>
<div class="mdui-row" style="margin-bottom: 24px;">
    <div class="mdui-col-xs-12">
        <div class="mdui-card">
            <div class="mdui-card-header" style="height: auto; ">
                Comments ()
            </div>
            <!-- Comment -->
            @foreach($post->comments as $comment)
            <div class="mdui-typo">
                <hr>
            </div>
            <div class="mdui-card-header">
                <a class="comment-author" href="/user/{{ $comment->user->name }}" target="_blank">
                    <img class="mdui-card-header-avatar" src="https://i1.hdslb.com/bfs/face/f469b49f73ee48147d0801b63f220a830dd051f6.jpg_64x64.jpg" />
                    <div class="mdui-card-header-title">{{ $comment->user->name }}</div>
                </a>
                <div class="mdui-card-header-subtitle">{{ $comment->created_at }}</div>
            </div>
            <div class="mdui-card-content" style="margin-left: 52px;">
                <div>{{$comment->content}}</div>
            </div>
            <!-- 当评论为0时则设置comment-reply 的display 为 none -->
            <div class="comment-reply">
                <!-- reply 评论回复功能暂时弃用
                        <div class="reply">
                            <div class="mdui-card-header">
                                <a class="comment-author" href="#aa#" target="_blank">
                                    <img class="mdui-card-header-avatar"
                                        src="https://i1.hdslb.com/bfs/face/f469b49f73ee48147d0801b63f220a830dd051f6.jpg_64x64.jpg" />
                                    <div class="mdui-card-header-title">犬山玉姬烤肉组</div>
                                </a>
                                <div class="mdui-card-header-subtitle">April 4th 2020 22:24</div>
                            </div>
                            <div class="mdui-card-content" style="margin-left: 52px;">
                                <div>
                                    对了还有一点要注意一下
                                </div>
                            </div>
                        </div>
                        <div class="mdui-typo">
                            <hr>
                        </div>
                        
                        <div class="reply">
                            <div class="mdui-card-header">
                                <a class="comment-author" href="#aa#" target="_blank">
                                    <img class="mdui-card-header-avatar"
                                        src="https://i2.hdslb.com/bfs/face/a8cce402dd0db28838f18b82ae2783757504afc4.jpg@70w_70h_1c_100q.webp" />
                                    <div class="mdui-card-header-title">Kanda</div>
                                </a>
                                <div class="mdui-card-header-subtitle">April 5th 2020 16:14</div>
                            </div>
                            <div class="mdui-card-content" style="margin-left: 52px;">
                                <div>
                                    回复 @犬山玉姬烤肉组 下期烤肉快出吧秋梨膏！😭
                                </div>
                            </div>
                        </div>
                        <div class="mdui-typo">
                            <hr>
                        </div>
                        -->
            </div>
            @endforeach
        </div>
    </div>
</div>

@if ( \Auth::check() )
<div class="mdui-row" style=" margin-bottom: 105px;">
    <div class="mdui-col-xs-12">
        <div class="mdui-card">
            <!-- <p>You need to <a href="#">sign in</a> that you can comment.</p> -->
            <div class="mdui-card-header" style="height: auto; ">
                Write comment
            </div>
            <div class="mdui-typo">
                <hr style="margin: 0;">
            </div>
            @include('layout/error')
            <div class="mdui-card-header" style="height: auto; padding: 16px 0 0 16px;">
                <img class="mdui-card-header-avatar" src="https://i1.hdslb.com/bfs/face/f469b49f73ee48147d0801b63f220a830dd051f6.jpg_64x64.jpg" />
            </div>
            <div class="" style="margin: 0 16px 16px 52px; padding: 0 0 28px 16px;">
                <form action="/posts/{{ $post->id }}/comment" method="POST">
                    @csrf
                    <div class="mdui-textfield ">
                        <textarea minlength="2" class="mdui-textfield-input" id="comment" name="content" rows="3" placeholder="Message" maxlength="300"></textarea>
                    </div>
                    <button class="mdui-btn mdui-btn-block mdui-btn-raised mdui-ripple mdui-color-theme" type="submit">Submit comment</button>
                </form>
            </div>
        </div>
    </div>
</div>
@else
<div class="mdui-row" style=" margin-bottom: 105px;">
    <div class="mdui-col-xs-12">
        <div class="mdui-card">
            <p style="width: 200px;" class="mdui-center">You need to <a href="/login" class="">sign in</a> that you can comment.</p>
        </div>
    </div>
</div>
@endif

@endsection