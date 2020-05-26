@extends("layout.main")

@section("content")
<style>

</style>

<div class="mdui-col-md-12 mdui-hidden-sm-down" style="min-height: 80px;">
    &nbsp;
</div>
<div class="mdui-row" style="margin-top: 20px; margin-bottom: 105px;">
    <!-- Main view -->
    <div class="mdui-card mdui-col-xs-12" style="padding: 0;">
        <div class="mdui-col-md-9 mdui-col-sm-12" style="padding: 0;">
            <ul class="mdui-list">
                @foreach($posts as $post)
                <li class="mdui-list-item mdui-ripple">

                    <a class="padding-for-avatar" href="/user/{{ $post->user->id }}">
                        <div class="mdui-list-item-avatar"><img src="https://i2.hdslb.com/bfs/face/a8cce402dd0db28838f18b82ae2783757504afc4.jpg@70w_70h_1c_100q.webp" />
                        </div>
                    </a>
                    <a href="/posts/articles/{{ $post->id }}">
                        <div class="mdui-list-item-content">
                            <div class="mdui-list-item-title mdui-list-item-one-line">
                                {{ $post->title }}
                            </div>
                            <div class="mdui-list-item-text mdui-list-item-two-line">
                                {{ $post->content }}
                            </div>
                            <div class="mdui-list-item-text mdui-list-item-one-line">
                                {{ $post->created_at }} by <a href="/user/{{ $post->user->id }}">{{ $post->user->name }}</a>  <i class="mdui-icon material-icons">&#xe8dc;</i>：{{ $post->zans_count }}, <i class="mdui-icon material-icons">&#xe0b9;</i>： {{ $post->comments_count }}
                            </div>
                        </div>
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
        <div class="mdui-col-md-3 mdui-hidden-sm-down" style="padding: 16px;">
            <div>No one has replied</div>
            <div>副列, 展示更多琐碎内容</div>
        </div>
    </div>
    <div class=" mdui-col-xs-12" style="padding: 16px 0;">
        <!--
    <nav>
        <ul class="pagination">
            <li class="page-item disabled" aria-disabled="true" aria-label="« Previous"><span class="page-link" aria-hidden="true">‹</span></li>
            <li class="page-item active" aria-current="page"><span class="page-link">1</span></li>
            <li class="page-item"><a class="page-link" href="http://127.0.0.1:8000?page=2">2</a></li>
            <li class="page-item"><a class="page-link" href="http://127.0.0.1:8000?page=2" rel="next" aria-label="Next »">›</a></li>
        </ul>
    </nav>
            -->
        <style>
            nav {
                margin: 0;
                padding: 0;
                color: black;
                background-color: unset !important;
            }

            .pagination {
                list-style: none;
            }

            .page-item {
                display: inline-block;
                -webkit-transform: translateZ(0);
                transform: translateZ(0);

            }

            .page-item:hover {
                background-color: rgba(0, 0, 0, .1);
            }

            .page-item:active {
                background-color: rgba(0, 0, 0, .165) !important;
            }

            .page-link {
                /* mdui-btn */
                position: relative;
                display: inline-block;
                min-width: 88px;
                height: 36px;
                -webkit-box-sizing: border-box;
                box-sizing: border-box;
                padding: 0 16px;
                margin: 0;
                overflow: hidden;
                font-size: 14px;
                font-weight: 500;
                line-height: 36px;
                color: inherit;
                text-align: center;
                text-decoration: none;
                text-transform: uppercase;
                letter-spacing: .04em;
                white-space: nowrap;
                vertical-align: middle;
                -ms-touch-action: manipulation;
                touch-action: manipulation;
                cursor: pointer;
                zoom: 1;
                -webkit-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
                background: 0 0;
                border: none;
                border-radius: 2px;
                outline: 0;
                -webkit-transition: all .2s cubic-bezier(.4, 0, .2, 1), -webkit-box-shadow .2s cubic-bezier(.4, 0, 1, 1);
                transition: all .2s cubic-bezier(.4, 0, .2, 1), -webkit-box-shadow .2s cubic-bezier(.4, 0, 1, 1);
                transition: all .2s cubic-bezier(.4, 0, .2, 1), box-shadow .2s cubic-bezier(.4, 0, 1, 1);
                transition: all .2s cubic-bezier(.4, 0, .2, 1), box-shadow .2s cubic-bezier(.4, 0, 1, 1), -webkit-box-shadow .2s cubic-bezier(.4, 0, 1, 1);
                will-change: box-shadow;
                -webkit-user-drag: none;

                /* mdui-ripple */
                position: relative;
                overflow: hidden;
                cursor: pointer;
                -webkit-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
            }

            .active {
                color: rgba(0, 0, 0, .87) !important;
                background-color: rgba(0, 0, 0, .165) !important;
            }

            .disabled {
                background-color: unset;
            }
        </style>
        <!-- laravel 只支持Bootstrap -->
        {{ $posts->links() }}
    </div>
</div>
@endsection
