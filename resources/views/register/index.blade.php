@extends("layout.login_main")

@section("content")

<div class="mdui-valign" style="height: 100%;">
    <!-- Main view -->
    <div class="mdui-center" style="width: 60%;">
        <div class="mdui-card" style="margin-top: 40px; margin-bottom: 24px; padding: 20px;  height: 70%;">
            <span onclick="history.go(-1)"  mdui-tooltip="{content: 'Back to previous page'}" class="mdui-btn mdui-btn-icon mdui-ripple" style="min-height: 48px; min-width: 48px; margin-top: -18px;"><i class="mdui-icon material-icons">&#xe5c4;</i></span>
            <div style="display: inline-block; width: max-content;">Register
                <div class="mdui-card-primary-subtitle" style="">Register with email
                </div>
            </div>
            @include('layout/error')
            <form action="/register" method="POST">
                {{ csrf_field() }}
                <div class="mdui-textfield mdui-textfield-floating-label">
                    <label for="inputUserName" class="mdui-textfield-label">Username(name)</label>
                    <input id="inputUserName" class="mdui-textfield-input" type="text" name="name" required autofocus />
                    <div class="mdui-textfield-error">Name cannot contain special characters or cannot be empty</div>
                </div>
                <div class="mdui-textfield mdui-textfield-floating-label">
                    <label for="inputEmail" class="mdui-textfield-label">Email</label>
                    <input id="inputEmail" class="mdui-textfield-input" type="email" name="email" required />
                    <div class="mdui-textfield-error">Wrong email format</div>
                </div>
                <div class="mdui-textfield mdui-textfield-floating-label">
                    <label for="inputPassword" class="mdui-textfield-label">Password</label>
                    <input class="mdui-textfield-input" id="inputPassword" type="password" name="password" required />
                    <div class="mdui-textfield-error">Password must exceed 8 characters or cannot be empty</div>
                    <div class="mdui-textfield-helper">Password must exceed 8 characters</div>
                </div>
                <div class="mdui-textfield mdui-textfield-floating-label">
                    <label for="confirmInputPassword" class="mdui-textfield-label">Confirm password</label>
                    <input id="confirmInputPassword" class="mdui-textfield-input" type="password" name="password_confirmation" required />
                    <div class="mdui-textfield-error">The password does not match</div>
                    <div class="mdui-textfield-helper">Repeat password</div>
                </div>

                <label class="mdui-checkbox" for="userAgreements">
                    <input type="checkbox" value="" id="userAgreements" required />
                    <i class="mdui-checkbox-icon"></i>
                    I have read and understood all <a href="#" target="__blank">user agreements</a>
                </label>

                <button class="mdui-btn mdui-btn-block mdui-btn-raised mdui-ripple mdui-color-theme" type="submit">Create account</button>
            </form>
            <p>Already have an account? <a href="/login">Sign in</a> now!</p>
        </div>
    </div>
</div>

@endsection