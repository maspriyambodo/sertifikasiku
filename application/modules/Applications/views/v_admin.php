<div class="card card-custom">
    <div class="card-body">
        <div class="text-right">
            <div class="form-group">
                <button class="btn btn-default" title="refresh data" onclick="refresh_dt()"><i class="fas fa-sync-alt text-info"></i></button>
            </div>
        </div>
        <div class="table-responsive">
            <table id="table" class="table table-bordered table-hover table-striped" style="width:100%;">
                <thead class="text-center text-uppercase">
                    <tr>
                        <th>no</th>
                        <th>nama</th>
                        <th>email</th>
                        <th>telepon</th>
                        <th>pekerjaan</th>
                        <th>ip address</th>
                        <th>device</th>
                        <th>login<br>date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!$privilege['read']) { // jika memiliki privilege tambah atau create
                        $data = [];
                    }
                    foreach ($data as $user) {
                        $id_user = Enkrip($user->id);
                        ?>
                        <tr>
                            <td>
                                <?php
                                static $id = 1;
                                echo $id++;
                                ?>
                            </td>
                            <td><?php echo $user->fullname; ?></td>
                            <td><?php echo $user->uname; ?></td>
                            <td><?php echo $user->telp; ?></td>
                            <td><?php echo $user->pekerjaan; ?></td>
                            <td><?php echo $user->ip_address; ?></td>
                            <td><?php echo $user->user_agent; ?></td>
                            <td><?php echo $user->last_login; ?></td>
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
unset($_SESSION['err_msg']);
unset($_SESSION['succ_msg']);
?>
<script>
    $(document).ready(function () {
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
        $('table').dataTable({
            "ServerSide": false,
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
            retrieve: true,
            buttons: [
                {extend: 'print', footer: true},
                {extend: 'copyHtml5', footer: true},
                {extend: 'excelHtml5', footer: true},
                {extend: 'csvHtml5', footer: true},
                {extend: 'pdfHtml5', footer: true}
            ],
            columnDefs: [
                {
                    targets: 0,
                    className: 'text-center'
                }
            ]
        });
    });
    function refresh_dt() {
        $('#table').DataTable().clear().destroy();
        $('#table').dataTable({
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
            buttons: [
                {extend: 'print', footer: true},
                {extend: 'copyHtml5', footer: true},
                {extend: 'excelHtml5', footer: true},
                {extend: 'csvHtml5', footer: true},
                {extend: 'pdfHtml5', footer: true}
            ],
            "ajax": {
                "url": "<?php echo site_url('Applications/Dashboard/refresh_dt/') ?>",
                "type": "POST"
            },
            columnDefs: [
                {
                    targets: 0,
                    className: 'text-center'
                },
                {
                    targets: 1,
                    className: 'text-center',
                    orderable: false
                },
                {
                    targets: 2,
                    className: 'text-center',
                    orderable: false
                },
                {
                    targets: 3,
                    className: 'text-center'
                },
                {
                    targets: 4,
                    className: 'text-center',
                    orderable: false
                },
                {
                    targets: 5,
                    className: 'text-center',
                    orderable: false
                },
                {
                    targets: 6,
                    className: 'text-center',
                    orderable: false
                },
                {
                    targets: 7,
                    className: 'text-center',
                    orderable: false
                }
            ]
        });
    }
</script>