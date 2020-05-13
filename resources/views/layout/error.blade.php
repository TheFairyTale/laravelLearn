@if(count($errors) > 0)
<div style="padding: 15px; height: 90%; background-color: #ff5252!important; color: #fff!important;">
    @foreach($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
</div>
@endif