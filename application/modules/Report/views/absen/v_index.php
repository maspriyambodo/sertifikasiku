<script src="https://cdn.amcharts.com/lib/4/core.js"></script>
<script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
<script src="https://cdn.amcharts.com/lib/4/themes/frozen.js"></script>
<script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>
<?php
if (Dekrip($this->session->userdata('role_id')) == 1) {
    $statistik_materi = null;
} else {
    $statistik_materi = ' d-none';
}
?>
<div class="card card-custom<?php echo $statistik_materi; ?>" data-card="true">
    <div class="card-header">
        <div class="card-title">
            Rating Materi
        </div>
        <div class="card-toolbar">
            <a href="#" class="btn btn-icon btn-sm btn-hover-light-primary mr-1" data-card-tool="toggle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Toggle Card">
                <i class="ki ki-arrow-down icon-nm"></i>
            </a>
        </div>
    </div>
    <div class="card-body">
        <div id="chartdiv" class="chartdivs" style="width:100%;height:600px;"></div>
        <div class="clearfix my-5 border-bottom"></div>
        <div class="table-responsive">
            <table id="table_rating" class="table table-bordered table-hover table-striped" style="width:100%;">
                <thead class="text-uppercase text-center">
                    <tr>
                        <th>no</th>
                        <th>narasumber</th>
                        <th>materi</th>
                        <th>rating</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($table_rating as $table_rating) { ?>
                        <tr>
                            <td>
                                <?php
                                static $id = 1;
                                echo $id++;
                                ?>
                            </td>
                            <td>
                                <?php echo '<a href="' . base_url('Report/Absensi/detail_rating?token=' . Enkrip($table_rating->id)) . '">' . $table_rating->narasumber . '</a>'; ?>
                            </td>
                            <td>
                                <?php echo $table_rating->nama_materi; ?>
                            </td>
                            <td class="text-center">
                                <?php
                                if (empty($table_rating->rating)) {
                                    echo 0;
                                } else {
                                    echo $table_rating->rating;
                                }
                                ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="clearfix my-4"></div>
<div class="card card-custom<?php echo $statistik_materi; ?>" data-card="true">
    <div class="card-header">
        <div class="card-title">
            User Login
        </div>
        <div class="card-toolbar">
            <a href="#" class="btn btn-icon btn-sm btn-hover-light-primary mr-1" data-card-tool="toggle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Toggle Card">
                <i class="ki ki-arrow-down icon-nm"></i>
            </a>
        </div>
    </div>
    <div class="card-body">
        <div id="chartdiv2" class="chartdivs" style="width:100%;height:600px;"></div>
    </div>
</div>
<div class="clearfix my-4"></div>
<div class="card card-custom">
    <div class="card-body">
        <div class="table-responsive">
            <table id="table_absensi" class="table table-bordered table-hover table-striped" style="width:100%;">
                <thead class="text-center text-uppercase">
                    <tr>
                        <th rowspan="2">no</th>
                        <th colspan="5">user</th>
                        <th colspan="4">materi</th>
                        <th colspan="2">narasumber</th>
                        <th rowspan="2">waktu absensi</th>
                    </tr>
                    <tr>
                        <th>email</th>
                        <th>kategori</th>
                        <th>nama</th>
                        <th>telp</th>
                        <th>pekerjaan</th>
                        <th>jadwal</th>
                        <th>sesi</th>
                        <th>judul</th>
                        <th>rating</th>
                        <th>nama</th>
                        <th>title</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
</div>
<input type="hidden" name="err_msg" value="<?php echo $this->session->flashdata('err_msg'); ?>"/>
<input type="hidden" name="succ_msg" valuemaile="<?php echo $this->session->flashdata('succ_msg'); ?>"/>
<?php
unset($_SESSION['err_msg']);
unset($_SESSION['succ_msg']);
?>
<script>
    window.onload = function () {
        toastr.options = {
            closeButton: true,
            debug: false,
            newestOnTop: false,
            progressBar: false,
            positionClass: "toast-top-right",
            preventDuplicates: true,
            onclick: null,
            showDuration: "300",
            hideDuration: "2000",
            timeOut: false,
            extendedTimeOut: "2000",
            showEasing: "swing",
            hideEasing: "linear",
            showMethod: "fadeIn",
            hideMethod: "fadeOut"
        };
        var a, b;
        a = $('input[name="err_msg"]').val();
        b = $('input[name="succ_msg"]').val();
        if (a) {
            toastr.error(a);
        } else if (b) {
            toastr.success(b);
        }
        chart1();
        chart2();
        var groupColumn = 6;
        $('#table_absensi').dataTable({
            "serverSide": true,
            "order": [[0, "asc"]],
            "paging": true,
            "ordering": true,
            "info": true,
            "processing": true,
            "deferRender": true,
            "scrollCollapse": true,
            "scrollX": true,
            "scrollY": "400px",
            dom: `<'row'<'col-sm-6 text-left'f><'col-sm-6 text-right'B>>
                <'row'<'col-sm-12'tr>>
                <'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>`,
            lengthMenu: [
                [10, 50, 100, 500, -1],
                ['10', '50', '100', '500', 'all']
            ],
            buttons: [
                {extend: 'print', footer: true},
                {extend: 'copyHtml5', footer: true},
                {extend: 'excelHtml5', footer: true},
                {extend: 'csvHtml5', footer: true},
                {extend: 'pdfHtml5', footer: true},
                {extend: 'colvis'}
            ],
            "ajax": {
                "url": "<?php echo site_url('Report/Absensi/lists') ?>",
                "type": "POST"
            },
            columnDefs: [
                {
                    targets: 0,
                    className: 'text-center'
                },
                {
                    targets: 9,
                    className: 'text-center'
                }
            ],
            "drawCallback": function (settings) {
                var api = this.api();
                var rows = api.rows({page: 'current'}).nodes();
                var last = null;
                api.column(groupColumn, {page: 'current'}).data().each(function (group, i) {
                    if (last !== group) {
                        $(rows).eq(i).before(
                                '<tr class="group text-center"><td colspan="14">' + group + '</td></tr>'
                                );
                        last = group;
                    }
                });
            }
        });
        $('#table_rating').dataTable({
            "serverSide": false,
            "order": [[0, "asc"]],
            "paging": false,
            "ordering": true,
            "info": true,
            "processing": true,
            "deferRender": true,
            "scrollCollapse": true,
            "scrollX": true,
            "scrollY": "400px",
            dom: `<'row'<'col-sm-6 text-left'f><'col-sm-6 text-right'B>>
                <'row'<'col-sm-12'tr>>
                <'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>`,
            buttons: [
                {extend: 'print', footer: true},
                {extend: 'copyHtml5', footer: true},
                {extend: 'excelHtml5', footer: true},
                {extend: 'csvHtml5', footer: true},
                {extend: 'pdfHtml5', footer: true}
            ],
            lengthMenu: [
                [10, 50, 100, 500, -1],
                ['10', '50', '100', '500', 'all']
            ],
            columnDefs: [
                {
                    targets: 0,
                    className: 'text-center'
                }
            ]
        });
    };
    function chart1() {
        am4core.ready(function () {
            am4core.addLicense("ch-custom-attribution");
            am4core.useTheme(am4themes_animated);
            var chart = am4core.create("chartdiv", am4charts.XYChart);
            chart.scrollbarX = new am4core.Scrollbar();
            chart.dataSource.url = "Report/Absensi/Statistik_";
            chart.exporting.menu = new am4core.ExportMenu();
            var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
            categoryAxis.title.fontWeight = 800;
            categoryAxis.title.text = 'Narasumber';
            categoryAxis.dataFields.category = "narasumber";
            categoryAxis.renderer.grid.template.location = 0;
            categoryAxis.renderer.minGridDistance = 25;
            categoryAxis.renderer.labels.template.horizontalCenter = "left";
            categoryAxis.renderer.labels.template.verticalCenter = "middle";
            categoryAxis.renderer.labels.template.rotation = 120;
            categoryAxis.tooltip.disabled = true;
            categoryAxis.renderer.minHeight = 110;
            let label = categoryAxis.renderer.labels.template;
            label.wrap = true;
            label.maxWidth = 120;
            var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
            valueAxis.renderer.minWidth = 50;
            valueAxis.title.text = "Jumlah Rating";
            valueAxis.title.fontWeight = 800;
            var series = chart.series.push(new am4charts.ColumnSeries());
            series.sequencedInterpolation = true;
            series.dataFields.valueY = "rating";
            series.dataFields.categoryX = "narasumber";
            series.tooltipText = "Jumlah Rating: [bold]{nama_materi}[/] = [bold]{valueY} point[/]";
            series.columns.template.strokeWidth = 0;
            series.tooltip.pointerOrientation = "vertical";
            series.columns.template.column.cornerRadiusTopLeft = 10;
            series.columns.template.column.cornerRadiusTopRight = 10;
            series.columns.template.column.fillOpacity = 0.8;
            var hoverState = series.columns.template.column.states.create("hover");
            hoverState.properties.cornerRadiusTopLeft = 0;
            hoverState.properties.cornerRadiusTopRight = 0;
            hoverState.properties.fillOpacity = 1;
            series.columns.template.adapter.add("fill", function (fill, target) {
                return chart.colors.getIndex(target.dataItem.index);
            });
            chart.cursor = new am4charts.XYCursor();
        });
    }
    function chart2() {
        am4core.ready(function () {
            am4core.addLicense("ch-custom-attribution");
            am4core.useTheme(am4themes_animated);
            var chart = am4core.create("chartdiv2", am4charts.XYChart);
            chart.scrollbarX = new am4core.Scrollbar();
            chart.dataSource.url = "Report/Absensi/user_login";
            chart.exporting.menu = new am4core.ExportMenu();
            var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
            categoryAxis.title.fontWeight = 800;
            categoryAxis.title.text = 'Narasumber';
            categoryAxis.dataFields.category = "narasumber";
            categoryAxis.renderer.grid.template.location = 0;
            categoryAxis.renderer.minGridDistance = 25;
            categoryAxis.renderer.labels.template.horizontalCenter = "left";
            categoryAxis.renderer.labels.template.verticalCenter = "middle";
            categoryAxis.renderer.labels.template.rotation = 120;
            categoryAxis.tooltip.disabled = true;
            categoryAxis.renderer.minHeight = 110;
            let label = categoryAxis.renderer.labels.template;
            label.wrap = true;
            label.maxWidth = 120;
            var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
            valueAxis.renderer.minWidth = 50;
            valueAxis.title.text = "Jumlah User Absen";
            valueAxis.title.fontWeight = 800;
            var series = chart.series.push(new am4charts.ColumnSeries());
            series.sequencedInterpolation = true;
            series.dataFields.valueY = "user_hadir";
            series.dataFields.categoryX = "narasumber";
            series.tooltipText = "Jumlah User: [bold]{nama_materi}[/] = [bold]{valueY} peserta[/]";
            series.columns.template.strokeWidth = 0;
            series.tooltip.pointerOrientation = "vertical";
            series.columns.template.column.cornerRadiusTopLeft = 10;
            series.columns.template.column.cornerRadiusTopRight = 10;
            series.columns.template.column.fillOpacity = 0.8;
            var hoverState = series.columns.template.column.states.create("hover");
            hoverState.properties.cornerRadiusTopLeft = 0;
            hoverState.properties.cornerRadiusTopRight = 0;
            hoverState.properties.fillOpacity = 1;
            series.columns.template.adapter.add("fill", function (fill, target) {
                return chart.colors.getIndex(target.dataItem.index);
            });
            chart.cursor = new am4charts.XYCursor();
        });
    }
</script>