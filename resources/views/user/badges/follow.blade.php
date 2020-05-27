<!-- 检查用户是否登录 -->
@if ( \Auth::check() )
    <!-- 如果当前登录用户即为本页展示的用户, 则显示跟随和取消跟随按钮（那就是这个页面的主人了！） -->
    @if ( \Auth::user()->id == $user->id )

        <!-- 如果当前登录用户已经跟随了当前列的用户，则显示取消跟随 -->
        @if ( \Auth::user()->hasStar($SFuser->id) == 1 )
            <button class="mdui-btn mdui-btn-raised mdui-btn-dense mdui-color-theme-accent mdui-ripple unfollow-{{$SFuser->id}}" onclick="ajax('/user/{{ $SFuser->id }}/unfan', '{{$SFuser->id}}', csrf_token)" id="" type="">Unfollow</button>
            <!-- 由于已经follow 所以隐藏follow 按钮以备之后让前端切换显示 -->
            <button class="mdui-btn mdui-btn-raised mdui-btn-dense mdui-color-theme-accent mdui-ripple mdui-hidden follow-{{$SFuser->id}}" onclick="ajax('/user/{{ $SFuser->id }}/fan', '{{$SFuser->id}}', csrf_token)" id=""  type="">Follow</button>
            @else
            <button class="mdui-btn mdui-btn-raised mdui-btn-dense mdui-color-theme-accent mdui-ripple mdui-hidden unfollow-{{$SFuser->id}}" onclick="ajax('/user/{{ $SFuser->id }}/unfan', '{{$SFuser->id}}', csrf_token)" id=""  type="">Unfollow</button>
            <!-- 由于已经follow 所以隐藏follow 按钮以备之后让前端切换显示 -->
            <button class="mdui-btn mdui-btn-raised mdui-btn-dense mdui-color-theme-accent mdui-ripple follow-{{$SFuser->id}}" onclick="ajax('/user/{{ $SFuser->id }}/fan', '{{$SFuser->id}}', csrf_token)" id="" type="">Follow</button>

        @endif

        <!-- 如当前登录用户已跟随当前列的用户 -->
    @elseif ( \Auth::user()->hasStar($SFuser->id) == 1)
        <button class="mdui-btn mdui-btn-raised mdui-btn-dense mdui-color-theme-accent mdui-ripple unfollow-{{$SFuser->id}}" onclick="ajax('/user/{{ $SFuser->id }}/unfan', '{{$SFuser->id}}', csrf_token)" id="" type="">Unfollow</button>
        <!-- 由于已经follow 所以隐藏follow 按钮以备之后让前端切换显示 -->
        <button class="mdui-btn mdui-btn-raised mdui-btn-dense mdui-color-theme-accent mdui-ripple mdui-hidden follow-{{$SFuser->id}}" onclick="ajax('/user/{{ $SFuser->id }}/fan', '{{$SFuser->id}}', csrf_token)" id="" type="">Follow</button>
        <!-- 如果当前登录用户即本列用户，则不显示按钮 -->
    @elseif ( \Auth::user()->id == $SFuser->id )
        <!-- none-->
    @else
        <!-- 由于已经unfollow 所以隐藏unfollow 按钮以备之后让前端切换显示 -->
        <button class="mdui-btn mdui-btn-raised mdui-btn-dense mdui-color-theme-accent mdui-ripple mdui-hidden unfollow-{{$SFuser->id}}" onclick="ajax('/user/{{ $SFuser->id }}/unfan', '{{$SFuser->id}}', csrf_token)" id="" type="">Unfollow</button>
        
        <button class="mdui-btn mdui-btn-raised mdui-btn-dense mdui-color-theme-accent mdui-ripple follow-{{$SFuser->id}}" onclick="ajax('/user/{{ $SFuser->id }}/fan', '{{$SFuser->id}}', csrf_token)" id="" type="">Follow</button>

    @endif
@endif
