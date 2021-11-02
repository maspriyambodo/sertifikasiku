<div class="modal fade" id="modal_detail" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modal_detail" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="Close_detail()">
                    <i aria-hidden="true" class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="nama">Nama:</label>
                            <input type="url" id="nama" name="nama" class="form-control" disabled=""/>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label for="deskripsi">Note:</label>
                        <textarea id="deskripsi" name="deskripsi" class="form-control"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal" onclick="Close_detail()"><i class="far fa-times-circle"></i> Cancel</button>
            </div>
        </div>
    </div>
</div>
<script>
    function Detail_pwd(id) {
        $.ajax({
            url: "<?php echo base_url('Master/Klasifikasi/Edit?id='); ?>" + id,
            type: 'GET',
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                if (data) {
                    $('input[name="nama"]').val(data.nama);
                    $('textarea[name="deskripsi"]').val(data.deskripsi);
                    $('#modal_detail').modal({show: true, backdrop: 'static', keyboard: false});
                } else {
                    toastr.warning('Error while getting data!');
                }
            }, error: function () {
                toastr.danger('Error while getting data!');
            }
        });
    }
    function Close_detail() {
        $('input[name="nama"]').val("");
        $('textarea[name="deskripsi"]').val("");
    }
</script>