<div class="modal fade" id="modal_import" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modal_import" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_importLabel">Import Data User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="fas fa-times"></i>
                </button>
            </div>
            <form action="<?php echo site_url('Systems/Users/Import/'); ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="<?php echo $csrf['name'] ?>" value="<?php echo $csrf['hash'] ?>"/>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="importxt">Upload File:</label>
                        <input id="importxt" class="form-control" accept=".xlsx, .xls" type="file" name="importxt" required="" autocomplete="off"/>
                    </div>
                    <div class="mt-4">
                        <div class="text-right">
                            <a href="<?php echo base_url('Systems/Users/Download?token=' . Enkrip('benar')); ?>" target="new">Download format file</a>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default font-weight-bold" data-dismiss="modal"><i class="far fa-times-circle text-danger"></i> Cancel</button>
                    <button type="submit" class="btn btn-default font-weight-bold"><i class="fas fa-upload text-success"></i> Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>