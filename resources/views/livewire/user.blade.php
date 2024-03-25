<div id="content-wrapper" class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0 text-dark text-visible">
                        کاربران
                    </h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            @livewire('users-stat')

           {{-- <div class="row mt-2">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fa fa-bar-chart-o"></i>
                                نمایش آنلاین تخصیص منابع
                            </h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-widget="collapse"><i
                                        class="fa fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">

                                <div class="col-md-4 col-sm-4 text-center mb-3">
                                    <input id="cpu-knob" type="text" class="knob" data-rotation=anticlockwise value="0"
                                           data-thickness="0.3" data-angleArc="250" data-angleOffset="-125"
                                           data-width="140"
                                           data-height="140" data-fgColor="#00a86b">
                                    <div id="cpu-value" class="knob-label">CPU</div>
                                </div>

                                <div class="col-md-4 col-sm-4 text-center mb-3">
                                    <input id="memory-knob" type="text" class="knob" data-rotation=anticlockwise
                                           value="0"
                                           data-thickness="0.3" data-angleArc="250" data-angleOffset="-125"
                                           data-width="140"
                                           data-height="140" data-fgColor="#00a86b">
                                    <div id="memory-value" class="knob-label">Memory</div>
                                </div>

                                <div class="col-md-4 col-sm-4 text-center mb-3">
                                    <input id="disk-knob" type="text" class="knob" data-rotation=anticlockwise value="0"
                                           data-thickness="0.3" data-angleArc="250" data-angleOffset="-125"
                                           data-width="140"
                                           data-height="140" data-fgColor="#00a86b">
                                    <div id="disk-value" class="knob-label">Disk</div>
                                </div>

                                <!-- ./col -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>--}}
            <!-- /.row -->
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
</div>
