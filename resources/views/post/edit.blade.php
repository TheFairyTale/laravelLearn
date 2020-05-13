@extends("layout.main")

@section("content")
<div class="mdui-row" style="margin-top: 20px; margin-bottom: 24px;">
    <!-- Main view page-->
    <script>
        // 用于解决编辑时取出的内容不会被编辑器自动渲染的问题
        // https://blog.csdn.net/LJFPHP/article/details/78865034
        window.onload = function() {
            // 将textarea 的值取出
            var textarea = document.getElementById("editor").value;
            // content 将值通过innerHTML 赋给编辑器
            document.getElementById("contents").innerHTML = textarea;
        }
    </script>
    <div class="mdui-col-xs-12" style="margin-bottom: 16px;">
        <div class="mdui-card ">
            @include('layout/error')
            @can("update", $post)
            <form action="/posts/{{ $post->id }}" method="POST">
                @csrf
                <div class="mdui-card-primary mdui-col">
                    <div class="mdui-textfield mdui-textfield-floating-label">
                        <label class="mdui-textfield-label">Edit title</label>
                        <input minlength="4" maxlength="72" class="mdui-textfield-input" name="title" id="articleTitle" type="text" value="{{ $post->title }}" />
                    </div>
                </div>
                <!-- wangEditor -->
                <div class="mdui-card-content mdui-typo">
                    <div id="editDiv">
                        <div id="contents"></div>
                    </div>
                </div>
                <textarea minlength="9" readonly id="editor" name="content" class="" rows="16" style="display:  none;">{{ $post->content }}</textarea>
                <div style="padding: 16px;">
                    <button class="mdui-btn mdui-btn-block mdui-color-theme mdui-ripple" type="submit">Save article</button>
                </div>
            </form>
            @endcan
            @can("delete", $post)
            <div style="padding: 0 16px 16px 16px; " >
                <form action="/posts/articles/{{ $post->id }}/delete" method="GET">
                    {{ csrf_field() }}
                    <button class="mdui-btn mdui-btn-block mdui-color-red-accent mdui-ripple" style="" type="button" mdui-dialog="{target: '#warningDeleteDialog'}">Delete article</button>
                    
                    <div class="mdui-dialog" id="warningDeleteDialog" style="z-index: 100009;">
                        <div class="mdui-dialog-title">Are you sure you want to delete this article ?</div>
                        <div class="mdui-dialog-content">This operation cannot be returned.</div>
                        <div class="mdui-dialog-actions mdui-dialog-actions-stacked">
                            <button class="mdui-btn mdui-ripple " style="color: #ff5252!important;" type="submit" >Delete article</button>
                            <button class="mdui-btn mdui-ripple " mdui-dialog-close>Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
            @endcan
        </div>
    </div>
    <!--
    <div class="mdui-col-md-3 mdui-col-sm-12">
        <div class="mdui-card">
            <ul class="mdui-list">
                <a href="##" target="_blank">
                    <li class="mdui-list-item mdui-ripple">
                        <div class="mdui-list-item-avatar"><img src="https://i1.hdslb.com/bfs/face/f469b49f73ee48147d0801b63f220a830dd051f6.jpg_64x64.jpg" />
                        </div>
                        <div class="mdui-list-item-content">
                            <div class="mdui-list-item-title">犬山玉姬烤肉组</div>
                            <div class="mdui-list-item-text mdui-list-item-one-line" style="overflow: hidden;">
                                The
                                article is created by the user</div>
                        </div>
                    </li>
                </a>
            </ul>
        </div>
    </div> -->
</div>
@endsection