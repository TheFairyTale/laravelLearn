@extends("layout.main")
@section("content")
<div class="mdui-row">
    <div class="mdui-col-xs-12" style="padding-top: 105px">
    </div>
    <div class="mdui-col-xs-12">
        <div class="mdui-card">
            <div class=" " style="padding: 24px 16px 16px 16px">
                <!-- https://storage.live.com/Users/8755950069697370916/MyProfile/ExpressionProfile/ProfilePhoto:Win8Static,UserTileMedium,UserTileStatic -->
                <img id="userCardImg" class="mdui-img-circle mdui-center" src="{{ $user->avatar }}" />
                <h1 style="width: 100%" class="mdui-center mdui-text-center">{{ $user->name }}</h1>
                <div class="mdui-center mdui-text-center">
                    <p>{{ $user->email }}</p>
                    <p>Following: {{ $user->stars_count }} Fans: {{ $user->fans_count }} Articles: {{ $user->posts_count }} </p>
                </div>
            </div>
            <!-- 卡片的内容 -->
            <div class="" style="position: relative; padding: 16px 0; font-size: 14px; line-height: 24px;">
                <div class="mdui-tab mdui-tab-full-width" mdui-tab>
                    <a href="#posts" class="mdui-ripple">Articles</a>
                    <a href="#following" class="mdui-ripple">Following</a>
                    <a href="#fans" class="mdui-ripple">Fans</a>
                </div>
                <div id="posts" class="mdui-p-a-2" style="padding-left: 0!important; padding-right: 0!important;">
                    <ul class="mdui-list">
                        @foreach($post as $article)
                        <li class="mdui-list-item mdui-ripple">
                            <a href="/posts/articles/{{ $article->id }}" style="width: 100%;">
                                <div class="mdui-list-item-content">
                                    <div class="mdui-list-item-title mdui-list-item-one-line">
                                        {{ $article->title }}
                                    </div>
                                    <div class="mdui-list-item-text mdui-list-item-two-line">
                                        {{ $article->content }}
                                    </div>
                                    <div class="mdui-list-item-text mdui-list-item-one-line mdui-text-right">
                                        {{ $article->created_at->diffForHumans() }}
                                    </div>
                                </div>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div id="following" class="mdui-p-a-2" style="padding-left: 0!important; padding-right: 0!important;">
                    <ul class="mdui-list">
                        @foreach($susers as $following)
                        <li class="mdui-list-item " style="width: 100%;">
                            <a class="padding-for-avatar" href="/user/{{ $following->id }}" style="">
                                <div class="mdui-list-item-avatar"><img src="" /></div>
                            </a>
                            <div class="mdui-list-item-content">
                                <a class="" href="/user/{{ $following->id }}" style="width: 100%;">
                                    <div class="mdui-list-item-title">{{ $following->name }}</div>
                                    <div class="mdui-list-item-text mdui-list-item-one-line">Following:{{ $following->stars_count }} Fans:{{ $following->fans_count }} Articles:{{ $following->posts_count }} </div>
                                </a>
                            </div>
                            <div class="mdui-valign " style="z-index: 100009999;">
                                <button class="mdui-btn mdui-btn-raised mdui-btn-dense mdui-color-theme-accent mdui-ripple" type="">Button</button>
                            </div>
                        </li>

                        <li class="mdui-divider-inset mdui-m-y-0"></li>
                        @endforeach
                    </ul>
                </div>
                <div id="fans" class="mdui-p-a-2" style="padding-left: 0!important; padding-right: 0!important;">
                    <ul class="mdui-list">
                        @foreach($fusers as $fan)
                        <li class="mdui-list-item " style="width: 100%;">
                            <a class="padding-for-avatar" href="/user/{{ $fan->id }}" style="">
                                <div class="mdui-list-item-avatar"><img src="" /></div>
                            </a>
                            <div class="mdui-list-item-content">
                                <a class="" href="/user/{{ $fan->id }}" style="width: 100%;">
                                    <div class="mdui-list-item-title">{{ $fan->name }}</div>
                                    <div class="mdui-list-item-text mdui-list-item-one-line">Following:{{ $fan->stars_count }} Fans:{{ $fan->fans_count }} Articles:{{ $fan->posts_count }} </div>
                                </a>
                            </div>
                            <div class="mdui-valign " style="z-index: 100009999;">
                                <button class="mdui-btn mdui-btn-raised mdui-btn-dense mdui-color-theme-accent mdui-ripple" type="">Follow</button>
                            </div>
                        </li>

                        <li class="mdui-divider-inset mdui-m-y-0"></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection