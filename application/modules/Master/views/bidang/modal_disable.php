<div class="modal fade" id="modal_disable" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modal_disable" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_disableLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="close_disable()">
                    <i aria-hidden="true" class="fas fa-times"></i>
                </button>
            </div>
            <form id="form_disable" method="post">
                <input type="hidden" name="<?php echo $csrf['name'] ?>" value="<?php echo $csrf['hash'] ?>"/>
                <input type="hidden" name="dis_id"/>
                <input type="hidden" name="dis_nama"/>
                <div class="modal-body">
                    disabling the status may cause the data not to appear!
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal" onclick="close_disable()"><i class="far fa-times-circle"></i> Cancel</button>
                    <button type="submit" class="btn btn-default font-weight-bold"><i class="fas fa-power-off text-danger"></i> Disable</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    function Disablebtn(id) {
        var modal_disableLabel, dis_id, form_disable, dis_nama;
        form_disable = $('#form_disable');
        modal_disableLabel = document.getElementById('modal_disableLabel');
        dis_id = $('input[name="dis_id"]');
        dis_nama = $('input[name="dis_nama"]');
        $.ajax({
            url: "<?php echo base_url('Master/Bidang/get_detail?token='); ?>" + id,
            type: 'GET',
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                if (data.stat === true) {
                    dis_id.val(data.id);
                    dis_nama.val(data.namatxt);
                    modal_disableLabel.innerHTML = 'Disable: ' + data.namatxt;
                    form_disable.attr('action', '<?php echo site_url('Master/Bidang/disable?token='); ?>' + data.id);
                    $('#modal_disable').modal({show: true, backdrop: 'static', keyboard: false});
                } else {
                    toastr.error('error while getting data!');
                }
            },
            error: function (jqXHR) {
                toastr.warning('error ' + jqXHR.status + ' ' + jqXHR.statusText);
            }
        });
    }
    function close_disable() {
        $('#form_disable').removeAttr('action');
        document.getElementById('modal_disableLabel').innerHTML = '';
        $('input[name="dis_id"]').val('');
        $('input[name="dis_nama"]').val('');
    }
</script>