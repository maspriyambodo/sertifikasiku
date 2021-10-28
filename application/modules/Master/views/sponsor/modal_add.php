<div class="modal fade" id="modal_add" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modal_add" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Sponsor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="Close_add()">
                    <i aria-hidden="true" class="fas fa-times"></i>
                </button>
            </div>
            <form id="form_add" action="<?php echo base_url('Master/Sponsor/Save/'); ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="<?php echo $csrf['name'] ?>" value="<?php echo $csrf['hash'] ?>"/>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="kategori">Kategori:</label>
                                <select name="kategori" id="kategori" class="form-control" required>
                                    <option value="1">Sponsor</option>
                                    <option value="2">Media Patner</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama">Nama:</label>
                                <input id="nama" name="nama" type="text" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="path">Gambar:</label>
                                <input id="path" name="path" type="file" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="url_website">Url Website:</label>
                                <input id="url_website" name="url_website" type="text" class="form-control" required>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" onclick="Save()">Save</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal" onclick="Close_add()">No</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
            $(function () {
            $("#start_date").datepicker({
                    autoclose: true,
                    todayHighlight: true
            });
            $("#end_date").datepicker({
                    autoclose: true,
                    todayHighlight: true
            });
            });
</script>
<script>
    function Close_add() {
    }

    function Save() {

            $("#form_add").submit();

    }
</script>