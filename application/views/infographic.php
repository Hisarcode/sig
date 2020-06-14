<div class="content-wrapper">
    <!--/. container-fluid -->

    <section class="content-header">

        <div class="container">

            <!-- BOX TOTAL SEKOLAh-->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3><?= $totalsekolah; ?></h3>

                    <p>Total Sekolah</p>
                </div>
                <div class="icon">
                    <i class="fas fa-chart-pie"></i>
                </div>
                <a class="small-box-footer">
                    <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>

            <!-- END BOX TOTAL SEKOLAH-->

            <!-- BOX SEKOLAH KATEGORI -->
            <div class="row">
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box bg-info">
                        <span class="info-box-icon"><i class="fas fa-chalkboard"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">SD</span>
                            <span class="info-box-number"><?= $totalsd; ?></span>



                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box bg-success">
                        <span class="info-box-icon"><i class="material-icons" style="font-size: 48px; ">sports_handball</i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">SMP</span>
                            <span class="info-box-number"><?= $totalsmp ?></span>



                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box bg-warning">
                        <span class="info-box-icon"><i class="material-icons" style="font-size: 48px; ">self_improvement</i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">SMA</span>
                            <span class="info-box-number"><?= $totalsma; ?></span>


                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box bg-danger">
                        <span class="info-box-icon"><i class="material-icons" style="font-size: 48px; ">psychology</i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">SMK</span>
                            <span class="info-box-number"><?= $totalsmk ?></span>


                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- END BOX SEKOLAH KATEGORI-->
            <br>

            <!-- BOX SEKOLAH KECAMATAN -->
            <div class="row">
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box bg-teal">
                        <span class="info-box-icon"><i class="fas fa-city"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Pontianak Kota</span>
                            <span class="info-box-number"><?= $totalpkota; ?></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box bg-indigo">
                        <span class="info-box-icon"><i class="material-icons" style="font-size: 48px; ">trending_down</i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Pontianak Tenggara</span>
                            <span class="info-box-number"><?= $totalptenggara ?></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box bg-purple">
                        <span class="info-box-icon"><i class="material-icons" style="font-size: 48px; ">arrow_downward</i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Pontianak Selatan</span>
                            <span class="info-box-number"><?= $totalpselatan; ?></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box bg-orange">
                        <span class="info-box-icon"><i class="material-icons" style="font-size: 48px; ">arrow_upward</i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Pontianak Utara</span>
                            <span class="info-box-number"><?= $totalputara ?></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box bg-blue">
                        <span class="info-box-icon"><i class="material-icons" style="font-size: 48px; ">arrow_forward</i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Pontianak Timur</span>
                            <span class="info-box-number"><?= $totalptimur; ?></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box bg-gray-dark">
                        <span class="info-box-icon"><i class="material-icons" style="font-size: 48px; ">arrow_back</i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Pontianak Barat</span>
                            <span class="info-box-number"><?= $totalpbarat ?></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- END BOX SEKOLAH KECAMATAN-->

            <!-- chart row -->
            <div class="row">
                <div class="col-md-6">
                    <!-- DONUT CHART -->
                    <div class="card card-danger">
                        <div class="card-header">
                            <h3 class="card-title">Berdasarkan Kategori(seluruh Kota Pontianak)</h3>


                        </div>
                        <div class="card-body">
                            <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <!-- /.card -->
                <div class="col-md-6">

                    <!-- DONUT CHART -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Berdasarkan Kecamatan(seluruh Kota Pontianak)</h3>

                        </div>
                        <div class="card-body">
                            <canvas id="donutChart2" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- END OF CHART ROW -->


            <!-- chart row -->
            <div class="row">
                <div class="col-md-6">
                    <!-- DONUT CHART -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Berdasarkan Kecamatan (Sekolah Dasar)</h3>


                        </div>
                        <div class="card-body">
                            <canvas id="donutChartSD" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <!-- /.card -->
                <div class="col-md-6">

                    <!-- DONUT CHART -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Berdasarkan Kecamatan(Sekolah Menengah Pertama)</h3>

                        </div>
                        <div class="card-body">
                            <canvas id="donutChartSMP" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- END OF CHART ROW -->

            <!-- chart row -->
            <div class="row">
                <div class="col-md-6">
                    <!-- DONUT CHART -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Berdasarkan Kecamatan(Sekolah Menegah Atas)</h3>


                        </div>
                        <div class="card-body">
                            <canvas id="donutChartSMA" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <!-- /.card -->
                <div class="col-md-6">

                    <!-- DONUT CHART -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Berdasarkan Kecamatan(Sekolah Menengah Kejuruan)</h3>

                        </div>
                        <div class="card-body">
                            <canvas id="donutChartSMK" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- END OF CHART ROW -->

            <!-- chart row -->
            <div class="row">
                <div class="col-md-6">
                    <!-- DONUT CHART -->
                    <div class="card card-danger">
                        <div class="card-header">
                            <h3 class="card-title">Berdasarkan Kategori(Pontianak Kota)</h3>


                        </div>
                        <div class="card-body">
                            <canvas id="donutChart3" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <!-- /.card -->
                <div class="col-md-6">

                    <!-- DONUT CHART -->
                    <div class="card card-danger">
                        <div class="card-header">
                            <h3 class="card-title">Berdasarkan Kategori(Pontianak Tenggara)</h3>

                        </div>
                        <div class="card-body">
                            <canvas id="donutChart4" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- END OF CHART ROW -->

            <!-- chart row -->
            <div class="row">
                <div class="col-md-6">
                    <!-- DONUT CHART -->
                    <div class="card card-danger">
                        <div class="card-header">
                            <h3 class="card-title">Berdasarkan Kategori(Pontianak Timur)</h3>


                        </div>
                        <div class="card-body">
                            <canvas id="donutChart5" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <!-- /.card -->
                <div class="col-md-6">

                    <!-- DONUT CHART -->
                    <div class="card card-danger">
                        <div class="card-header">
                            <h3 class="card-title">Berdasarkan Kategori(Pontianak Barat)</h3>

                        </div>
                        <div class="card-body">
                            <canvas id="donutChart6" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- END OF CHART ROW -->

            <!-- chart row -->
            <div class="row">
                <div class="col-md-6">
                    <!-- DONUT CHART -->
                    <div class="card card-danger">
                        <div class="card-header">
                            <h3 class="card-title">Berdasarkan Kategori(Pontianak Utara)</h3>


                        </div>
                        <div class="card-body">
                            <canvas id="donutChart7" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <!-- /.card -->
                <div class="col-md-6">

                    <!-- DONUT CHART -->
                    <div class="card card-danger">
                        <div class="card-header">
                            <h3 class="card-title">Berdasarkan Kategori(Pontianak Selatan)</h3>

                        </div>
                        <div class="card-body">
                            <canvas id="donutChart8" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- END OF CHART ROW -->
        </div>
    </section>
</div>

</div>
<!-- ./wrapper -->
<!-- REQUIRED SCRIPTS -->
<!-- jQuery Wajib -->
<script src="<?= base_url('assets/') ?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap  Wajib -->
<script src="<?= base_url('assets/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars Tidak Wajib -->
<script src="<?= base_url('assets/') ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App  Wajib -->
<script src="<?= base_url('assets/') ?>dist/js/adminlte.js"></script>

<script src="<?= base_url('assets/') ?>plugins/chart.js/Chart.min.js"></script>

<script>
    $(function() {
        //-------------
        //- DONUT CHART -
        //-------------
        // Get context with jQuery - using jQuery's .get() method.
        var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
        var donutChartCanvasSD = $('#donutChartSD').get(0).getContext('2d')
        var donutChartCanvasSMP = $('#donutChartSMP').get(0).getContext('2d')
        var donutChartCanvasSMA = $('#donutChartSMA').get(0).getContext('2d')
        var donutChartCanvasSMK = $('#donutChartSMK').get(0).getContext('2d')
        var donutChartCanvas2 = $('#donutChart2').get(0).getContext('2d')
        var donutChartCanvas3 = $('#donutChart3').get(0).getContext('2d')
        var donutChartCanvas4 = $('#donutChart4').get(0).getContext('2d')
        var donutChartCanvas5 = $('#donutChart5').get(0).getContext('2d')
        var donutChartCanvas6 = $('#donutChart6').get(0).getContext('2d')
        var donutChartCanvas7 = $('#donutChart7').get(0).getContext('2d')
        var donutChartCanvas8 = $('#donutChart8').get(0).getContext('2d')

        var donutData = {
            labels: [
                'SD',
                'SMP',
                'SMA',
                'SMK'
            ],
            datasets: [{
                data: [<?= $totalsd; ?>, <?= $totalsmp; ?>, <?= $totalsma; ?>, <?= $totalsmk; ?>],
                backgroundColor: ['#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
            }]
        }

        var donutDataSD = {
            labels: [
                'Pontianak Selatan',
                'Pontianak Utara',
                'Pontianak Kota',
                'Pontianak Timur',
                'Pontianak Barat',
                'Pontianak Tenggara',
            ],
            datasets: [{
                data: [<?= $totalselatansd; ?>, <?= $totalputarasd; ?>, <?= $totalpkotasd; ?>, <?= $totalptimursd; ?>, <?= $totalpbaratsd; ?>, <?= $totalptenggarasd; ?>],
                backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
            }]
        }

        var donutDataSMP = {
            labels: [
                'Pontianak Selatan',
                'Pontianak Utara',
                'Pontianak Kota',
                'Pontianak Timur',
                'Pontianak Barat',
                'Pontianak Tenggara',
            ],
            datasets: [{
                data: [<?= $totalselatansmp; ?>, <?= $totalputarasmp; ?>, <?= $totalpkotasmp; ?>, <?= $totalptimursmp; ?>, <?= $totalpbaratsmp; ?>, <?= $totalptenggarasmp; ?>],
                backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
            }]
        }

        var donutDataSMA = {
            labels: [
                'Pontianak Selatan',
                'Pontianak Utara',
                'Pontianak Kota',
                'Pontianak Timur',
                'Pontianak Barat',
                'Pontianak Tenggara',
            ],
            datasets: [{
                data: [<?= $totalselatansma; ?>, <?= $totalputarasma; ?>, <?= $totalpkotasma; ?>, <?= $totalptimursma; ?>, <?= $totalpbaratsma; ?>, <?= $totalptenggarasma; ?>],
                backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
            }]
        }

        var donutDataSMK = {
            labels: [
                'Pontianak Selatan',
                'Pontianak Utara',
                'Pontianak Kota',
                'Pontianak Timur',
                'Pontianak Barat',
                'Pontianak Tenggara',
            ],
            datasets: [{
                data: [<?= $totalselatansmk; ?>, <?= $totalputarasmk; ?>, <?= $totalpkotasmk; ?>, <?= $totalptimursmk; ?>, <?= $totalpbaratsmk; ?>, <?= $totalptenggarasmk; ?>],
                backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
            }]
        }

        var donutData2 = {
            labels: [
                'Pontianak Selatan',
                'Pontianak Utara',
                'Pontianak Kota',
                'Pontianak Timur',
                'Pontianak Barat',
                'Pontianak Tenggara',
            ],
            datasets: [{
                data: [<?= $totalpselatan; ?>, <?= $totalputara; ?>, <?= $totalpkota; ?>, <?= $totalptimur; ?>, <?= $totalpbarat; ?>, <?= $totalptenggara; ?>],
                backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
            }]
        }

        var donutData3 = {
            labels: [
                'SD',
                'SMP',
                'SMA',
                'SMK'
            ],
            datasets: [{
                data: [<?= $totalpkotasd; ?>, <?= $totalpkotasmp; ?>, <?= $totalpkotasma; ?>, <?= $totalpkotasmk; ?>],
                backgroundColor: ['#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
            }]
        }

        var donutData4 = {
            labels: [
                'SD',
                'SMP',
                'SMA',
                'SMK'
            ],
            datasets: [{
                data: [<?= $totalptenggarasd; ?>, <?= $totalptenggarasd; ?>, <?= $totalptenggarasma; ?>, <?= $totalptenggarasmk; ?>],
                backgroundColor: ['#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
            }]
        }

        var donutData5 = {
            labels: [
                'SD',
                'SMP',
                'SMA',
                'SMK'
            ],
            datasets: [{
                data: [<?= $totalptimursd; ?>, <?= $totalptimursmp; ?>, <?= $totalptimursma; ?>, <?= $totalptimursmk; ?>],
                backgroundColor: ['#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
            }]
        }

        var donutData6 = {
            labels: [
                'SD',
                'SMP',
                'SMA',
                'SMK'
            ],
            datasets: [{
                data: [<?= $totalpbaratsd; ?>, <?= $totalpbaratsmp; ?>, <?= $totalpbaratsma; ?>, <?= $totalpbaratsmk; ?>],
                backgroundColor: ['#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
            }]
        }

        var donutData7 = {
            labels: [
                'SD',
                'SMP',
                'SMA',
                'SMK'
            ],
            datasets: [{
                data: [<?= $totalputarasd; ?>, <?= $totalputarasmp; ?>, <?= $totalputarasma; ?>, <?= $totalputarasmk; ?>],
                backgroundColor: ['#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
            }]
        }

        var donutData8 = {
            labels: [
                'SD',
                'SMP',
                'SMA',
                'SMK'
            ],
            datasets: [{
                data: [<?= $totalselatansd; ?>, <?= $totalselatansmp; ?>, <?= $totalselatansma; ?>, <?= $totalselatansmk; ?>],
                backgroundColor: ['#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
            }]
        }

        var donutOptions = {
            maintainAspectRatio: false,
            responsive: true,
        }
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        var donutChart = new Chart(donutChartCanvas, {
            type: 'doughnut',
            data: donutData,
            options: donutOptions
        })

        var donutChartSD = new Chart(donutChartCanvasSD, {
            type: 'doughnut',
            data: donutDataSD,
            options: donutOptions
        })

        var donutChartSMP = new Chart(donutChartCanvasSMP, {
            type: 'doughnut',
            data: donutDataSMP,
            options: donutOptions
        })

        var donutChartSMA = new Chart(donutChartCanvasSMA, {
            type: 'doughnut',
            data: donutDataSMA,
            options: donutOptions
        })

        var donutChartSMK = new Chart(donutChartCanvasSMK, {
            type: 'doughnut',
            data: donutDataSMK,
            options: donutOptions
        })

        var donutChart2 = new Chart(donutChartCanvas2, {
            type: 'doughnut',
            data: donutData2,
            options: donutOptions
        })

        var donutChart3 = new Chart(donutChartCanvas3, {
            type: 'doughnut',
            data: donutData3,
            options: donutOptions
        })

        var donutChart4 = new Chart(donutChartCanvas4, {
            type: 'doughnut',
            data: donutData4,
            options: donutOptions
        })

        var donutChart5 = new Chart(donutChartCanvas5, {
            type: 'doughnut',
            data: donutData5,
            options: donutOptions
        })

        var donutChart = new Chart(donutChartCanvas6, {
            type: 'doughnut',
            data: donutData6,
            options: donutOptions
        })

        var donutChart = new Chart(donutChartCanvas7, {
            type: 'doughnut',
            data: donutData7,
            options: donutOptions
        })

        var donutChart = new Chart(donutChartCanvas8, {
            type: 'doughnut',
            data: donutData8,
            options: donutOptions
        })
    })
</script>

</body>

</html>