{{--    @livewire('header')--}}

    <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>پنل مدیریت | داشبورد اول</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('css/blue.css') }}">
    <!-- Morris chart -->
    <link rel="stylesheet" href="{{ asset('css/morris.css') }}">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{ asset('css/jquery-jvectormap-1.2.2.css') }}">
    <!-- Date Picker -->
    <link rel="stylesheet" href="{{ asset('css/datepicker3.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('css/daterangepicker-bs3.css') }}">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap3-wysihtml5.min.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- bootstrap rtl -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap-rtl.min.css') }}">
    <!-- template rtl version -->
    <link rel="stylesheet" href="{{ asset('css/custom-style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

    <style>
        body {
            visibility: hidden;
            opacity: 0;
        }
    </style>

</head>
<body class="hold-transition sidebar-mini {{ \Illuminate\Support\Facades\Cookie::get('darkMode') ? 'dark-mode' : '' }}">
<noscript>
    <style>
        body {
            visibility: visible;
            opacity: 1;
        }
    </style>
</noscript>

<div id="dark" class="wrapper">
    <!-- Navbar -->

    <nav id="main-header" class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
            </li>

        </ul>


        <!-- Right navbar links -->

        <ul class="navbar-nav mr-auto">
            @persist('darkmode')
            <div class="switch">
                <input class="mt-2" type="checkbox" id="darkModeSwitch">
                <label for="darkModeSwitch">
                    <i id="lightModeIcon" class="sun-icon">☀️</i>
                    <div class="switch-circle"></div>
                    <i id="darkModeIcon" class="moon-icon">🌙</i>
                </label>
            </div>
            @endpersist
        </ul>

    </nav>


    @livewire('sidebar')

    @if(Request::is('admin/dashboard'))
        @livewire('dashboard')

    @elseif(Request::is('admin/users'))
        @livewire('user')
    @endif


    <footer class="main-footer">
        <strong>CopyRight &copy; 2023 <a href="#">AmirH</a></strong>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('/js/jquery.min.js') }}" data-navigate-once></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" data-navigate-once></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
{{--<script data-navigate-once>--}}
{{--    $.widget.bridge('uibutton', $.ui.button)--}}
{{--</script>--}}
<!-- Bootstrap 4 -->
<script src="{{ asset('/js/bootstrap.bundle.min.js') }}" data-navigate-once></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js" data-navigate-once></script>
{{--<script src="{{ asset('/js/morris.min.js') }}"></script>--}}
<!-- Sparkline -->
<script src="{{ asset('/js/jquery.sparkline.min.js') }}" data-navigate-once></script>
<!-- jvectormap -->
<script src="{{ asset('/js/jquery-jvectormap-1.2.2.min.js') }}" data-navigate-once></script>
<script src="{{ asset('/js/jquery-jvectormap-world-mill-en.js') }}" data-navigate-once></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('/js/jquery.knob.js') }}" data-navigate-once></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js" data-navigate-once></script>
<script src="{{ asset('/js/daterangepicker.js') }}" data-navigate-once></script>
<!-- datepicker -->
<script src="{{ asset('/js/bootstrap-datepicker.js') }}" data-navigate-once></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset('/js/bootstrap3-wysihtml5.all.min.js') }}" data-navigate-once></script>
<!-- Slimscroll -->
<script src="{{ asset('/js/jquery.slimscroll.min.js') }}" data-navigate-once></script>
<!-- FastClick -->
<script src="{{ asset('/js/fastclick.js') }}" data-navigate-once></script>
<!-- AdminLTE App -->
<script src="{{ asset('/js/adminlte.js') }}" data-navigate-once></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{{--<script src="{{ asset('/js/dashboard.js') }}"></script>--}}
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('/js/demo.js') }}" data-navigate-once></script>
<!-- PAGE SCRIPTS -->
@yield('charts')

<script>
    function showTheme() {

        // Check localStorage for theme preference and set it
        if (localStorage.theme) {
            document.documentElement.setAttribute("data-theme", localStorage.theme);
        }


    }

    function showContent() {
        document.body.style.visibility = 'visible';
        document.body.style.opacity = 1;
    }

    window.addEventListener('DOMContentLoaded', function () {
        showTheme();
        showContent();
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const darkModeSwitch = document.getElementById('darkModeSwitch'); // استفاده از شناسه سوئیچ

        const isDarkMode = getCookie('darkMode') === 'true';
        document.body.classList.toggle('dark-mode', isDarkMode);

        darkModeSwitch.addEventListener('change', function () { // استفاده از رویداد change برای سوئیچ
            const currentDarkMode = document.body.classList.contains('dark-mode');
            const newDarkMode = !currentDarkMode;
            document.body.classList.toggle('dark-mode', newDarkMode);
            setCookie('darkMode', newDarkMode);

            if (document.body.classList.contains('dark-mode')) {
                darkModeSwitch.src = "{{ asset('images/sun.png') }}";
            } else {
                darkModeSwitch.src = "{{ asset('images/moon.png') }}";
            }
        });
    });

    function setCookie(name, value, days = 365) {
        const date = new Date();
        date.setTime(date.getTime() + (7 * 24 * 60 * 60 * 1000));
        const expires = "expires=" + date.toUTCString();
        document.cookie = name + "=" + value + ";" + expires + ";path=/";
    }

    function getCookie(name) {
        const cname = name + "=";
        const decodedCookie = decodeURIComponent(document.cookie);
        const cookieArray = decodedCookie.split(';');
        for (let i = 0; i < cookieArray.length; i++) {
            let cookie = cookieArray[i];
            while (cookie.charAt(0) === ' ') {
                cookie = cookie.substring(1);
            }
            if (cookie.indexOf(cname) === 0) {
                return cookie.substring(cname.length, cookie.length);
            }
        }
        return "";
    }

</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const darkModeSwitch = document.getElementById('darkModeSwitch');
        const darkModeIcon = document.getElementById('darkModeIcon');
        const lightModeIcon = document.getElementById('lightModeIcon');
        const switchCircle = document.querySelector('.switch-circle');

        darkModeSwitch.addEventListener('change', function () {
            const isChecked = darkModeSwitch.checked;

            if (isChecked) {
                document.body.classList.add('dark-mode');
                darkModeIcon.style.opacity = '0';
                lightModeIcon.style.opacity = '1';
                switchCircle.style.transform = 'translateX(20px)';
            } else {
                document.body.classList.remove('dark-mode');
                darkModeIcon.style.opacity = '1';
                lightModeIcon.style.opacity = '0';
                switchCircle.style.transform = 'translateX(0)';
            }

            // ذخیره وضعیت در localStorage
            localStorage.setItem('darkMode', isChecked.toString());
        });

        // بازیابی وضعیت از localStorage در صورت وجود
        const savedDarkMode = localStorage.getItem('darkMode') === 'true';
        darkModeSwitch.checked = savedDarkMode;

        // اعمال وضعیت اولیه برای آیکون‌ها
        if (savedDarkMode) {
            document.body.classList.add('dark-mode');
            darkModeIcon.style.opacity = '0';
            lightModeIcon.style.opacity = '1';
            switchCircle.style.transform = 'translateX(20px)';
        } else {
            document.body.classList.remove('dark-mode');
            darkModeIcon.style.opacity = '1';
            lightModeIcon.style.opacity = '0';
            switchCircle.style.transform = 'translateX(0)';
        }
    });
</script>

@include('sweetalert::alert')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $('.exit-confirm').click(function (event) {
        event.preventDefault();
        Swal.fire({
            title: 'می خواهید خارج شوید؟ ',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'بله !',
            cancelButtonText: 'منصرف شدم',
        }).then((result) => {
            if (result.isConfirmed) {
                $('#logout-form').submit();
            }
        });
    });
</script>

</body>
</body>
</html>






