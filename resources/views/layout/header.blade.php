<header class="mdui-appbar mdui-appbar-fixed mdui-appbar-scroll-hide">
    <div class="mdui-toolbar mdui-color-theme">
        <!--
            <a href="javascript:;" class="mdui-btn mdui-btn-icon"><i class="mdui-icon material-icons">&#xe5d2;</i></a>
            -->
        <a href="/" class="mdui-typo-headline mdui-hidden-sm-down">The article website</a>
        <a href="/" class="mdui-typo-title">Main page</a>
        <div class="mdui-toolbar-spacer"></div>
        <!-- Search code here -->

        <div class="form-group" style="width: 50%;">
            <form>
                <div class="mdui-textfield mdui-textfield-expandable mdui-float-right">
                    <button type="button" class="mdui-textfield-icon mdui-btn mdui-btn-icon"><i
                            class="mdui-icon material-icons">&#xe8b6;</i></button>
                    <input name="" id="" class="mdui-textfield-input" aria-label="Search here .... "
                           aria-describedby="articleSearch" type="text" placeholder="Search"/>
                    <button type="button" class="mdui-textfield-close mdui-btn mdui-btn-icon"><i
                            class="mdui-icon material-icons">&#xe5cd;</i></button>
                </div>
            </form>
        </div>
        <!-- 用户操作菜单开始 -->
        <!-- 判断是否登入, 未登入显示 登入注册 菜单, 登入时图标为头像 显示主页,设置,登出 -->
        @if ( \Auth::check() )
            <a href="javascript:;" class="mdui-btn mdui-btn-icon" style="margin-left: 8px;"
               mdui-menu="{target: '#userAction'}"><img class="mdui-img-circle"
                                                        style="padding: 4px; width: 40px; height: 40px;"
                                                        src="https://i1.hdslb.com/bfs/face/f469b49f73ee48147d0801b63f220a830dd051f6.jpg_64x64.jpg"></a>
            <ul class="mdui-menu" id="userAction">

                <li class="mdui-menu-item" disabled>
                    <a href="" class="mdui-ripple">{{ \Auth::user()->name }}</a>
                </li>
                <li class="mdui-divider"></li>
                <li class="mdui-menu-item">
                    <a href="/user/{{ \Auth::user()->id }}" class="mdui-ripple">Personal center</a>
                </li>
                <li class="mdui-menu-item">
                    <a href="/user/me/setting" class="mdui-ripple">Account setting</a>
                </li>
                <li class="mdui-menu-item">
                    <a href="/logout" class="mdui-ripple">Sign out</a>
                </li>
                @else
                    <a href="javascript:;" class="mdui-btn mdui-btn-icon" style="margin-left: 8px;"
                       mdui-menu="{target: '#userAction'}"><i class="mdui-icon material-icons">&#xe853;</i></a>
                    <ul class="mdui-menu" id="userAction">

                        <li class="mdui-menu-item">
                            <a href="/register" class="mdui-ripple">Register</a>
                        </li>
                        <li class="mdui-divider"></li>
                        <li class="mdui-menu-item">
                            <a href="/login" class="mdui-ripple">Sign in</a>
                        </li>
                        @endif
                    </ul>
                    <!-- 用户操作菜单结束 -->

                    <!-- 系统操作菜单开始 -->
                    <!-- 判断是否登入, 未登入显示 无(或是关于信息), 登入时为 创建文章, 文章管理, 私信(?) 等等 -->
                    <a href="javascript:;" class="mdui-btn mdui-btn-icon" mdui-menu="{target: '#systemAction'}"><i
                            class="mdui-icon material-icons">&#xe5d4;</i></a>
                    <ul class="mdui-menu" id="systemAction">
                        @if ( \Auth::check() )

                            <li class="mdui-menu-item">
                                <a href="/posts/create" class="mdui-ripple">Create Article</a>
                            </li>
                            <li class="mdui-menu-item">
                                <a href="javascript:;" class="mdui-ripple">View all articles</a>
                            </li>
                            <li class="mdui-divider"></li>
                        @endif
                        <li class="mdui-menu-item">
                            <a href="javascript:;" class="mdui-ripple" onclick="changeDarkTheme(); changeHrTheme()">Change
                                Theme</a>
                        </li>
                        <li class="mdui-menu-item" disabled>
                            <a href="javascript:;" class="mdui-ripple">About</a>
                        </li>
                    </ul>
                    <!-- 系统操作菜单结束 -->
    </div>

    <!-- 提示框需要重新构建 -->
    <!-- 主题提示框开始 -->
    <div class="mdui-dialog" id="mdui-theme">
        <div class="mdui-dialog-title">Change theme</div>
        <div class="mdui-dialog-content">
            <div>white</div>
            <div>dark</div>
        </div>
        <div class="mdui-dialog-actions mdui-dialog-actions-stacked">
            <button class="mdui-btn mdui-ripple" type="button">Cancel</button>
            <button class="mdui-btn mdui-ripple" type="submit">OK</button>
        </div>
    </div>
    <!-- 主题提示框结束 -->
</header>
