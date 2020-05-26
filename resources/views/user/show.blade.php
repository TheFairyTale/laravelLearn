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
                    <button class="mdui-btn mdui-btn-raised mdui-btn-dense mdui-color-theme-accent mdui-ripple follow-like-btn {{ $user->id }}-follow" onclick="" type="">Follow</button>
                    <!-- 尝试传入 token -->
                    <button class="mdui-btn mdui-btn-raised mdui-btn-dense mdui-color-theme-accent mdui-ripple follow-unlike-btn {{ $user->id }}-unfollow" onclick="ajax('', '', csrf_token)" type="">Unfollow</button>
                </div>

            </div>
            <!-- 卡片的内容 -->
            <div class="" style="position: relative; padding: 16px 0; font-size: 14px; line-height: 24px;">
                <div class="mdui-tab mdui-tab-full-width" mdui-tab>
                    <a href="#posts" class="mdui-ripple">Articles</a>
                    <a href="#following" class="mdui-ripple">Following</a>
                    <a href="#fans" class="mdui-ripple">Fans</a>
                </div>
                <!-- articles -->
                <div id="posts" class="mdui-p-a-2" style="padding-left: 0!important; padding-right: 0!important;">
                    <ul class="mdui-list">
                        @foreach($post as $article)
                        <li class="mdui-list-item mdui-ripple">
                            <a href="/posts/articles/{{ $article->id }}" style="width: 100%;">
                                <div class="mdui-list-item-content">
                                    <div class="mdui-list-item-title mdui-list-item-one-line">
                                        {{ $article->title }}
                                    </div>
                                    <div class="mdui-list-item-text mdui-list-item-two-line" style="line-break: anywhere; -webkit-line-break: anywhere; display:block;">
                                        {{ $article->content }}

                                    </div>
                                    <div class="mdui-list-item-text mdui-list-item-one-line mdui-text-right">
                                        {{ $article->created_at->diffForHumans() }}
                                    </div>
                                </div>
                            </a>
                            @if ( \Auth::check() )
                            @if ( \Auth::user()->id == $user->id )
                            <div class="mdui-valign " style="">
                                <a href="/posts/articles/{{ $article->id }}/edit">
                                    <button class="mdui-btn mdui-btn-raised mdui-btn-dense mdui-color-theme-accent mdui-ripple" type="">Edit this article</button>
                                </a>
                            </div>
                            @endif
                            @endif
                        </li>
                        @endforeach
                    </ul>
                </div>
                <!-- following -->
                <div id="following" class="mdui-p-a-2" style="padding-left: 0!important; padding-right: 0!important;">
                    <ul class="mdui-list">
                        @foreach($susers as $SFuser)
                        <li class="mdui-list-item " style="width: 100%;">
                            <div style="display: contents;">
                                <a class="padding-for-avatar" href="/user/{{ $SFuser->id }}" style="">
                                    <div class="mdui-list-item-avatar"><img src="{{ $SFuser->avatar }}" /></div>
                                </a>
                                <div class="mdui-list-item-content" style="width: 100%;">
                                    <a class="" href="/user/{{ $SFuser->id }}">
                                        <div class="mdui-list-item-title">{{ $SFuser->name }}</div>
                                        <div class="mdui-list-item-text mdui-list-item-one-line">
                                            Following:{{ $SFuser->stars_count }} Fans:{{ $SFuser->fans_count }} Articles:{{ $SFuser->posts_count }}
                                        </div>
                                    </a>
                                    <!-- follow & unfollow btn -->
                                    <div class="mdui-valign" style="">
                                        @include("user/badges/fan")
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li class="mdui-divider-inset mdui-m-y-0"></li>
                        @endforeach
                    </ul>
                </div>
                <!-- fans -->
                <div id="fans" class="mdui-p-a-2" style="padding-left: 0!important; padding-right: 0!important;">
                    <ul class="mdui-list">
                        @foreach($fusers as $SFuser)
                        <li class="mdui-list-item " style="width: 100%;">
                            <a class="padding-for-avatar" href="/user/{{ $SFuser->id }}" style="">
                                <div class="mdui-list-item-avatar"><img src="{{ $SFuser->avatar }}" /></div>
                            </a>
                            <div class="mdui-list-item-content">
                                <a class="" href="/user/{{ $SFuser->id }}" style="width: 100%;">
                                    <div class="mdui-list-item-title">{{ $SFuser->name }}</div>
                                    <div class="mdui-list-item-text mdui-list-item-one-line">Following:{{ $SFuser->stars_count }} Fans:{{ $SFuser->fans_count }} Articles:{{ $SFuser->posts_count }} </div>
                                </a>
                            </div>
                            <!-- follow & unfollow btn -->

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