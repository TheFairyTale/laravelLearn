@extends("layout.main")
@section("content")
<div class="mdui-row">
    <div class="mdui-col-xs-12" style="padding-top: 105px">
    </div>
    <div class="mdui-col-xs-12">
        <div class="mdui-card">
            <div class=" " style="padding: 24px 16px 16px 16px">
                <img id="userCardImg" class="mdui-img-circle mdui-center" src="https://storage.live.com/Users/8755950069697370916/MyProfile/ExpressionProfile/ProfilePhoto:Win8Static,UserTileMedium,UserTileStatic" />
                <h1 style="width: 100%" class="mdui-center mdui-text-center">Kanda</h1>
                <div class="mdui-center mdui-text-center">
                    email@example.com
                </div>
            </div>
            <!-- 卡片的内容 -->
            <div class="" style="position: relative; padding: 16px 0; font-size: 14px; line-height: 24px;">
                <div class="mdui-tab mdui-tab-full-width" mdui-tab>
                    <a href="#posts" class="mdui-ripple">Articles</a>
                    <a href="#following" class="mdui-ripple">Following</a>
                    <a href="#fans" class="mdui-ripple">Fans</a>
                </div>
                <div id="posts" class="mdui-p-a-2" style="padding-left: 0!important; padding-right: 0!important;">article</div>
                <div id="following" class="mdui-p-a-2" style="padding-left: 0!important; padding-right: 0!important;">
                    <ul class="mdui-list">
                        <li class="mdui-list-item mdui-ripple">
                            <div class="mdui-list-item-avatar"><img src="avatar1.jpg" /></div>
                            <div class="mdui-list-item-content">
                                <div class="mdui-list-item-title">Brunch this weekend?</div>
                                <div class="mdui-list-item-text mdui-list-item-one-line"><span class="mdui-text-color-theme-text">All Connors</span> - I'll be in your neighborhood ...</div>
                            </div>
                        </li>
                        <li class="mdui-divider-inset mdui-m-y-0"></li>
                        <li class="mdui-list-item mdui-ripple">
                            <div class="mdui-list-item-avatar"><img src="avatar2.jpg" /></div>
                            <div class="mdui-list-item-content">
                                <div class="mdui-list-item-title">Summer BBQ</div>
                                <div class="mdui-list-item-text mdui-list-item-one-line"><span class="mdui-text-color-theme-text">to Alex, Scott, Jennifer</span> - Wish I could ...</div>
                            </div>
                        </li>
                        <li class="mdui-divider-inset mdui-m-y-0"></li>
                        <li class="mdui-list-item mdui-ripple">
                            <div class="mdui-list-item-avatar"><img src="avatar3.jpg" /></div>
                            <div class="mdui-list-item-content">
                                <div class="mdui-list-item-title">Oui oui</div>
                                <div class="mdui-list-item-text mdui-list-item-one-line"><span class="mdui-text-color-theme-text">Sandra Adams</span> - Do you have Paris reco ...</div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div id="fans" class="mdui-p-a-2" style="padding-left: 0!important; padding-right: 0!important;">
                    <ul class="mdui-list">
                        <li class="mdui-list-item mdui-ripple">
                            <div class="mdui-list-item-avatar"><img src="avatar1.jpg" /></div>
                            <div class="mdui-list-item-content">
                                <div class="mdui-list-item-title">Brunch this weekend?</div>
                                <div class="mdui-list-item-text mdui-list-item-one-line"><span class="mdui-text-color-theme-text">All Connors</span> - I'll be in your neighborhood ...</div>
                            </div>
                        </li>
                        <li class="mdui-divider-inset mdui-m-y-0"></li>
                        <li class="mdui-list-item mdui-ripple">
                            <div class="mdui-list-item-avatar"><img src="avatar2.jpg" /></div>
                            <div class="mdui-list-item-content">
                                <div class="mdui-list-item-title">Summer BBQ</div>
                                <div class="mdui-list-item-text mdui-list-item-one-line"><span class="mdui-text-color-theme-text">to Alex, Scott, Jennifer</span> - Wish I could ...</div>
                            </div>
                        </li>
                        <li class="mdui-divider-inset mdui-m-y-0"></li>
                        <li class="mdui-list-item mdui-ripple">
                            <div class="mdui-list-item-avatar"><img src="avatar3.jpg" /></div>
                            <div class="mdui-list-item-content">
                                <div class="mdui-list-item-title">Oui oui</div>
                                <div class="mdui-list-item-text mdui-list-item-one-line"><span class="mdui-text-color-theme-text">Sandra Adams</span> - Do you have Paris reco ...</div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection