<?php foreach ($data as $data) { ?>
    <div class="card card-custom">
        <div class="card-body">
            <form action="<?php echo site_url('Master/Sponsor/Update/'); ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="<?php echo $csrf['name'] ?>" value="<?php echo $csrf['hash'] ?>" />
                <input type="hidden" name="id" value="<?php echo $id; ?>" />
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="kategori">Kategori:</label>
                            <select name="kategori" id="kategori" class="form-control">
                                <option value="1" <?php echo $data->kategori == 1 ? 'selected' : '' ?>>Sponsor</option>
                                <option value="2" <?php echo $data->kategori == 2 ? 'selected' : '' ?>>Media Patner</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama">Nama:</label>
                            <input id="nama" name="nama" type="text" class="form-control" required value="<?php echo $data->nama; ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="image-input image-input-outline" id="kt_image_4" style="background-image:url('<?php echo site_url('assets/images/sponsor/' . $data->path); ?>');">
                                <div class="image-input-wrapper"></div>
                                <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel picture">
                                    <i class="fas fa-times icon-xs text-muted"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="url_website">Url Website:</label>
                            <input id="url_website" name="url_website" type="text" class="form-control" required value="<?php echo $data->url_website; ?>">
                        </div>
                    </div>
                </div>

                <hr>
                <div class="btn-group">
                    <a href="<?php echo site_url('Master/Sponsor/index/'); ?>" class="btn btn-danger" title="Cancel Update"><i class="fas fa-times"></i> Cancel</a>
                    <button type="submit" class="btn btn-success"><i class="far fa-save"></i> Update</button>
                </div>
            </form>
        </div>
    </div>
<?php } ?>