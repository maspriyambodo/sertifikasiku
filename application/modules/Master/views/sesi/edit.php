<?php foreach ($data as $data) { ?>
<div class="card card-custom">
    <div class="card-body">
        <form action="<?php echo site_url('Master/Sesi/Update/'); ?>" method="post">
            <input type="hidden" name="<?php echo $csrf['name'] ?>" value="<?php echo $csrf['hash'] ?>"/>
            <input type="hidden" name="id" value="<?php echo $id; ?>"/>
            <div class="row">        
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nama">Nama Sesi:</label>
                        <input id="nama" name="nama" type="text" class="form-control" autocomplete="off" required="" value="<?php echo $data->nama; ?>" />
                    </div>
                </div>
            </div>
                    
                    <hr>
            <div class="btn-group">
                <a href="<?php echo site_url('Master/Sesi/index/'); ?>" class="btn btn-danger" title="Cancel Update"><i class="fas fa-times"></i> Cancel</a>
                <button type="submit" class="btn btn-success"><i class="far fa-save"></i> Update</button>
            </div>
        </form>
    </div>
</div>
<?php } ?>