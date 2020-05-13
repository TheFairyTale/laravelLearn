<!DOCTYPE html>
<html lang="en">

@include("layout.head")
<style>
    
    html,
        body {
            height: 100%;
        }

</style>

<body id="body" class=" ">

        <!-- 页面主体 -->
        @yield("content")

    <script src="//cdnjs.loli.net/ajax/libs/mdui/0.4.3/js/mdui.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.4.1/dist/jquery.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script>
        // 页面脚本
        var $$ = mdui.JQ;
        
        // verify dark mode
        var darkCookie = 0
        var cookies = document.cookie.split(";")
        for (i = 0; i < cookies.length; i++) {
            if (cookies.indexOf("dark=0") != -1) {
                // already was 0, normal mode
                $$('body').removeClass('mdui-theme-layout-dark')
                $$('body').removeClass('body-bg-remove-light')
            } else if (cookies.indexOf("dark=1") != -1) {
                // already was 1, dark mode
                $$('body').addClass('mdui-theme-layout-dark')
                $$('body').addClass('body-bg-remove-light')
            } else {
                darkCookie = -1
            }
            break;
        }
        console.log(darkCookie)

        // change dark mode
        function changeDarkTheme() {
            $$('body').toggleClass('mdui-theme-layout-dark')
            if ($$('body').hasClass('mdui-theme-layout-dark')) {
                document.cookie = "dark=" + escape(1) + "; path=" + escape('/')
                $$('body').addClass('body-bg-remove-light')
            } else {
                document.cookie = "dark=" + escape(0) + "; path=" + escape('/')
                $$('body').removeClass('body-bg-remove-light')
            }
        }

        // 为页面加上颜色
        $$('body').addClass('mdui-theme-accent-blue')
        $$('body').addClass('mdui-theme-primary-blue')
    </script>
</body>

</html>