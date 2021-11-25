<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            <a class="btn btn-default" href="<?php echo base_url('Report/Absensi/index/'); ?>"><i class="fas fa-arrow-left"></i> Back</a>
        </div>
    </div>
    <div class="card-body">
        <div class="form-group">
            <label>Narasumber:</label>
            <?php echo $table_rating[0]->narasumber; ?>
        </div>
        <div class="form-group">
            <label>Judul Materi:</label>
            <?php echo $table_rating[0]->nama_materi; ?>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped" style="width:100%;">
                <thead class="text-center text-uppercase">
                    <tr>
                        <th>no</th>
                        <th>email</th>
                        <th>full name</th>
                        <th>rating</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!$privilege['read']) { // jika memiliki privilege tambah atau create
                        $data = [];
                    }
                    foreach ($table_rating as $table_rating) {
                        ?>
                        <tr>
                            <td class="text-center">
                                <?php
                                static $id = 1;
                                echo $id++;
                                ?>
                            </td>
                            <td><?php echo $table_rating->uname; ?></td>
                            <td><?php echo $table_rating->fullname; ?></td>
                            <td class="text-center"><?php echo $table_rating->rating_materi; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
unset($_SESSION['err_msg']);
unset($_SESSION['succ_msg']);
?>
<script>
    window.onload = function () {
        $('table').dataTable({
            "serverSide": false,
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
            lengthMenu: [
                [10, 50, 100, 500, -1],
                ['10', '50', '100', '500', 'all']
            ]
        });
    };
</script>