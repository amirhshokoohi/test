<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('/css/login.css') }}">
    <title>راکت پنل</title>

</head>

<body>

<div class="rocket-container">
    <img class="rocket" src="{{ asset('/images/rocket-0d392ed0.webp') }}">
</div>


<div class="login-box">
    <h3>نام کاربری و رمز عبور را وارد نمایید</h3>
    @if (count($errors) > 0)
        <div dir='rtl' class="invalid-feedback alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form name="myform" action="{{ route('login.store') }}" method="post">
        @csrf
        <div class="user-box">
            <input type="text" name="username" required="">
            <label>نام کاربری </label>
        </div>
        <div class="user-box">
            <input type="password" name="password" required="">
            <label>رمز عبور</label>
        </div>
        <a style="cursor: pointer" onClick="submitform()">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            ورود
        </a>
    </form>
</div>

@include('sweetalert::alert')
<script type="text/javascript">
    function submitform() {
        document.myform.submit();
    }
</script>

</body>

</html>
