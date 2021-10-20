<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <title>Festival Sertifikasiku</title>
        <link href="<?php echo base_url('assets/images/systems/' . $this->bodo->Sys('favico')); ?>" rel="shortcut icon"/>
        <link href="https://fonts.googleapis.com" rel="preconnect"/>
        <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin/>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;1,300;1,400&family=Poppins:wght@100;200&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.1/css/bootstrap.min.css" integrity="sha512-6KY5s6UI5J7SVYuZB4S/CZMyPylqyyNZco376NM2Z8Sb8OxEdp02e1jkKk/wZxIEmjQ6DRCEBhni+gpr9c4tvA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="<?php echo base_url('assets/streaming.css'); ?>"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css" integrity="sha512-6S2HWzVFxruDlZxI3sXOZZ4/eJ8AcxkQH1+JjSe/ONCEqR9L4Ysq5JdT5ipqtzU7WHalNwzwBv+iE51gNHJNqQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.1/js/bootstrap.min.js" integrity="sha512-ewfXo9Gq53e1q1+WDTjaHAGZ8UvCWq0eXONhwDuIoaH8xz2r96uoAYaQCm1oQhnBfRXrvJztNXFsTloJfgbL5Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js" integrity="sha512-lbwH47l/tPXJYG9AcFNoJaTMhGvYWhVM9YI43CT+uteTRRaiLCui8snIgyAN8XWgNjNhCqlAUdzZptso6OCoFQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.countdown/2.2.0/jquery.countdown.min.js" integrity="sha512-lteuRD+aUENrZPTXWFRPTBcDDxIGWe5uu0apPEn+3ZKYDwDaEErIK9rvR0QzUGmUQ55KFE2RqGTVoZsKctGMVw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <style>
            .form-otp {
                margin-right: 12px
            }

            .form-otp:focus {
                color: #495057;
                background-color: #fff;
                border-color: #ff8880;
                outline: 0;
                box-shadow: none
            }
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
        <nav class="navbar navbar-expand-lg navbar-light sticky-top bg-custom">
            <div class="container-fluid">
                <a class="navbar-brand" href="javascript:void();">
                    <img src="<?php echo base_url('assets/images/systems/' . $this->bodo->Sys('logo')); ?>" title="" alt="Festival Sertifikasiku"/>
                </a>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    </ul>
                </div>

                <div class="text-right">
                    <button type="button" class="btn btn-custom ms-2" data-bs-toggle="modal" data-bs-target="#modal_login">Masuk</button>

                </div>
            </div>
        </nav>
        <section id="main_webinar" class="clearfix main_webinar">

            <div class="container">
                
            </div>

        </section>

        <div class="modal fade" id="modal_login" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="mb-2" style="float: right;">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="close_login()"></button>    
                        </div>

                        <div id="form_mail">
                            <div class="text-center my-4">
                                <img class="img-fluid" src="<?php echo base_url('assets/images/a9b7f6aefbae556e99a8f5ffbea66844.png'); ?>" alt="login-img" style="width:50%;"/>
                            </div>
                            <div class="form-floating input-group">
                                <input id="mailtxt" name="mailtxt" type="email" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" autocomplete="off">
                                <label for="mailtxt">Email address</label>
<!--                                <span class="input-group-text" id="inputGroup-sizing-lg" onclick="send_otp()" style="cursor:pointer;">SEND OTP</span>-->
                            </div>
                            <div class="form-group">
                                <span id="err_msg" class="text-danger"></span>
                            </div>
                            <div class="clearfix my-4"></div>
                            <div class="form-group text-center">
                                <button type="button" class="btn btn-default send_otp" onclick="send_otp()">Selanjutnya</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
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
                var mailtxt = $('input[name="mailtxt"]').val();
                document.getElementById('err_msg').innerHTML = '';
                if (mailtxt !== '') {
                    $.ajax({
                        type: "GET",
                        url: "<?php echo base_url('Landing/Get_mail?email='); ?>" + mailtxt,
                        dataType: "json",
                        cache: false,
                        success: function (data) {
                            if (data.status === true) {
                                window.location.href = data.href_url;
                            } else {
                                document.getElementById('err_msg').innerHTML = 'email not registered!';
                            }
                        },
                        error: function (jqXHR) {
                            toastr.error('error ' + jqXHR.status + ' ' + jqXHR.statusText);
                        }
                    });
                } else {
                    document.getElementById('err_msg').innerHTML = 'please fill your email!';
                }
            }
            function close_login() {
                document.getElementById('err_msg').innerHTML = '';
            }
            function isNumber(b) {
                b = (b) ? b : window.event;
                var a = (b.which) ? b.which : b.keyCode;
                if (a > 31 && (a < 48 || a > 57)) {
                    return false;
                } else {
                    $(".form-otp").keyup(function () {
                        if (this.value.length === this.maxLength) {
                            $(this).next('.form-otp').focus();
                        }
                    });
                }
            }
            function verify_otp() {
                var a, b, c, d, e, otp, csrf, mail;
                a = $('input[name="otp1"]').val();
                b = $('input[name="otp2"]').val();
                c = $('input[name="otp3"]').val();
                d = $('input[name="otp4"]').val();
                e = $('input[name="otp5"]').val();
                otp = a + b + c + d + e;
                csrf = $('input[name="bodo_csrf_token"]').val();
                mail = $('input[name="mailtxt"]').val();
                var dataString = {
                    otp_code: otp,
                    bodo_csrf_token: csrf,
                    mail_user: mail
                };
                if (a !== '' && b !== '' && c !== '' && d !== '' && e !== '') {
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
