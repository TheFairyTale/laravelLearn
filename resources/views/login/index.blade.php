@extends("layout.login_main")
@section("content")
<div class="mdui-valign" style="height: 100%;">
    <!-- Main view -->
    <div class="mdui-center" style="width: 60%;">
        <div class="mdui-card" style="padding: 20px;  height: 70%;">
            <span onclick="history.go(-1)"  mdui-tooltip="{content: 'Back to previous page'}" class="mdui-btn mdui-btn-icon mdui-ripple" style="min-height: 48px; min-width: 48px; margin-top: -18px;"><i class="mdui-icon material-icons">&#xe5c4;</i></span>
            <div style="display: inline-block; width: max-content;">Sign in
                <div class="mdui-card-primary-subtitle" style="">
                    Sign in with Email address
                </div>
            </div>
            @include('layout/error')
            <form action="/login" method="POST">
                {{ csrf_field() }}
                <div class="mdui-textfield mdui-textfield-floating-label">
                    <label for="inputEmail" class="mdui-textfield-label">Email</label>
                    <input id="inputEmail" name="email" class="mdui-textfield-input" type="email" required autofocus />
                    <div class="mdui-textfield-error">Error email format</div>
                </div>
                <div class="mdui-textfield mdui-textfield-floating-label">
                    <label for="inputPassword" class="mdui-textfield-label">Password</label>
                    <input id="inputPassword" name="password" class="mdui-textfield-input" type="password" required />
                    <div class="mdui-textfield-error">password mast be longer than 8</div>
                    <div class="mdui-textfield-helper">password mast be longer than 8</div>
                </div>

                <label for="defaultCheck1" class="mdui-checkbox">
                    <input type="checkbox" value="1" id="defaultCheck1" name="is_remember" />
                    <i class="mdui-checkbox-icon"></i>
                    Rember me
                </label>

                <button class="mdui-btn mdui-btn-block mdui-btn-raised mdui-ripple mdui-color-theme" type="submit">Sign in</button>
            </form>
            <p>No account? <a href="/register" target="__blank">Create one!</a></p>
        </div>
    </div>
</div>
@endsection
