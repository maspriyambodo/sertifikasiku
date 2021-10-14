<div class="modal fade" id="modal_add" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modal_add" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Sesi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="Close_add()">
                    <i aria-hidden="true" class="fas fa-times"></i>
                </button>
            </div>
            <form id="form_add" action="<?php echo base_url('Master/Sesi/Save/'); ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="<?php echo $csrf['name'] ?>" value="<?php echo $csrf['hash'] ?>"/>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama">Nama Sesi:</label>
                                <input id="nama" name="nama" type="text" class="form-control" required>
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