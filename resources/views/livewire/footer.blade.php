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
<script src="{{ asset('/js/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('/js/bootstrap.bundle.min.js') }}"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
{{--<script src="{{ asset('/js/morris.min.js') }}"></script>--}}
<!-- Sparkline -->
<script src="{{ asset('/js/jquery.sparkline.min.js') }}"></script>
<!-- jvectormap -->
<script src="{{ asset('/js/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('/js/jquery-jvectormap-world-mill-en.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('/js/jquery.knob.js') }}"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="{{ asset('/js/daterangepicker.js') }}"></script>
<!-- datepicker -->
<script src="{{ asset('/js/bootstrap-datepicker.js') }}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset('/js/bootstrap3-wysihtml5.all.min.js') }}"></script>
<!-- Slimscroll -->
<script src="{{ asset('/js/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('/js/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('/js/adminlte.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{{--<script src="{{ asset('/js/dashboard.js') }}"></script>--}}
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('/js/demo.js') }}"></script>
@livewireScripts
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
    document.addEventListener("DOMContentLoaded", function() {
        const darkModeSwitch = document.getElementById('darkModeSwitch');
        const darkModeIcon = document.getElementById('darkModeIcon');
        const lightModeIcon = document.getElementById('lightModeIcon');
        const switchCircle = document.querySelector('.switch-circle');

        darkModeSwitch.addEventListener('change', function() {
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
</html>



