<?php foreach ($data as $data) { ?>
    <div class="card card-custom">
        <div class="card-body">
            <form action="<?php echo site_url('Master/Materi/Update/'); ?>" method="post">
                <input type="hidden" name="<?php echo $csrf['name'] ?>" value="<?php echo $csrf['hash'] ?>"/>
                <input type="hidden" name="id" value="<?= $id; ?>"/>
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="id_sesi">Sesi :</label>
                            <div class="input-group">
                                <select id="id_sesi" class="form-control custom-select" required="" name="id_sesi" >
                                    <option value="">--Pilih Sesi--</option>
                                    <?php
                                    foreach ($sesi as $sesi) {
                                        if ($data->id_sesi == $sesi->id) {
                                            echo '<option value="' . $sesi->id . '" selected=selected>' . $sesi->nama . '</option>';
                                        } else {
                                            echo '<option value="' . $sesi->id . '">' . $sesi->nama . '</option>';
                                        }
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
                                <input id="link_video" type="text" name="link_video" type="text" class="form-control" required="" value="<?= $data->link_video; ?>" />
                                <div id="check_id" class="input-group-append"></div>
                            </div>
                            <input id="code_stat" type="hidden" name="code_stat" value=""/>
                            <div id="code_msg"></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama_materi">Materi:</label>
                            <input id="nama_materi" name="nama_materi" type="text" class="form-control" autocomplete="off" required="" value="<?= $data->nama_materi; ?>" />
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="txtlong">Mulai:</label>
                            <input name="time_start" type="datetime-local" id="example-datetime-local-input" class="form-control"  value="<?= date('Y-m-d', strtotime($data->time_start)); ?>T<?= date('h:i:s', strtotime($data->time_start)); ?>" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="txtlat">Selesai:</label>
                            <input name="time_stop" type="datetime-local" id="example-datetime-local-input" class="form-control"  value="<?= date('Y-m-d', strtotime($data->time_stop)); ?>T<?= date('h:i:s', strtotime($data->time_stop)); ?>" />
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="des_grup">Deskripsi:</label>
                            <textarea id="des_grup" class="form-control" name="deskripsi" required="" rows="5"> <?= $data->deskripsi; ?> </textarea>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="btn-group">
                    <a href="<?php echo site_url('Master/Materi/index/'); ?>" class="btn btn-danger" title="Cancel Update"><i class="fas fa-times"></i> Cancel</a>
                    <button type="submit" class="btn btn-success"><i class="far fa-save"></i> Update</button>
                </div>
            </form>
        </div>
    </div>
<?php } ?>