<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Festival Sertifikasiku</title>
    <link href="<?php echo base_url('assets/images/systems/' . $this->bodo->Sys('favico')); ?>" rel="shortcut icon" />
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;1,300;1,400&family=Poppins:wght@100;200&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.1/css/bootstrap.min.css" integrity="sha512-6KY5s6UI5J7SVYuZB4S/CZMyPylqyyNZco376NM2Z8Sb8OxEdp02e1jkKk/wZxIEmjQ6DRCEBhni+gpr9c4tvA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="<?php echo base_url('assets/streaming.css'); ?>" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.1/js/bootstrap.min.js" integrity="sha512-ewfXo9Gq53e1q1+WDTjaHAGZ8UvCWq0eXONhwDuIoaH8xz2r96uoAYaQCm1oQhnBfRXrvJztNXFsTloJfgbL5Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <style>
        #partitioned {
            padding-left: 15px;
            letter-spacing: 42px;
            border: 0;
            background-image: linear-gradient(to left, black 70%, rgba(255, 255, 255, 0) 0%);
            background-position: bottom;
            background-size: 50px 1px;
            background-repeat: repeat-x;
            background-position-x: 35px;
            width: 220px;
            min-width: 240px;
        }

        #divInner {
            left: 0;
            position: sticky;
        }

        #divOuter {
            width: 190px;
            overflow: hidden;
        }

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
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light sticky-top bg-custom">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?php echo base_url('Dashboard/'); ?>">
                <img src="<?php echo base_url('assets/images/systems/' . $this->bodo->Sys('logo')); ?>" title="" alt="Festival Sertifikasiku" />
            </a>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                </ul>
            </div>

            <div class="text-right">
                <button type="button" class="btn btn-custom ms-2" data-bs-toggle="modal" data-bs-target="#modal_login">Masuk</button>
                <button type="button" class="btn btn-custom ms-2">Daftar</button>
            </div>
        </div>
    </nav>
    <section id="main_webinar" class="clearfix main_webinar">
        <div class="container">
            <div class="row pt-5">
                <div class="col-lg-8 d-xs-block col-xs-12 col-12 col-md-12">
                    <div id="bgndVideo" class="player" style="height: 456px;background-color: black;"></div>
                </div>
                <div class="col-lg-4 d-none d-xl-block">
                    <!-- d-sm-none d-xl-block -->
                    <div class="card live-chat-lg">
                        <div class="card-header">
                            <div class="card-title">
                                <div class="form-group">
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
                        <h4 class="text-white">Judul Webinar</h4>
                    </div>
                    <p class="text-white" style="text-align: justify !important;">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                    </p>
                </div>
            </div>
        </div>
        <div class="row bg-carousel">
            <div class="col-md-2">
                <div class="form-group">
                    <p class="text-white text-center" style="margin:10% 0px;">Bekerja sama dengan:</p>
                </div>
            </div>
            <div class="col-md-10">
                <div class="sertif-carousel slick_wrap">
                    <div>
                        <img src="http://kenwheeler.github.io/slick/img/fonz1.png" class="img-fluid" width="100" />
                    </div>
                    <div>
                        <img src="http://kenwheeler.github.io/slick/img/fonz2.png" class="img-fluid" width="100" />
                    </div>
                    <div>
                        <img src="http://kenwheeler.github.io/slick/img/fonz3.png" class="img-fluid" width="100" />
                    </div>
                    <div>
                        <img src="http://kenwheeler.github.io/slick/img/fonz1.png" class="img-fluid" width="100" />
                    </div>
                    <div>
                        <img src="http://kenwheeler.github.io/slick/img/fonz2.png" class="img-fluid" width="100" />
                    </div>
                    <div>
                        <img src="http://kenwheeler.github.io/slick/img/fonz3.png" class="img-fluid" width="100" />
                    </div>
                    <div>
                        <img src="http://kenwheeler.github.io/slick/img/fonz1.png" class="img-fluid" width="100" />
                    </div>
                    <div>
                        <img src="http://kenwheeler.github.io/slick/img/fonz2.png" class="img-fluid" width="100" />
                    </div>
                    <div>
                        <img src="http://kenwheeler.github.io/slick/img/fonz3.png" class="img-fluid" width="100" />
                    </div>
                    <div>
                        <img src="http://kenwheeler.github.io/slick/img/fonz1.png" class="img-fluid" width="100" />
                    </div>
                    <div>
                        <img src="http://kenwheeler.github.io/slick/img/fonz2.png" class="img-fluid" width="100" />
                    </div>
                    <div>
                        <img src="http://kenwheeler.github.io/slick/img/fonz3.png" class="img-fluid" width="100" />
                    </div>
                </div>
            </div>
        </div>
        <div style="padding:40px 0px;"></div>
    </section>
    <section class="second_webinar">
        <div class="container">
            <div class="row">
                <div class="col-md-4 bg-info">
                    <div style="width:100%;height:300px;">
                        <div class="text-center">
                            <h4>300 x 600 px</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-2 bg-success">
                    <div style="width:100%;height:300px;">
                        <div class="text-center">
                            <h4>300 x 250 px</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">

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
    <div class="modal fade" id="modal_login" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Login Member</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="close_login()"></button>
                </div>
                <div class="modal-body">
                    <div id="form_mail">
                        <div class="form-floating input-group input-group-lg">
                            <input id="mailtxt" name="mailtxt" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                            <label for="mailtxt">Email address</label>
                            <span class="input-group-text" id="inputGroup-sizing-lg" onclick="send_otp()" style="cursor:pointer;">SEND OTP</span>
                        </div>
                        <div class="form-group">
                            <span id="err_msg" class="text-danger"></span>
                        </div>
                    </div>
                    <div id="form_otp">
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <div class="d-flex flex-row mt-5" style="margin-left: 9%;">
                                    <input id="partitioned" name="otp" type="text" class="form-control" maxlength="5" >
                                </div>
                            </div>
                            <div class="col-md-3"></div>
                        </div>
                        <div class="clearfix my-4"></div>
                        <div class="text-center">
                            <div class="text-muted">
                                Don't receive the code?
                            </div>
                            <a href="javascript:resend_code()">Resend Code</a>
                        </div>
                    </div>
                </div>
                <div class="card-footer"></div>
            </div>
        </div>
    </div>
    <script>
        window.onload = function() {
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
            document.getElementById('err_msg').innerHTML = 'please fill your email!';
            if (mailtxt) {
                $.ajax({
                    type: "GET",
                    url: "<?php echo base_url('Landing/Get_mail?email='); ?>" + mailtxt,
                    dataType: "json",
                    cache: false,
                    success: function(data) {
                        if (data.status === true) {
                            $('#form_mail').hide();
                            $('#form_otp').show();
                        } else {
                            document.getElementById('err_msg').innerHTML = 'email not registered!';
                        }
                    },
                    error: function(jqXHR) {

                    }
                });
            } else {
                document.getElementById('err_msg').innerHTML = 'please fill your email!';
            }
        }

        function send_otp() {
            var otp = $('input[name="otp"]').val();
            document.getElementById('err_msg').innerHTML = 'please fill your email!';
            if (otp) {
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('Landing/validate_otp='); ?>",
                    dataType: "json",
                    cache: false,
                    success: function(data) {
                        if (data.status === true) {
                            $('#form_mail').hide();
                            $('#form_otp').show();
                        } else {
                            document.getElementById('err_msg').innerHTML = 'email not registered!';
                        }
                    },
                    error: function(jqXHR) {

                    }
                });
            } else {
                document.getElementById('err_msg').innerHTML = 'please fill your email!';
            }
        }

        function close_login() {
            document.getElementById('err_msg').innerHTML = 'email not registered!';
        }
    </script>
    <script>
        var obj = document.getElementById('partitioned');
        obj.addEventListener('keydown', stopCarret);
        obj.addEventListener('keyup', stopCarret);

        function stopCarret() {
            if (obj.value.length > 4) {
                setCaretPosition(obj, 4);
            }
        }

        function setCaretPosition(elem, caretPos) {
            if (elem != null) {
                if (elem.createTextRange) {
                    var range = elem.createTextRange();
                    range.move('character', caretPos);
                    range.select();
                } else {
                    if (elem.selectionStart) {
                        elem.focus();
                        elem.setSelectionRange(caretPos, caretPos);
                    } else
                        elem.focus();
                }
            }
        }
    </script>
</body>

</html>