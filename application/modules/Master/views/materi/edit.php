<div class="card card-custom">
    <div class="card-body">
        <form action="<?php echo site_url('Master/Materi/Update/'); ?>" method="post">
            <input type="hidden" name="<?php echo $csrf['name'] ?>" value="<?php echo $csrf['hash'] ?>"/>
            <input type="hidden" name="e_id" value="<?php echo $data[0]->id; ?>"/>
            <div class="form-group">
                <label for="nama_materi">Materi:</label>
                <input id="nama_materi" name="nama_materi" type="text" class="form-control" autocomplete="off" required="" value="<?php echo $data[0]->nama_materi; ?>" />
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group"> 
                        <label for="narsumtxt">Narasumber:</label> 
                        <input id="narsumtxt" type="text" name="narsumtxt" required="" class="form-control" autocomplete="off" value="<?php echo $data[0]->narasumber; ?>">
                    </div>
                    <div class="form-group"> 
                        <label for="segmentxt">Segment:</label> 
                        <select id="segmentxt" name="segmentxt" class="form-control custom-select" required=""> 
                            <option value="">Choose Segment</option>
                            <?php
                            foreach ($bidang_industri as $bidang_industri1) {
                                if (Dekrip($bidang_industri1->id_industri) == $data[0]->id) {
                                    echo '<option value="' . $bidang_industri1->id_industri . '" selected="">' . $bidang_industri1->nama_industri . '</option>';
                                } else {
                                    echo '<option value="' . $bidang_industri1->id_industri . '">' . $bidang_industri1->nama_industri . '</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="id_sesi">Sesi :</label>
                        <div class="input-group">
                            <select id="id_sesi" class="form-control custom-select" required="" name="id_sesi">
                                <option value="">--Pilih Sesi--</option>
                                <?php
                                foreach ($sesi as $sesi) {
                                    if ($data[0]->id_sesi == $sesi->id) {
                                        echo '<option value="' . $sesi->id . '" selected=selected>' . $sesi->nama . '</option>';
                                    } else {
                                        echo '<option value="' . $sesi->id . '">' . $sesi->nama . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group"> 
                        <label for="narsumtitle">Title Narasumber:</label> 
                        <input id="narsumtitle" type="text" name="narsumtitle" required="" class="form-control" autocomplete="off" value="<?php echo $data[0]->title_narsum; ?>">
                    </div>
                    <div class="form-group">
                        <label for="leveltxt">Level:</label>
                        <select id="leveltxt" name="leveltxt" class="form-control custom-select" required="">
                            <option value="">Choose Level</option>
                            <?php
                            foreach ($klasifikasi as $klasifikasi1) {
                                if (Dekrip($klasifikasi1->id_klasifikasi) == $data[0]->id_klasifikasi) {
                                    echo '<option value="' . $klasifikasi1->id_klasifikasi . '" selected="">' . $klasifikasi1->nama_klasifikasi . '</option>';
                                } else {
                                    echo '<option value="' . $klasifikasi1->id_klasifikasi . '">' . $klasifikasi1->nama_klasifikasi . '</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="link_video">Link Video :</label>
                        <div class="input-group">
                            <input id="link_video" type="text" name="link_video" type="text" class="form-control" required="" value="<?php echo $data[0]->link_video; ?>" />
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="txtlong">Mulai:</label>
                        <input name="time_start" type="datetime-local" id="example-datetime-local-input" class="form-control"  value="<?php echo date('Y-m-d', strtotime($data[0]->time_start)); ?>T<?php echo date('h:i:s', strtotime($data->time_start)); ?>" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="txtlat">Selesai:</label>
                        <input name="time_stop" type="datetime-local" id="example-datetime-local-input" class="form-control"  value="<?php echo date('Y-m-d', strtotime($data[0]->time_stop)); ?>T<?php echo date('h:i:s', strtotime($data[0]->time_stop)); ?>" />
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="des_grup">Deskripsi:</label>
                        <textarea id="des_grup" class="form-control" name="deskripsi" required="" rows="5"> <?php echo $data[0]->deskripsi; ?> </textarea>
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