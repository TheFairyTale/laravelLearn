<!DOCTYPE html>
<html lang="zh">

@include("layout.head")

<body id="body" class="mdui-appbar-with-toolbar ">
    @include("layout.header")

    <div class="mdui-container">
        <!-- 页面主体 -->
        @yield("content")

    </div>

    @include("layout.footer")

    <script src="//cdnjs.loli.net/ajax/libs/mdui/0.4.3/js/mdui.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.4.1/dist/jquery.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="/js/wangEditor.min.js"></script>

    <!-- vue-quill-editor -->
    <script type="text/javascript" src="/js/quill/quill.js"></script>
    <script type="text/javascript" src="/js/vue.min.js"></script>
    <script type="text/javascript" src="/js/vue-quill-editor/vue-quill-editor.js"></script>

    <script>
        // You can also register Quill modules in the component
        import Quill from 'quill'
        //import someModule from '../yourModulePath/someQuillModule.js'
        //Quill.register('modules/someModule', someModule)

        export default {
            data() {
                return {
                    content: '<h2>I am Example</h2>',
                    editorOption: {
                        // Some Quill options...
                    }
                }
            },
            methods: {
                onEditorBlur(quill) {
                    console.log('editor blur!', quill)
                },
                onEditorFocus(quill) {
                    console.log('editor focus!', quill)
                },
                onEditorReady(quill) {
                    console.log('editor ready!', quill)
                },
                onEditorChange({
                    quill,
                    html,
                    text
                }) {
                    console.log('editor change!', quill, html, text)
                    this.content = html
                }
            },
            computed: {
                editor() {
                    return this.$refs.myQuillEditor.quill
                }
            },
            mounted() {
                console.log('this is current quill instance object', this.editor)
            }
        }
    </script>
    <script type="text/javascript">
        Vue.use(window.VueQuillEditor)

        //import 'quill/dist/quill.core.css'
        //import 'quill/dist/quill.snow.css'
        //import 'quill/dist/quill.bubble.css'

        import {
            quillEditor
        } from 'vue-quill-editor'

        export default {
            components: {
                quillEditor
            }
        }
    </script>
    <script>
        var E = window.wangEditor

        var editor = new E('#editDiv')
        //var editor = new E(document.getElementById('editDiv'))
        // 开启粘贴样式的过滤
        editor.customConfig.pasteFilterStyle = true

        var textArea = $('#editor')
        editor.customConfig.onchange = function(html) {
            // 监控变化，同步更新到 textarea
            textArea.val(html)
        }

        // 关闭上传图片功能并设置为base64 存储
        editor.customConfig.uploadImgShowBase64 = false
        // 配置服务器端地址
        editor.customConfig.uploadImgServer = '/image/upload'
        // 限制图片上传大小为3Mb 
        editor.customConfig.uploadImgMaxSize = 3 * 1024 * 1024
        // 限制一次最多上传 5 张图片
        editor.customConfig.uploadImgMaxLength = 10
        //固定上传的文件名
        //editor.customConfig.uploadFileName = 'articlesImage'
        // 自定义header 
        editor.customConfig.uploadImgHeaders = {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }

        editor.create()
        // 初始化 textarea 的值
        textArea.val(editor.txt.html)
    </script>
    <script>
        // 页面脚本
        var $$ = mdui.JQ;

        // verify dark mode
        var darkCookie = 0
        var cookies = document.cookie.split(";")
        for (i = 0; i < cookies.length; i++) {
            if (cookies.indexOf("dark=0") != -1 || cookies.indexOf(" dark=0") != -1) {
                // already was 0, normal mode
                $$('body').removeClass('mdui-theme-layout-dark')
                $$('body').removeClass('body-bg-remove-light')
                $$('#userCardImg').removeClass('user-img-shadow-darkmode')
                $$('#userCardImg').addClass('user-img-shadow')
            } else if (cookies.indexOf("dark=1") != -1 || cookies.indexOf(" dark=1") != -1) {
                // already was 1, dark mode
                $$('body').addClass('mdui-theme-layout-dark')
                $$('body').addClass('body-bg-remove-light')
                $$('#userCardImg').addClass('user-img-shadow-darkmode')
                $$('#userCardImg').removeClass('user-img-shadow')
            } else {
                // initial to 0, normal mode
                $$('body').removeClass('mdui-theme-layout-dark')
                $$('body').removeClass('body-bg-remove-light')
                $$('#userCardImg').removeClass('user-img-shadow-darkmode')
                $$('#userCardImg').addClass('user-img-shadow')
                darkCookie = 0
            }
            break;
        }
        console.log(darkCookie)

        // change dark mode
        function changeDarkTheme() {
            $$('body').toggleClass('mdui-theme-layout-dark')
            if ($$('body').hasClass('mdui-theme-layout-dark')) {
                document.cookie = " dark=" + escape(1) + "; path=" + escape('/')
                $$('body').addClass('body-bg-remove-light')
                $$('#userCardImg').addClass('user-img-shadow-darkmode')
                $$('#userCardImg').removeClass('user-img-shadow')
            } else {
                document.cookie = " dark=" + escape(0) + "; path=" + escape('/')
                $$('body').removeClass('body-bg-remove-light')
                $$('#userCardImg').removeClass('user-img-shadow-darkmode')
                $$('#userCardImg').addClass('user-img-shadow')
            }
        }

        // 为页面加上颜色
        $$('body').addClass('mdui-theme-accent-blue')
        $$('body').addClass('mdui-theme-primary-blue')
    </script>
</body>

</html>