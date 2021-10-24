<script>
    var socket = io.connect('https://live-chat.mycapturer.com');
    function Kick_user(id_chat) {
        $.ajax({
            type: "GET",
            url: "<?php echo base_url('Streaming/Get_detail?token='); ?>" + id_chat,
            dataType: "json",
            cache: false,
            success: function (data) {
                if (data.success === true) {

                    Swal.fire({
                        html: 'Member <b class="text-danger">' + data.uname + '</b> akan mendapatkan hukuman karena melanggar peraturan.',
                        icon: 'question',
                        confirmButtonText: 'OK',
                        showCancelButton: true,
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        allowEnterKey: true
                    }).then((result) => {
                        if (result.isConfirmed === true) {
                            socket.emit('kick_user', {
                                "uname": data.uname,
                                "key": data.key,
                                "msg": data.msg,
                                "ava": data.ava,
                                "role_name": data.role_name,
                                "user_id": data.user_id,
                                "role_id": data.role_id,
                                "chat_id": data.chat_id
                            });
                        } else {
                            return true;
                        }
                    });

                } else {
                    toastr.error('error while getting user data!');
                }
            },
            error: function (jqXHR) {
                toastr.error('error ' + jqXHR.status + ' ' + jqXHR.statusText);
            }
        });
    }
    function Warning_user(id_chat) {
        $.ajax({
            type: "GET",
            url: "<?php echo base_url('Streaming/Get_detail?token='); ?>" + id_chat,
            dataType: "json",
            cache: false,
            success: function (data) {
                if (data.success === true) {

                    Swal.fire({
                        html: 'Anda akan memberikan peringatan kepada: <b class="text-danger">' + data.uname + '</b> karena melanggar peraturan.',
                        icon: 'question',
                        confirmButtonText: 'OK',
                        showCancelButton: true,
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        allowEnterKey: true
                    }).then((result) => {
                        if (result.isConfirmed === true) {
                            socket.emit('warning_user', {
                                "uname": data.uname,
                                "key": data.key,
                                "msg": data.msg,
                                "ava": data.ava,
                                "role_name": data.role_name,
                                "user_id": data.user_id,
                                "role_id": data.role_id,
                                "chat_id": data.chat_id
                            });
                        } else {
                            return true;
                        }
                    });
                } else {
                    toastr.error('error while getting user data!');
                }
            },
            error: function (jqXHR) {
                toastr.error('error ' + jqXHR.status + ' ' + jqXHR.statusText);
            }
        });
    }
    function absensi() {
        Swal.fire({
            title: 'Absensi Peserta',
            html: 'pesan absensi akan muncul pada halaman peserta',
            icon: 'question',
            confirmButtonText: 'OK',
            showCancelButton: true,
            allowOutsideClick: false,
            allowEscapeKey: false,
            allowEnterKey: true
        }).then((result) => {
            if (result.isConfirmed === true) {
                socket.emit('absensi', {

                });
            } else {
                return true;
            }
        });
    }
    function enable_login() {
        Swal.fire({
            title: 'Enable Login',
            html: 'anda akan mengaktifkan tombol login pada halaman member!',
            icon: 'question',
            confirmButtonText: 'YES',
            cancelButtonText: 'NO',
            showCancelButton: true,
            allowOutsideClick: false,
            allowEscapeKey: false,
            allowEnterKey: true
        }).then((result) => {
            if (result.isConfirmed === true) {
                $.ajax({
                    type: "GET",
                    url: "<?php echo base_url('Streaming/enable_login/'); ?>",
                    dataType: "json",
                    cache: false,
                    success: function (data) {
                        if (data.stat === true) {
                            $('#login_control').empty();
                            $('#login_control').append('<a class="nav-link btn btn-light" href="javascript:disable_login();">Disable Login</a>');
                        } else {
                            toastr.warning('error while changing status, please refresh page!');
                        }
                    },
                    error: function (jqXHR) {
                        toastr.error('error ' + jqXHR.status + ' ' + jqXHR.statusText);
                    }
                });
            } else {
                return true;
            }
        });
    }
    function disable_login() {
        Swal.fire({
            title: 'Enable Login',
            html: 'anda akan me-nonaktifkan tombol login pada halaman member!',
            icon: 'question',
            confirmButtonText: 'YES',
            cancelButtonText: 'NO',
            showCancelButton: true,
            allowOutsideClick: false,
            allowEscapeKey: false,
            allowEnterKey: true
        }).then((result) => {
            if (result.isConfirmed === true) {
                $.ajax({
                    type: "GET",
                    url: "<?php echo base_url('Streaming/disable_login/'); ?>",
                    dataType: "json",
                    cache: false,
                    success: function (data) {
                        if (data.stat === true) {
                            $('#login_control').empty();
                            $('#login_control').append('<a class="nav-link btn btn-light" href="javascript:enable_login();">Enable Login</a>');
                        } else {
                            toastr.warning('error while changing status, please refresh page!');
                        }
                    },
                    error: function (jqXHR) {
                        toastr.error('error ' + jqXHR.status + ' ' + jqXHR.statusText);
                    }
                });
            } else {
                return true;
            }
        });
    }
    function clear_login() {
        $.ajax({
            type: "GET",
            url: "<?php echo base_url('Streaming/clear_login/'); ?>",
            dataType: "json",
            cache: false,
            success: function (data) {
                toastr.success('status login berhasil diubah!');
            },
            error: function (jqXHR) {
                toastr.error('error ' + jqXHR.status + ' ' + jqXHR.statusText);
            }
        });
    }
</script>