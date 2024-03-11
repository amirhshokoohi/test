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
<body class="hold-transition sidebar-mini">
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

            <div class="switch">
                <input class="mt-2" type="checkbox" id="darkModeSwitch">
                <label for="darkModeSwitch">
                    <i id="lightModeIcon" class="sun-icon">☀️</i>
                    <div class="switch-circle"></div>
                    <i id="darkModeIcon" class="moon-icon">🌙</i>
                </label>
            </div>

        </ul>
    </nav>
