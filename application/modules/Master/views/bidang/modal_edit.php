<div class="modal fade" id="modal_edit" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modal_edit" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_editLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="close_edit()">
                    <i aria-hidden="true" class="fas fa-times"></i>
                </button>
            </div>
            <form id="form_edit" method="post">
                <input type="hidden" name="<?php echo $csrf['name'] ?>" value="<?php echo $csrf['hash'] ?>"/>
                <input type="hidden" name="e_id"/>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="e_namatxt">Name:</label>
                        <input id="e_namatxt" type="text" name="e_namatxt" class="form-control" required="" autocomplete="off"/>
                    </div>
                    <div class="form-group">
                        <label for="e_desctxt">Description:</label>
                        <textarea id="e_desctxt" name="e_desctxt" class="form-control" required=""></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal" onclick="close_edit()"><i class="far fa-times-circle"></i> Cancel</button>
                    <button type="submit" class="btn btn-default font-weight-bold"><i class="fas fa-save text-success"></i> Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    function Edit(id) {
        var e_id = $('input[name="e_id"]');
        var e_namatxt = $('input[name="e_namatxt"]');
        var e_desctxt = $('textarea[name="e_desctxt"]');
        var modal_editLabel = document.getElementById('modal_editLabel');
        var form_edit = $('#form_edit');
        if (id !== '') {
            e_id.val(id);
            $.ajax({
                url: "<?php echo base_url('Master/Bidang/get_detail?token='); ?>" + id,
                type: 'GET',
                cache: false,
                contentType: false,
                processData: false,
                success: function (data) {
                    if (data.stat === true) {
                        e_namatxt.val(data.namatxt);
                        e_desctxt.val(data.desctxt);
                        e_id.val(data.id);
                        modal_editLabel.innerHTML = 'Edit: ' + data.namatxt;
                        form_edit.attr('action', '<?php echo site_url('Master/Bidang/update?token='); ?>' + data.id);
                        $('#modal_edit').modal({show: true, backdrop: 'static', keyboard: false});
                    } else {
                        toastr.error('error while getting data!');
                    }
                },
                error: function (jqXHR) {
                    toastr.warning('error ' + jqXHR.status + ' ' + jqXHR.statusText);
                }
            });
        } else {
            null;
        }
    }
    function close_edit() {
        $('input[name="e_id"]').val('');
        $('input[name="e_namatxt"]').val('');
        $('textarea[name="e_desctxt"]').val('');
        document.getElementById('modal_editLabel').innerHTML = '';
        $('#form_edit').removeAttr('action');
    }
</script>