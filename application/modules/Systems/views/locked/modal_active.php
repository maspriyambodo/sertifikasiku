<div class="modal fade" id="modal_active" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modal_active" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_active Label">Unblock Account</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="Close_active()">
                    <i aria-hidden="true" class="fas fa-times"></i>
                </button>
            </div>
            <form action="<?php echo site_url('Systems/Locked/Unlock/'); ?>" method="post">
                <input type="hidden" name="<?php echo $csrf['name'] ?>" value="<?php echo $csrf['hash'] ?>"/>
                <div class="modal-body">
                    <input type="hidden" name="id_user"/>
                    <p>
                        unblock makes account accessible again
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal" onclick="Close_active()"><i class="far fa-times-circle"></i> Cancel</button>
                    <button type="submit" class="btn btn-success font-weight-bold"><i class="fas fa-lock-open"></i> Unblock</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    function Close_active() {
        $('input[name="id_user"]').val('');
    }
</script>