<div class="modal fade" id="modal_active" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modal_activeLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_activeLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="close_active()">
                    <i aria-hidden="true" class="fas fa-times"></i>
                </button>
            </div>
            <form id="form_active" method="post">
                <input type="hidden" name="<?php echo $csrf['name'] ?>" value="<?php echo $csrf['hash'] ?>"/>
                <input type="hidden" name="act_id"/>
                <input type="hidden" name="act_name"/>
                <div class="modal-body">
                    <p>Activate data, making the data accessible again</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal" onclick="close_active()"><i class="far fa-times-circle"></i> Cancel</button>
                    <button type="submit" class="btn btn-default font-weight-bold"><i class="fas fa-power-off text-success"></i> Enable</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    function Activebtn(id) {
        var act_id, modal_activeLabel, form_active, act_name;
        act_id = $('input[name="act_id"]');
        act_name = $('input[name="act_name"]');
        modal_activeLabel = document.getElementById('modal_activeLabel');
        form_active = $('#form_active');
        $.ajax({
            url: "<?php echo base_url('Master/Bidang/get_detail?token='); ?>" + id,
            type: 'GET',
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                if (data.stat === true) {
                    act_id.val(data.id);
                    act_name.val(data.namatxt);
                    modal_activeLabel.innerHTML = 'Enable: ' + data.namatxt;
                    form_active.attr('action', '<?php echo site_url('Master/Bidang/activate?token='); ?>' + data.id);
                    $('#modal_active').modal({show: true, backdrop: 'static', keyboard: false});
                } else {
                    toastr.error('error while getting data!');
                }
            },
            error: function (jqXHR) {
                toastr.warning('error ' + jqXHR.status + ' ' + jqXHR.statusText);
            }
        });
    }
    function close_active() {
        $('input[name="act_id"]').val('');
        document.getElementById('modal_activeLabel').innerHTML = '';
        $('#form_active').removeAttr('action');
        $('input[name="act_name"]').val('');
    }
</script>