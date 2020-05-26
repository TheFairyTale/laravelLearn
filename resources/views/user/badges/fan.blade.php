@if ( \Auth::check() )
@if ( \Auth::user()->id == $user->id )
<button class="mdui-btn mdui-btn-raised mdui-btn-dense mdui-color-theme-accent mdui-ripple follow-like-btn {{ $SFuser->id }}-follow" onclick="" type="">Follow</button>
<!-- 尝试传入 token -->
<button class="mdui-btn mdui-btn-raised mdui-btn-dense mdui-color-theme-accent mdui-ripple follow-unlike-btn {{ $SFuser->id }}-unfollow" onclick="ajax('/user/{{ $SFuser->id }}/unfan', '{{$SFuser->id}}', csrf_token)" type="">Unfollow</button>
@endif
@endif
