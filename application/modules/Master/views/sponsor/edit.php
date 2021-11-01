<div class="card card-custom">
    <div class="card-body">
        <form action="<?php echo site_url('Master/Sponsor/Update/'); ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="<?php echo $csrf['name'] ?>" value="<?php echo $csrf['hash'] ?>" />
            <input type="hidden" name="id" value="<?php echo $sponsor[0]->id; ?>" />
            <input type="hidden" name="old_id" value="<?php echo $sponsor[0]->old_id; ?>" />
            <input type="hidden" name="old_logo" value="<?php echo $sponsor[0]->path; ?>"/>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="kategori">Kategori:</label>
                        <select name="kategori" id="kategori" class="form-control custom-select">
                            <option value="<?php echo Enkrip(1); ?>" <?php echo $sponsor[0]->kategori == 1 ? 'selected' : null ?>>Sponsor</option>
                            <option value="<?php echo Enkrip(2); ?>" <?php echo $sponsor[0]->kategori == 2 ? 'selected' : null ?>>Media Patner</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nama">Nama:</label>
                        <input id="nama" name="nama" type="text" class="form-control" required value="<?php echo $sponsor[0]->nama; ?>" autocomplete="off"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Logo:</label>
                        <div class="clearfix"></div>
                        <img id="favico" class="img-fluid" src="<?php echo $sponsor[0]->path; ?>"/>
                        <button type="button" id="edit_fav" class="btn btn-icon btn-default btn-xs" title="Change Logo" onclick="Edit_fav()"><i class="far fa-edit"></i></button>
                        <div id="e_favicon"></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="url_website">Url Website:</label>
                        <input id="url_website" name="url_website" type="url" class="form-control" required value="<?php echo $sponsor[0]->url_website; ?>" autocomplete="off"/>
                    </div>
                </div>
            </div>
            <div class="clearfix my-4"></div>
            <div class="btn-group">
                <a href="<?php echo site_url('Master/Sponsor/index/'); ?>" class="btn btn-danger" title="Cancel Update"><i class="fas fa-times"></i> Cancel</a>
                <button type="submit" class="btn btn-success"><i class="far fa-save"></i> Update</button>
            </div>
        </form>
    </div>
</div>
<script>
    function Edit_fav() {
        $('#favico').removeAttr('src');
        $('#edit_fav').hide('slow');
        $('#e_favicon').append(
                '<input id="e_favico" type="file" name="e_favico" class="form-control" onchange="V_fav()"/>'
                + '<div class="clearfix" style="margin:5px 0px;"></div>'
                + '<button type="button" class="btn btn-icon btn-danger btn-xs" title="Cancel" onclick="C_fav()"><i class="fas fa-times-circle"></i></button>'
                + '<button type="button" class="btn btn-icon btn-success btn-xs" title="Save" style="margin:0px 5px;" onclick="S_fav()"><i class="fas fa-save"></i></button>'
                );
    }
    function V_fav() {
        var a = $('#e_favico')[0].files[0];
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#favico').attr('src', e.target.result);
        };
        reader.readAsDataURL(a);
    }
    function C_fav() {
        var old_logo = $('input[name="old_logo"]').val();
        $('#favico').attr('src', old_logo);
        $('#edit_fav').show('slow');
        $('#e_favicon').empty();
    }
    function S_fav() {
        var fav = $('input[name="e_favico"]').val();
        if (fav) {
            Swal.fire({
                title: "Are you sure?",
                text: "After replacing, everything will change",
                icon: "question",
                buttonsStyling: false,
                confirmButtonText: "<i class='fas fa-save'></i> Yes",
                showCancelButton: true,
                cancelButtonText: "<i class='fas fa-window-close'></i> No",
                allowOutsideClick: false,
                customClass: {
                    confirmButton: "btn btn-success",
                    cancelButton: "btn btn-danger"
                }
            }).then(function (result) {
                if (result.value) {
                    var a, b, c, d, e;
                    a = new FormData();
                    b = $('#e_favico')[0].files[0];
                    c = $('input[name="bodo_csrf_token"]').val();
                    d = $('input[name="old_id"]').val();
                    e = $('select[name="kategori"]').val();
                    a.append('favico', b);
                    a.append('bodo_csrf_token', c);
                    a.append('old_id', d);
                    a.append('kategori', e);
                    var url = '<?php echo base_url('Master/Sponsor/update_logo/'); ?>';
                    $.ajax({
                        url: url,
                        type: 'POST',
                        cache: false,
                        contentType: false,
                        processData: false,
                        enctype: "multipart/form-data",
                        data: a,
                        success: function (data) {
                            $('input[name="bodo_csrf_token"]').val(data.csrf);
                            if (data.status) {
                                $('#favico').attr('src', data.new_img);
                                $('#edit_fav').show('slow');
                                $('#e_favicon').empty();
                                $('input[name="old_logo"]').val(data.new_img);
                                Swal.fire({
                                    title: "Success",
                                    text: data.msg,
                                    icon: "success",
                                    buttonsStyling: false,
                                    confirmButtonText: "OK",
                                    showCancelButton: false,
                                    allowOutsideClick: false,
                                    customClass: {
                                        confirmButton: "btn btn-success"
                                    }
                                });
                            } else {
                                Swal.fire("Error", data.msg, "error");
                            }
                        },
                        error: function (data) {
                            Swal.fire("Error " + data.status, data.statusText, "error");
                            C_fav();
                        }
                    });
                } else {

                }
            });
        } else {
            toastr.warning('please choose file!');
        }
    }
</script>