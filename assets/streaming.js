window.onload = function () {
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": true,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": true,
        "showDuration": "300",
        "hideDuration": "0",
        "timeOut": "0",
        "extendedTimeOut": "0",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };
    var socket = io.connect('https://live-chat.mycapturer.com');
    socket.on('new_message', function (data) {
        if (data.name_role === 'Administrator' || data.name_role === 'Super User') {
            var txt1 = '<div class="d-flex flex-column mb-5 align-items-start">'
                    + '<div class="d-flex align-items-center" title="Administrator">'
                    + '<div class="symbol symbol-40 mr-3">'
                    + '<img src="' + data.avatar + '" class="rounded-circle" alt="' + data.username + '">'
                    + '</div>'
                    + '<div class="mx-2">'
                    + '<a href="javascript:void(0);" class="text-danger font-weight-bold font-size-h6" style="text-decoration:none;">' + data.username + ' </a>'
                    + '<span class="font-size-sm"><i class="fas fa-user-shield text-danger"></i></span>'
                    + '</div>'
                    + '</div>'
                    + '<div class="mt-2 p-5 bg-danger text-white font-size-lg text-left wrap-chat"> ' + data.msgtxt + ' </div>'
                    + '</div>';
            $('#msg_dir').append(txt1);
            $('#msg_dir2').append(txt1);
        } else if (data.name_role === 'platinum') {
            var txt2 = '<div class="d-flex flex-column mb-5 align-items-start">'
                    + '<div class="d-flex align-items-center">'
                    + '<div class="symbol symbol-40 mr-3" title="Platinum Member">'
                    + '<img src="' + data.avatar + '" class="rounded-circle" alt="' + data.username + '">'
                    + '</div>'
                    + '<div class="mx-2 bg-dark px-2 rounded" title="Platinum Member">'
                    + '<a href="javascript:void(0);" class="text-white font-size-h6" style="text-decoration:none;">' + data.username + ' </a>'
                    + '<span class="font-size-sm"><i class="fas fa-crown text-warning"></i></span>'
                    + '</div>'
                    + '<div class="btn-group btn_control">'
                    + '<button type="button" class="btn btn-sm btn-default" value="' + data.chat_id + '" title="Kick Member" onclick="Kick_user(this.value)"><i class="fas fa-times text-danger"></i></button>'
                    + '<button type="button" class="btn btn-sm btn-default" value="' + data.chat_id + '" title="Warning Member" onclick="Warning_user(this.value)"><i class="fas fa-exclamation text-warning"></i></button>'
                    + '</div>'
                    + '</div>'
                    + '<div class="mt-2 p-5 bg-light-success font-size-lg text-left wrap-chat"> ' + data.msgtxt + ' </div>'
                    + '</div>';
            $('#msg_dir').append(txt2);
            $('#msg_dir2').append(txt2);
        } else if (data.name_role === 'silver') {
            var txt3 = '<div class="d-flex flex-column mb-5 align-items-start">'
                    + '<div class="d-flex align-items-center">'
                    + '<div class="symbol symbol-40 mr-3" title="Silver Member">'
                    + '<img src="' + data.avatar + '" class="rounded-circle" alt="' + data.username + '">'
                    + '</div>'
                    + '<div class="mx-2" title="Silver Member">'
                    + '<a href="javascript:void(0);" class="font-size-h6" style="text-decoration:none;">' + data.username + ' </a>'
                    + '</div>'
                    + '<div class="btn-group btn_control">'
                    + '<button type="button" class="btn btn-sm btn-default" value="' + data.chat_id + '" title="Kick Member" onclick="Kick_user(this.value)"><i class="fas fa-times text-danger"></i></button>'
                    + '<button type="button" class="btn btn-sm btn-default" value="' + data.chat_id + '" title="Warning Member" onclick="Warning_user(this.value)"><i class="fas fa-exclamation text-warning"></i></button>'
                    + '</div>'
                    + '</div>'
                    + '<div class="mt-2 p-5 bg-light text-dark-50 font-weight-bold font-size-lg text-left wrap-chat"> ' + data.msgtxt + ' </div>'
                    + '</div>';
            $('#msg_dir').append(txt3);
            $('#msg_dir2').append(txt3);
        }
        $('#msg_dir').animate({
            scrollTop: $('#msg_dir').get(0).scrollHeight
        });
        $('#scroll-pull').animate({
            scrollTop: $('#scroll-pull').get(0).scrollHeight
        });
    });
    document.getElementById("bgndVideo").addEventListener("contextmenu", function (event) {
        event.preventDefault();
        event.stopPropagation();
    });
    $("#bgndVideo").YTPlayer({
        videoURL: 'c_fRtpQf4Oc',
        containment: 'self',
        autoPlay: false,
        mute: false,
        startAt: 0,
        showControls: true,
        useOnMobile: true,
        vol: 100,
        opacity: 1,
        optimizeDisplay: true,
        loop: false,
        showYTLogo: false,
        remember_last_time: true,
        stopMovieOnBlur: true,
        useNoCookie: true
    });
    $('.sertif-carousel').slick({
        slidesToScroll: 1,
        dots: false,
        infinite: false,
        cssEase: 'linear',
        lazyLoad: 'ondemand',
        arrows: true,
        centerMode: false,
        centerPadding: '60px'
    });
    $('#msg_dir').animate({
        scrollTop: $('#msg_dir').get(0).scrollHeight
    });
    $('#scroll-pull').animate({
        scrollTop: $('#scroll-pull').get(0).scrollHeight
    });
};
function Open_chat() {
    $('#scroll-pull').animate({
        scrollTop: $('#scroll-pull').get(0).scrollHeight
    });
}
function Send_chat(id) {
    if (id === 1) {
        var msgtxt = $('input[name="msgtxt"]').val();
        if (msgtxt.length <= 1) {
            toastr.warning('Message is too short! 15 characters minimum');
        } else {
            var dataString = {
                message: msgtxt
            };
            $.ajax({
                type: "POST",
                url: "https://sertifikasiku.mycapturer.com/Streaming/Chat_send/",
                data: dataString,
                dataType: "json",
                cache: false,
                success: function (data) {
                    $('input[name="msgtxt"]').val('');
                    if(data.block_chat === true){
                        toastr.warning('sistem kami mendeteksi kata-kata tidak pantas, anda akan mendapatkan hukuman jika ');
                    }
                    if (data.success === true) {
                        var socket = io.connect('https://live-chat.mycapturer.com');
                        socket.emit('new_message', {
                            username: data.uname,
                            msgtxt: data.msg,
                            avatar: data.ava,
                            role_name: data.role_name,
                            id_user: data.user_id,
                            id_role: data.role_id,
                            id_chat: data.chat_id
                        });
                    } else if (data.success === false) {
                        window.location.href = '';
                    } else {
                        toastr.warning('error, your message not sent');
                    }
                }, error: function (jqXHR) {
                    toastr.error('error ' + jqXHR.status + ' ' + jqXHR.statusText);
                }
            });
        }
    } else if (id === 2) {
        var msgtxt = $('textarea[name="msgtxt2"]').val();
        if (msgtxt.length <= 1) {
            toastr.warning('Message is too short! 15 characters minimum');
        } else {
            var dataString = {
                message: msgtxt
            };
            $.ajax({
                type: "POST",
                url: "https://sertifikasiku.mycapturer.com/Streaming/Chat_send/",
                data: dataString,
                dataType: "json",
                cache: false,
                success: function (data) {
                    $('textarea[name="msgtxt2"]').val('');
                    if(data.block_chat === true){
                        toastr.warning('sistem kami mendeteksi kata-kata tidak pantas, anda akan mendapatkan hukuman jika ');
                    }
                    if (data.success === true) {
                        var socket = io.connect('https://live-chat.mycapturer.com');
                        socket.emit('new_message', {
                            username: data.uname,
                            msgtxt: data.msg,
                            avatar: data.ava,
                            role_name: data.role_name,
                            id_user: data.user_id,
                            id_role: data.role_id,
                            id_chat: data.chat_id
                        });
                    } else if (data.success === false) {
                        window.location.href = '';
                    } else {
                        toastr.warning('error, your message not sent');
                    }
                }, error: function (jqXHR) {
                    toastr.error('error ' + jqXHR.status + ' ' + jqXHR.statusText);
                }
            });
        }
    }
}
function Kick_user(id_chat) {
    $.ajax({
        type: "GET",
        url: window.location.protocol + '//' + window.location.host + '/Streaming/Get_detail?token=' + id_chat,
        dataType: "json",
        cache: false,
        success: function (data) {
            console.log(data);
        },
        error: function (jqXHR) {
            toastr.error('error ' + jqXHR.status + ' ' + jqXHR.statusText);
        }
    });
}
function Warning_user(id_chat) {
    $.ajax({
        type: "GET",
        url: window.location.protocol + '//' + window.location.host + '/Streaming/Get_detail?token=' + id_chat,
        dataType: "json",
        cache: false,
        success: function (data) {
            console.log(data);
        },
        error: function (jqXHR) {
            toastr.error('error ' + jqXHR.status + ' ' + jqXHR.statusText);
        }
    });
}