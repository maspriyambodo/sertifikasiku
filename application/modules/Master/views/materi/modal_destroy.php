<div class="modal fade" id="modal_destroy" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modal_destroy" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Materi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="fas fa-times"></i>
                </button>
            </div>
            <form action="<?php echo site_url('Master/Materi/Delete2/'); ?>" method="post">
                <div class="modal-body">
                    <input type="hidden" name="<?php echo $csrf['name'] ?>" value="<?php echo $csrf['hash'] ?>"/>
                    <input type="hidden" name="des_id"/>
                    <p>data that has been deleted cannot be returned</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal"><i class="far fa-times-circle"></i> Cancel</button>
                    <button type="submit" class="btn btn-default font-weight-bold"><i class="far fa-trash-alt text-danger"></i> Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    function Destroybtn(val) {
        $('input[name="des_id"]').val(val);
        $('#modal_destroy').modal({show: true, backdrop: 'static', keyboard: false});
    }
</script>