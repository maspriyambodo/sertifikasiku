<div class="card card-custom">
    <div class="card-body">
        <?php
        if ($privilege['create']) { // jika memiliki privilege tambah data / create
            echo '<div class="text-right">'
            . '<div class="form-group">'
            . '<button type="button" class="btn btn-primary mr-2" data-toggle="modal" data-target="#modal_add"><i class="far fa-plus-square"></i> Add new</button>'
            . '</div>'
            . '</div>';
            require_once 'modal_add.php'; // jika bisa menambah data dengan modal, jika tidak maka button dibuat menjadi  href
        } else {
            null;
        }
        ?>
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped" style="width:100%;">
                <thead class="text-center text-uppercase">
                    <tr>
                        <th rowspan="2">no</th>
                        <th rowspan="2">sesi</th>
                        <th rowspan="2">nama materi</th>
                        <th rowspan="2">deskripsi</th>
                        <th colspan="2">narasumber</th>
                        <th rowspan="2">segment</th>
                        <th rowspan="2">klasifikasi</th>
                        <th colspan="2">waktu mulai</th>
                        <th colspan="2">waktu selesai</th>
                        <th rowspan="2">link video</th>
                        <th rowspan="2">status</th>
                        <th rowspan="2">action</th>
                    </tr>
                    <tr>
                        <th>nama</th>
                        <th>title</th>
                        <th>Tanggal</th>
                        <th>Jam</th>
                        <th>Tanggal</th>
                        <th>Jam</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!$privilege['read']) { // jika memiliki privilege tambah atau create
                        $data = [];
                    }
                    foreach ($data as $key => $materi) {
                        $id_materi = Enkrip($materi->id);
                        ?>
                        <tr>
                            <td class="text-center">
                                <?php
                                static $id = 1;
                                echo $id++;
                                ?>
                            </td>
                            <td class="text-center"><?php echo $materi->nama_sesi; ?></td>
                            <td><?php echo $materi->nama_materi; ?></td>
                            <td><?php echo substr($materi->deskripsi, 0, 50); ?>...</td>
                            <td><?php echo $materi->narasumber; ?></td>
                            <td><?php echo $materi->title_narsum; ?></td>
                            <td><?php echo $materi->nama_industri; ?></td>
                            <td><?php echo $materi->nama_level; ?></td>
                            <td class="text-center"><?php echo date('d F Y', strtotime($materi->tgl_mulai)); ?></td>
                            <td class="text-center"><?php echo $materi->jam_mulai; ?></td>
                            <td class="text-center"><?php echo date('d F Y', strtotime($materi->tgl_selesai)); ?></td>
                            <td class="text-center"><?php echo $materi->jam_selesai; ?></td>
                            <td class="text-center"><?php echo $materi->link_video; ?></td>
                            <td class="text-center">
                                <?php
                                if ($materi->stat == 1) {
                                    echo '<span class="label label-xl label-dot label-success" title="enable"></span>';
                                } else {
                                    echo '<span class="label label-xl label-dot label-danger" title="disable"></span>';
                                }
                                ?>
                            </td>

                            <td class="text-center">
                                <?php
                                $editbtn = '<a href="' . base_url('Master/Materi/Edit/' . $id_materi) . '" id="editbtn" type="button" class="btn btn-icon btn-default btn-xs" title="Edit materi" value="' . $id_materi . '" ><i class="far fa-edit fa-sm text-warning"></i></a>';
                                $delbtn = '<button id="delbtn" type="button" class="btn btn-icon btn-default btn-xs" title="Disable materi" value="' . $id_materi . '" onclick="Delete(this.value)"><i class="fas fa-lock fa-sm text-danger"></i></button>';
                                $activebtn = '<button id="actvbtn" type="button" class="btn btn-icon btn-default btn-xs" title="Enable materi" value="' . $id_materi . '" onclick="Active(this.value)"><i class="fas fa-unlock fa-sm text-success"></i></button>';
                                $destroybtn = '<button id="destroybtn" type="button" class="btn btn-icon btn-default btn-xs" title="Delete materi" value="' . $id_materi . '" onclick="Destroybtn(this.value)"><i class="far fa-trash-alt text-danger"></i></button>';
                                echo '<div class="btn-group">'; // open div btn-group
                                if ($privilege['update']) { // jika memiliki privilege edit
                                    echo $editbtn;
                                } else {
                                    null;
                                }
                                if (!$materi->stat and $privilege['delete']) { // jika memiliki privilege delete
                                    echo $activebtn;
                                    echo $destroybtn;
                                } elseif ($materi->stat and $privilege['delete']) {
                                    echo $delbtn;
                                    echo $destroybtn;
                                } else {
                                    null;
                                }
                                echo '</div>'; //close div btn-group
                                ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<input type="hidden" name="err_msg" value="<?php echo $this->session->flashdata('err_msg'); ?>"/>
<input type="hidden" name="succ_msg" value="<?php echo $this->session->flashdata('succ_msg'); ?>"/>
<?php
if ($privilege['delete']) {
    require_once 'modal_delete.php';
    require_once 'modal_destroy.php';
    require_once 'modal_activate.php';
} else {
    null;
}
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
        var groupColumn = 8;
        $('table').dataTable({
            "ServerSide": true,
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
            buttons: [
                {extend: 'print', footer: true},
                {extend: 'copyHtml5', footer: true},
                {extend: 'excelHtml5', footer: true},
                {extend: 'csvHtml5', footer: true},
                {extend: 'pdfHtml5', footer: true}
            ],
            columnDefs: [
                {
                    targets: 3,
                    orderable: false
                },
                {
                    targets: 12,
                    orderable: false
                },
                {
                    targets: 14,
                    orderable: false
                }
            ],
            fixedColumns: {
                left: 1,
                right: 1
            },
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
    };
    function isNumber(b) {
        b = (b) ? b : window.event;
        var a = (b.which) ? b.which : b.keyCode;
        if (a > 31 && (a < 48 || a > 57)) {
            return false;
        }
        return true;
    }
</script>