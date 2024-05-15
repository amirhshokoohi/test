<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <span class="brand-link" style="padding: 18px .5rem">
        <img src="{{ asset('/images/ad-pro-visuals-cropped.svg') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light mr-2">پنل مدیریت راکت </span>
    </span>

    <!-- Sidebar -->
    <div class="sidebar" style="direction: ltr">
        <div style="direction: rtl">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{ asset('/images/start-illustration.svg') }}" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">برای پرواز آماده ای ؟</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav>
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->

                    <li class="nav-item">

                        <a href="{{ route('dashboard') }}" wire:navigate  class="nav-link {{ Request::is('admin/dashboard') ? 'active' : '' }}">

                            <i class="nav-icon fa fa-dashboard"></i>
                            <p>
                                پیشخوان
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">

                        <a href="{{ route('user') }}" wire:navigate  class="nav-link {{ Request::is('admin/users') ? 'active' : '' }}">

                            <i class="nav-icon fa fa-user"></i>
                            <p>
                                کاربران
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="pages/calendar.html" class="nav-link">
                            <i class="nav-icon fa fa-calendar"></i>
                            <p>
                                تقویم
                                <span class="badge badge-info right">2</span>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link exit-confirm" href="{{ route('logout') }}">
                            <i class="nav-icon fa fa-sign-out"></i>
                            <p class="text">خروج</p>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
    </div>
    <!-- /.sidebar -->
</aside>

