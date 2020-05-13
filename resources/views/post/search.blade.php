@extends("layout.main")

@section("content")
<div class="mdui-col-xs-12 mdui-hidden-sm-down" style="min-height: 80px;">
    &nbsp;
</div>
<div class="mdui-row" style="margin-top: 20px; margin-bottom: 24px;">
    <!-- search result page-->
    <div class="mdui-card mdui-col-xs-12" style="padding: 0;">
        <div class="mdui-col-md-9 mdui-col-sm-12" style="padding: 0; ">
            <ul class="mdui-list">

                <li class="mdui-list-item mdui-ripple">
                    <a class="padding-for-avatar" href="#user">
                        <div class="mdui-list-item-avatar"><img src="" />
                        </div>
                    </a>
                    <a href="/posts/articles/#">
                        <div class="mdui-list-item-content">
                            <div class="mdui-list-item-title mdui-list-item-one-line">title</div>
                            <div class="mdui-list-item-text mdui-list-item-one-line">
                                2020-05-10 by <a href="#user">User</a>
                            </div>
                            <div class="mdui-list-item-text mdui-list-item-two-line">Content</div>
                            <div class="mdui-list-item-text mdui-list-item-one-line"><i class="mdui-icon material-icons">&#xe8dc;</i>：, <i class="mdui-icon material-icons">&#xe0b9;</i>： </div>
                        </div>
                    </a>
                </li>

                <li class="mdui-list-item mdui-ripple">
                    <a class="padding-for-avatar" href="#user">
                        <div class="mdui-list-item-avatar"><img src="" />
                        </div>
                    </a>
                    <a href="/posts/articles/#">
                        <div class="mdui-list-item-content">
                            <div class="mdui-list-item-title mdui-list-item-one-line">title</div>
                            <div class="mdui-list-item-text mdui-list-item-one-line">
                                2020-05-10 by <a href="#user">User</a>
                            </div>
                            <div class="mdui-list-item-text mdui-list-item-two-line">Content</div>
                            <div class="mdui-list-item-text mdui-list-item-one-line"><i class="mdui-icon material-icons">&#xe8dc;</i>：, <i class="mdui-icon material-icons">&#xe0b9;</i>： </div>
                        </div>
                    </a>
                </li>


            </ul>
        </div>

        <div id="tagsBoard" class="mdui-col-md-3 mdui-col-sm-12" style="">
            <p>Result tags</p>
        </div>
        <script>
            var tagElem = document.getElementById('tagsBoard')

            var darkCookie = 0
            var cookies = document.cookie.split(";")
            for (i = 0; i < cookies.length; i++) {
                if (cookies.indexOf("dark=0") != -1 || cookies.indexOf(" dark=0") != -1) {
                    // already was 0, normal mode
                    tagElem.style = "border-top: 1px solid rgba(0,0,0,.14); padding: 16px; padding-top:0; "
                } else if (cookies.indexOf("dark=1") != -1 || cookies.indexOf(" dark=1") != -1) {
                    // already was 1, dark mode
                    tagElem.style = "border-top: 1px solid rgba(255,255,255,.14); padding: 16px; padding-top:0; "
                } else {
                    // initial to 0, normal mode
                    tagElem.style = "border-top: 1px solid rgba(0,0,0,.14); padding: 16px; padding-top:0; "
                    darkCookie = 0
                }
                break;
            }

            function changeHrTheme() {
                if ($$('body').hasClass('mdui-theme-layout-dark')) {
                    tagElem.style = "border-top: 1px solid rgba(255,255,255,.14); padding: 16px; padding-top:0; "

                } else {
                    tagElem.style = "border-top: 1px solid rgba(0,0,0,.14); padding: 16px; padding-top:0; "

                }
            }

            console.log(darkCookie)
        </script>
    </div>
</div>

@endsection