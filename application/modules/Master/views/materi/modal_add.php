<div class="modal fade" id="modal_add" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modal_add" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Provinsi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="Close_add()">
                    <i aria-hidden="true" class="fas fa-times"></i>
                </button>
            </div>
            <form id="form_add" action="<?php echo base_url('Master/Materi/Save/'); ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="<?php echo $csrf['name'] ?>" value="<?php echo $csrf['hash'] ?>"/>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="id_sesi">Sesi :</label>
                                <div class="input-group">
                                <select id="id_sesi" class="form-control custom-select" required="" name="id_sesi" >
                                    <option value="">--Pilih Sesi--</option>
                                    <?php
                                    foreach ($sesi as $sesi) {
                                        echo '<option value="' . $sesi->id . '">' . $sesi->nama . '</option>';
                                    }
                                    ?>
                                </select>
                                </div>
                                <input id="code_stat" type="hidden" name="code_stat" value=""/>
                                <div id="code_msg"></div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="link_video">Link Video :</label>
                                <div class="input-group">
                                    <input id="link_video" type="text" name="link_video" type="text" class="form-control" required="" />
                                    <div id="check_id" class="input-group-append"></div>
                                </div>
                                <input id="code_stat" type="hidden" name="code_stat" value=""/>
                                <div id="code_msg"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama_materi">Materi:</label>
                                <input id="nama_materi" name="nama_materi" type="text" class="form-control" autocomplete="off" required=""/>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="txtlong">Mulai:</label>
                                <input name="time_start" type="datetime-local" id="example-datetime-local-input" class="form-control" autocomplete="off"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="txtlat">Selesai:</label>
                                <input name="time_stop" type="datetime-local" id="example-datetime-local-input" class="form-control" autocomplete="off"/>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                    <div class="col-md-12">
                            <div class="form-group">
                                <label for="des_grup">Deskripsi:</label>
                                <textarea id="des_grup" class="form-control" name="deskripsi" required="" rows="5"></textarea>
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