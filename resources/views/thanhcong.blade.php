


@if(Auth::check())



<h1>Dang nhap thanh cong</h1>
@if(isset($user))
    {{"Ten : ". $user->name}}
    <br>
    {{'Email : ' . $user->email}}
    <br>
    {{"Mật khẩu : ". $user->password}}
    <br>
    <a href="{{url('logout')}}">Logout</a>

    @endif
    @else 
    <h1>Bạn chưa đăng nhập</h1>
@endif

