<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <title>Festival Sertifikasiku - sign in</title>
        <link href="<?php echo base_url('assets/images/systems/' . $this->bodo->Sys('favico')); ?>" rel="shortcut icon"/>
        <link href="https://fonts.googleapis.com" rel="preconnect"/>
        <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin/>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;1,300;1,400&family=Poppins:wght@100;200&display=swap" rel="stylesheet">
        <link href="<?php echo base_url('assets/plugins/global/fonts/galano/style.css'); ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url('vendor/twbs/bootstrap/dist/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="<?php echo base_url('assets/streaming.css'); ?>"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css" integrity="sha512-6S2HWzVFxruDlZxI3sXOZZ4/eJ8AcxkQH1+JjSe/ONCEqR9L4Ysq5JdT5ipqtzU7WHalNwzwBv+iE51gNHJNqQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <style>
            .send_otp{
                background: #2B82ED;
                width:100%;
                border-radius: 8px;
                color: #FFFFFF;
                font-size: 14px;
                line-height: 16px;
                height: 44px;
                font-family: 'Poppins-Semi-bold', sans-serif;
            }
        </style>
    </head>
    <body>
        <input type="hidden" name="<?php echo $csrf['name'] ?>" value="<?php echo $csrf['hash'] ?>"/>
        <nav class="navbar navbar-expand-lg navbar-light fixed-top bg-custom">
            <div class="container-fluid">
                <a class="navbar-brand" href="javascript:void();">
                    <img class="img-thumbnail" src="<?php echo base_url('assets/images/systems/' . $this->bodo->Sys('logo')); ?>" alt="Festival Sertifikasiku" style="max-width:115px;"/>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" style="float:right;position:inherit;padding:1px">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0 d-lg-none">
                        <?php
                        if ($this->bodo->Sys('login_member') == 1) {
                            echo '<button type="button" class="btn btn-custom ms-2" data-bs-toggle="modal" data-bs-target="#modal_login">Masuk</button>';
                        } else {
                            echo '<button type="button" class="btn btn-custom ms-2" data-bs-toggle="modal" data-bs-target="#coming_soon">Masuk</button>';
                        }
                        ?>
                    </ul>
                </div>

                <div class="collapse navbar-collapse" style="margin-right:3%;">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <?php
                        if ($this->bodo->Sys('login_member') == 1) {
                            echo '<button id="loginbtn" type="button" class="btn btn-custom ms-2" data-bs-toggle="modal" data-bs-target="#modal_login" style="font-family:Galano Grotesque SemiBold;color: #214980;">Masuk</button>';
                        } else {
                            echo '<button type="button" class="btn btn-custom ms-2" data-bs-toggle="modal" data-bs-target="#coming_soon" style="font-family:Galano Grotesque SemiBold;color: #214980;">Masuk</button>';
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
        <section id="main_webinar" class="clearfix main_webinar" loading="lazy">
            <div class="container">
                <div class="row pt-5">
                    <div class="col-lg-8 d-xs-block col-xs-12 col-12 col-md-12">
                        <div class="player" style="height: 456px;background-color: black;border-radius:15px;"></div>
                    </div>
                    <div class="col-lg-4 d-none d-xl-block"><!-- d-sm-none d-xl-block -->
                        <div class="card live-chat-lg" style="height:100%;max-height:456px;">
                            <div class="card-header">
                                <div class="card-title">
                                    <div class="form-group" style="font-family:'Galano Grotesque SemiBold';color: #848484;">
                                        <i class="fas fa-comments"></i>
                                        <b>Live Chat</b>
                                    </div>
                                </div>
                            </div>
                            <div id="msg_dir" class="card-body"></div>
                            <div class="card-footer input-group mb-3 chat_footer">
                                <input type="text" class="form-control" name="msgtxt" autocomplete="off">
                                <button type="button" class="input-group-text"><i class="fas fa-paper-plane"></i></button>                             
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row py-4">
                    <div class="col-lg-8 d-xs-block col-xs-12 col-12 col-md-12">
                        <div class="form-group">
                            <h4 class="text-white" style="font-family: 'Galano Grotesque Bold';">
                                <?php echo $materi[0]->nama_materi . ' - ' . $materi[0]->narasumber; ?>
                            </h4>
                            <!--                            <div class="text-white desc_materi text-start">
                                                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                                                        </div>-->
                        </div>
                        <!--                        <div id="owl-carousel" class="owl-carousel owl-theme mt-4 multiCarosel">
                                                    //<?php
//                            foreach ($sponsor as $key => $sponsor1) {
//                                if ($sponsor[$key]->kategori == 1) {
//                                    echo '<div class="item">'
//                                    . '<a href="' . $sponsor1->url_website . '" target="new">';
//                                    echo '<img src="' . base_url('assets/images/sponsor/' . $sponsor1->path) . '" alt="' . $sponsor1->nama . '" class="img-fluid img-thumbnail" style="width:165px;"/>'
//                                    . '</a>';
//                                    echo '</div>';
//                                } else {
//                                    null;
//                                }
//                            }
//                            
                        ?>
                                                </div>-->
                        <div class="clearfix" style="margin:50px 0px;"></div>
                        <div class="text-white mb-3" style="font-family: Galano Grotesque Bold;font-size: 16px;line-height: 19px;">Disponsori oleh:</div>
                        <?php
                        foreach ($sponsor as $key => $sponsor1) {
                            if ($sponsor[$key]->kategori == 1) {
                                echo '<div style="width: -webkit-fit-content;height:-webkit-fit-content;width:-moz-fit-content;height:-moz-fit-content;float:left;margin-right:5px;margin-bottom:15px;">'
                                . '<a href="' . $sponsor1->url_website . '" class="align-middle" target="new">';
                                echo '<img src="' . base_url('assets/images/sponsor/' . $sponsor1->path) . '" alt="' . $sponsor1->nama . '" class="img-fluid text-center align-middle" style="max-width:165px;max-height:96px;"/>'
                                . '</a>';
                                echo '</div>';
                            } else {
                                null;
                            }
                        }
                        ?>
                        <!--                        <div id="owl-carousel2" class="owl-carousel owl-theme mt-4">
                                                    //<?php
//                            foreach ($sponsor as $key => $sponsor2) {
//                                if ($sponsor[$key]->kategori == 2) {
//                                    echo '<div class="item">'
//                                    . '<a href="' . $sponsor2->url_website . '" target="new">';
//                                    echo '<img src="' . base_url('assets/images/media_partner/' . $sponsor2->path) . '" alt="' . $sponsor2->nama . '" class="img-fluid img-thumbnail" style="width:165px;"/>'
//                                    . '</a>';
//                                    echo '</div>';
//                                } else {
//                                    null;
//                                }
//                            }
//                            
                        ?>
                                                </div>-->
                        <div class="clearfix" style="margin:50px 0px;"></div>
                        <div class="text-white mb-3" style="font-family: Galano Grotesque Bold;font-size: 16px;line-height: 19px;">Bekerja sama dengan:</div>
                        <?php
                        foreach ($sponsor as $key3 => $sponsor3) {
                            if ($sponsor[$key3]->kategori == 2) {
                                echo '<div style="width: -webkit-fit-content;height:-webkit-fit-content;width:-moz-fit-content;height:-moz-fit-content;float:left;margin-right:5px;margin-bottom:15px;">'
                                . '<a href="' . $sponsor3->url_website . '" target="new">';
                                echo '<img src="' . base_url('assets/images/media_partner/' . $sponsor3->path) . '" alt="' . $sponsor3->nama . '" class="img-fluid" style="max-width:165px;max-height:96px;"/>'
                                . '</a>';
                                echo '</div>';
                            } else {
                                null;
                            }
                        }
                        ?>
                    </div>
                    <div class="col-lg-4">

                        <!--                                                <div id="owl-carousel3" class="owl-carousel owl-theme bg-white" style="border-radius:10px;">
                                                                            <div class="item">
                                                                                <div class="text-center" style="background: #FFFFFF;box-shadow: 0px 2px 7px rgba(0, 0, 0, 0.11);border-radius: 10px 10px 0px 0px;">
                                                                                    <div style="font-family: Galano Grotesque Medium;font-size: 14px;line-height: 16px;">
                                                                                        Sabtu, 6 November 2021
                                                                                    </div>
                                                                                    <div style="padding:0px 10px;background: linear-gradient(90deg, #2C64A1 0%, #164579 51.56%, #2C64A1 100%);border-radius: 2px;">
                                                                                        Bisnis dan Keuangan
                                                                                    </div>
                                                                                </div>
                                                                                <div class="clearfix my-4"></div>
                                                                                <div class="row" style="background: rgba(0, 120, 254, 0.07);width:100% !important;">
                                                                                    <div class="col-md-4">
                                                                                        <div class="form-group">
                                                                                            <div class="text-center">
                                                                                                10:00 - 10:30
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-4">
                                                                                        <div class="form-group" style="font-size:14px;line-height:16px;color: #242827;font-family:Galano Grotesque Medium;">
                                                                                            Ignasius Ryan
                                                                                        </div>
                                                                                        <div class="form-group" style="font-size:12px;line-height:14px;color: #242827;font-family:Galano Grotesque Regular;">
                                                                                            "Belajar mengelola Data menggunakan Excel untuk Bisnis"
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-4"></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>-->

                        <!--                        <div class="card">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                <div class="text-center">
                                                                    <button type="button" id="prev_schedule" class="btn btn-default"><i class="fas fa-chevron-left"></i></button>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="text-center" style="font-family: Galano Grotesque Medium;font-size: 14px;line-height: 16px;color: #242827;">
                                                                    Sabtu, 6 November 2021
                                                                </div>
                                                                <center>
                                                                    <div class="text-center" style="padding: 4px 10px;background: linear-gradient(90deg, #2C64A1 0%, #164579 51.56%, #2C64A1 100%);border-radius: 2px;width: fit-content;margin-top: 3px;">
                                                                        <div style="font-family:Galano Grotesque SemiBold;font-size: 12px;line-height: 113%;text-align: center;color: #FFFFFF;text-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);flex: none;order: 0;flex-grow: 0;margin: 0px 10px;">
                                                                            Bisnis dan Keuangan
                                                                        </div>
                                                                    </div>
                                                                </center>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="text-center">
                                                                    <button type="button" id="next_schedule" class="btn btn-default"><i class="fas fa-chevron-right"></i></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="">
                                                            
                                                        </div>
                                                    </div>
                                                </div>-->

                    </div>
                </div>
            </div>

        </section>

        <section id="chat_on_mobile" class="d-md-block d-lg-none fixed-bottom clearfix" data-bs-toggle="modal" data-bs-target="#kt_chat_modol" onclick="Open_chat()">
            <div class="container">
                <div class="form-group">
                    <span class="title_txt">Live Chat</span>
                </div>
                <div class="form-group">
                    <span id="title_icon" class="title_icon"><i class="fas fa-chevron-up"></i></span>
                </div>
            </div>
            <div class="clearfix" style="border-bottom:1px solid #6c757d;width:100%;"></div>
        </section>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="<?php echo base_url('vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js'); ?>" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js" integrity="sha512-lbwH47l/tPXJYG9AcFNoJaTMhGvYWhVM9YI43CT+uteTRRaiLCui8snIgyAN8XWgNjNhCqlAUdzZptso6OCoFQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.countdown/2.2.0/jquery.countdown.min.js" integrity="sha512-lteuRD+aUENrZPTXWFRPTBcDDxIGWe5uu0apPEn+3ZKYDwDaEErIK9rvR0QzUGmUQ55KFE2RqGTVoZsKctGMVw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <div class="modal fade kt_chat_modol" id="kt_chat_modol" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel"><i class="fas fa-comments"></i><b> Live Chat</b></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div id="scroll-pull" class="scroll scroll-pull" data-height="375" data-mobile-height="300">
                            <!--begin::Messages-->
                            <div id="msg_dir2" class="messages"></div>
                            <!--end::Messages-->
                        </div>
                    </div>
                    <div class="card-footer align-items-center">
                        <!--begin::Compose-->
                        <textarea name="msgtxt2" class="form-control border-0 p-0" rows="4" placeholder="Type a message"></textarea>
                        <div class="d-flex align-items-center justify-content-between mt-2">
                            <div class="mr-3"></div>
                            <div>
                                <button type="button" class="btn btn-primary text-uppercase font-weight-bold chat-send py-2 px-6">Send</button>
                                <button type="button" class="btn btn-secondary text-uppercase font-weight-bold chat-send py-2 px-6" data-bs-dismiss="modal" aria-label="Close">Close</button>
                            </div>
                        </div>
                        <!--begin::Compose-->
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="coming_soon" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="mb-2" style="float: right;">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="close_login()"></button>    
                        </div>
                        <img src="<?php echo base_url('assets/images/coming_soon.jpeg'); ?>" alt="sertifikasiku mini class" class="img-fluid"/>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modal_login" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="mb-2" style="float: right;">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="close_login()"></button>    
                        </div>

                        <div id="form_mail">
                            <div class="text-center my-4">
                                <img class="img-fluid" src="<?php echo base_url('assets/images/a9b7f6aefbae556e99a8f5ffbea66844.png'); ?>" alt="login-img" style="width:286px;"/>
                            </div>
                            <div class="form-group text-center" style="font-family:'Galano Grotesque Bold';">
                                <h3>Masuk</h3>
                            </div>
                            <div class="form-group">
                                <label for="mailtxt" style="font-family:'Galano Grotesque SemiBold';">E-mail</label>
                            </div>
                            <div class="input-group my-2">
                                <input id="mailtxt" name="mailtxt" type="email" class="form-control" autocomplete="off" placeholder="Masukkan alamat e-mail kamu">
                            </div>
                            <div class="form-group">
                                <span id="err_msg" class="text-danger"></span>
                            </div>
                            <div class="clearfix my-4"></div>
                            <div class="form-group text-center">
                                <button type="button" class="btn btn-default fw-bold send_otp" onclick="send_otp()">Masuk</button>
                            </div>
                        </div>
                        <div id="form_otp">
                            <div class="text-center my-4">
                                <img class="img-fluid" src="<?php echo base_url('assets/images/a9b7f6aefbae556e99a8f5ffbea66844.png'); ?>" alt="login-img" style="width:286px;"/>
                            </div>
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    <input type="text" name="otptxt" class="form-control text-center" required="" autocomplete="off" maxlength="5" onkeypress="return isNumber(event)"/>
                                </div>
                                <div class="col-md-2"></div>
                            </div>
                            <div class="clearfix my-4"></div>
                            <div class="text-center">
                                <button type="button" class="btn btn-info fw-bold" onclick="verify_otp()">Verifikasi</button>
                            </div>
                            <div class="text-center my-4 font-size-xs">
                                Mohon cek folder spam jika kode OTP tidak ada dalam folder masuk.
                            </div>
                            <div class="clearfix my-4"></div>
                            <div class="text-center">
                                <div class="text-muted">
                                    Don't receive the code?
                                </div>
                                <a id="otp_resend">Resend Code</a> <span id="otp_timer"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            window.onload = function () {
                $('#loginbtn').trigger('click');
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
                $('#form_otp').hide();
            };
            function send_otp() {
                $('input[name="otptxt"]').val('');
                var mailtxt = $('input[name="mailtxt"]').val();
                document.getElementById('err_msg').innerHTML = '';
                if (mailtxt !== '') {
                    $('.send_otp').attr('disabled', '');
                    $.ajax({
                        type: "GET",
                        url: "<?php echo base_url('Landing/Get_mail?email='); ?>" + mailtxt,
                        dataType: "json",
                        cache: false,
                        success: function (data) {
                            if (data.status === true) {
                                $('#form_mail').hide();
                                $('#form_otp').show();
                                var otp_tym = new Date().getTime() + 59000;
                                $('#otp_timer').countdown(otp_tym, {elapse: true})
                                        .on('update.countdown', function (event) {
                                            var $this = $(this);
                                            if (event.elapsed) {
                                                $('#otp_timer').empty();
                                                $('#otp_resend').attr('href', 'javascript:send_otp()');
                                            } else {
                                                $this.html(event.strftime('%S'));
                                                $('#otp_resend').removeAttr('href');
                                            }
                                        });
                            } else if (data.status === 'blokir_akun') {
                                $('.send_otp').removeAttr('disabled');
                                document.getElementById('err_msg').innerHTML = 'akun anda diblokir, harap hubungi admin!';
                            } else if (data.status === 'lagi_login') {
                                $('.send_otp').removeAttr('disabled');
                                document.getElementById('err_msg').innerHTML = 'anda telah masuk dengan perangkat lain';
                            } else {
                                $('.send_otp').removeAttr('disabled');
                                document.getElementById('err_msg').innerHTML = 'email not registered!';
                            }
                        },
                        error: function (jqXHR) {
                            toastr.error('error ' + jqXHR.status + ' ' + jqXHR.statusText);
                        }
                    });
                } else {
                    document.getElementById('err_msg').innerHTML = 'please fill your email!';
                    $('.send_otp').removeAttr('disabled');
                }
            }
            function close_login() {
                document.getElementById('err_msg').innerHTML = '';
                $('.send_otp').removeAttr('disabled');
            }
            function isNumber(b) {
                b = (b) ? b : window.event;
                var a = (b.which) ? b.which : b.keyCode;
                if (a > 31 && (a < 48 || a > 57)) {
                    return false;
                }
            }
            function verify_otp() {
                var otp, csrf, mail;
                otp = $('input[name="otptxt"]').val();
                csrf = $('input[name="bodo_csrf_token"]').val();
                mail = $('input[name="mailtxt"]').val();
                var dataString = {
                    otp_code: otp,
                    bodo_csrf_token: csrf,
                    mail_user: mail
                };
                if (otp !== '' && otp.length > 0 && otp.length <= 5) {
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url('Landing/verify_otp/'); ?>",
                        data: dataString,
                        dataType: "json",
                        cache: false,
                        success: function (data) {
                            $('input[name="bodo_csrf_token"]').val(data.csrf);
                            if (data.stat === true) {
                                window.location.href = data.href_url;
                            } else {
                                toastr.warning('mohon masukkan kode OTP dengan benar, atau kirim ulang kode!');
                            }
                        },
                        error: function (jqXHR) {
                            toastr.error('error ' + jqXHR.status + ' ' + jqXHR.statusText);
                        }
                    });
                } else {
                    return false;
                }
            }
        </script>
    </body>
</html>
