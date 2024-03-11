<div id="content-wrapper" class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0 text-dark text-visible">
                        پیشخوان
                    </h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            @livewire('users-stat')

            <div class="row mt-2">
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
            </div>
            <!-- /.row -->
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
</div>
@section('charts')

    <script>
        $(document).ready(function () {

            // ایجاد چارت با استفاده از jQuery Knob
            $('#cpu-knob').knob({
                readOnly: true,
                fgColor: '#00a86b',// پیش‌فرض
                inputColor: '#00a86b'
            });

            // تابع برای بروزرسانی مقدار چارت با استفاده از Ajax
            function updateChart() {
                $.get('/admin/get-cpudata', function (response) {
                    var value = response.cpuUsage;

                    // محاسبه مقدار رنگ بر اساس مقدار عددی
                    var color = '#00a86b'; // پیش‌فرض
                    if (value >= 40 && value < 80) {
                        color = '#ffda03';
                    } else if (value >= 80 && value <= 100) {
                        color = '#da012d';
                    }

                    // تغییر رنگ fgColor چارت
                    $('#cpu-knob').trigger(
                        'configure',
                        {
                            'fgColor': color,
                            'inputColor': color,
                            "skin": "tron",
                        }
                    );

                    // بروزرسانی مقدار چارت
                    $('#cpu-knob').val(value).trigger('change');
                    $('#cpu-value').text('CPU : ' + value + '% ')
                });
            }

            // بروزرسانی هر 3 ثانیه
            setInterval(updateChart, 1000);
        });

        $('#memory-knob').knob({
            readOnly: true,
            fgColor: '#00a86b',// پیش‌فرض
            inputColor: '#00a86b'
        });

        // تابع برای بروزرسانی مقدار چارت با استفاده از Ajax
        function updateMemoryChart() {
            $.get('/admin/get-ramdata', function (response) {
                var ramUsed = response.ramUsed;
                var ramCapacity = response.ramCapacity;
                var ramUsedPercent = response.ramUsedPercent;

                // محاسبه مقدار رنگ بر اساس مقدار عددی
                var color = '#00a86b'; // پیش‌فرض
                if (ramUsedPercent >= 40 && ramUsedPercent < 80) {
                    color = '#ffda03';
                } else if (ramUsedPercent >= 80 && ramUsedPercent <= 100) {
                    color = '#da012d';
                }

                // تغییر رنگ fgColor و inputColor چارت
                $('#memory-knob').trigger(
                    'configure',
                    {
                        'fgColor': color,
                        'inputColor': color,
                        "skin": "tron",
                        'fontWeight': '20px'
                    }
                );

                // بروزرسانی مقدار چارت
                $('#memory-knob').val(ramUsedPercent + ' % ').trigger('change');

                // اضافه کردن متن به کنار چارت
                $('#memory-value').text('Memory : ' + ramUsed + ' MB / ' + ramCapacity + ' MB ');
            });
        }

        // بروزرسانی هر 1 ثانیه
        setInterval(updateMemoryChart, 1000);


        $('#disk-knob').knob({
            readOnly: true,
            fgColor: '#00a86b',
            inputColor: '#00a86b'
        });

        function updateDiskChart() {
            $.get('/admin/get-diskdata', function (response) {
                var diskUsed = response.diskUsed;
                var diskCapacity = response.diskCapacity;
                var diskUsedPercent = response.diskUsedPercent;

                var color = '#00a86b'; // پیش‌فرض
                if (diskUsedPercent >= 40 && diskUsedPercent < 80) {
                    color = '#ffda03';
                } else if (diskUsedPercent >= 80 && diskUsedPercent <= 100) {
                    color = '#da012d';
                }

                $('#disk-knob').trigger('configure', {
                    'fgColor': color
                });

                $('#disk-knob').val(diskUsedPercent + ' GB').trigger('change');

                $('#disk-value').text('Hard Disk : ' + diskUsed + ' GB / ' + diskCapacity + ' GB ');
            });
        }

        setInterval(updateDiskChart, 1000); // به صورت لایو هر 3 ثانیه به روزرسانی شود

    </script>

@endsection
