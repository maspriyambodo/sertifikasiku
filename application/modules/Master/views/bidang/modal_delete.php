<div class="modal fade" id="modal_delete" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modal_deleteLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_deleteLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="close_delete()">
                    <i aria-hidden="true" class="fas fa-times"></i>
                </button>
            </div>
            <form id="form_delete" method="post">
                <input type="hidden" name="<?php echo $csrf['name'] ?>" value="<?php echo $csrf['hash'] ?>"/>
                <input type="hidden" name="del_id"/>
                <input type="hidden" name="del_nama"/>
                <div class="modal-body">
                    <p>data that has been deleted cannot be returned</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal" onclick="close_delete()"><i class="far fa-times-circle"></i> Cancel</button>
                    <button type="submit" class="btn btn-default font-weight-bold"><i class="far fa-trash-alt text-danger"></i> Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    function Removebtn(id) {
        var del_id, del_nama, modal_deleteLabel, form_del;
        del_id = $('input[name="del_id"]');
        del_nama = $('input[name="del_nama"]');
        modal_deleteLabel = document.getElementById('modal_deleteLabel');
        form_del = $('#form_delete');
        $.ajax({
            url: "<?php echo base_url('Master/Bidang/get_detail?token='); ?>" + id,
            type: 'GET',
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                if (data.stat === true) {
                    del_id.val(data.id);
                    del_nama.val(data.namatxt);
                    modal_deleteLabel.innerHTML = 'Disable: ' + data.namatxt;
                    form_del.attr('action', '<?php echo site_url('Master/Bidang/delete?token='); ?>' + data.id);
                    $('#modal_delete').modal({show: true, backdrop: 'static', keyboard: false});
                } else {
                    toastr.error('error while getting data!');
                }
            },
            error: function (jqXHR) {
                toastr.warning('error ' + jqXHR.status + ' ' + jqXHR.statusText);
            }
        });
    }
    function close_delete() {

    }
</script>