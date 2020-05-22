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
                <div id="posts" class="mdui-p-a-2">article</div>
                <div id="following" class="mdui-p-a-2">following</div>
                <div id="fans" class="mdui-p-a-2">fans</div>
            </div>
        </div>
    </div>
</div>
@endsection