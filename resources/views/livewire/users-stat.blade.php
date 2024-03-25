<div class="row mt-1">
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
            <span class="info-box-icon bg-primary elevation-1"><i class="fa fa-users"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">کل کاربران</span>
                <span class="info-box-number">
                                {{ $countAllUsers }}
                            </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-info elevation-1"><i class="fa fa-rocket"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">کاربران آنلاین</span>
                <span class="info-box-number">
                    {{ $onlineUsers }}
                </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->

    <!-- fix for small devices only -->
    <div class="clearfix hidden-md-up"></div>

    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-success elevation-1"><i class="fa fa-thumbs-o-up"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">کاربران فعال</span>
                <span class="info-box-number">
                    {{ $activeUsers }}
                </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-thumbs-o-down"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">کاربران غیر فعال</span>
                <span class="info-box-number">
                    {{ $deactiveUsers }}
                </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
</div>
