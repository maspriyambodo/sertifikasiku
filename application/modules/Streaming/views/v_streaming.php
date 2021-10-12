<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <title><?php echo $materi[0]->nama_materi; ?></title>
        <link href="<?php echo base_url('assets/images/systems/' . $this->bodo->Sys('favico')); ?>" rel="shortcut icon"/>
        <link href="https://fonts.googleapis.com" rel="preconnect"/>
        <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin/>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;1,300;1,400&family=Poppins:wght@100;200&display=swap" rel="stylesheet"> 
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.mb.YTPlayer/3.3.9/css/jquery.mb.YTPlayer.min.css" integrity="sha512-+HWFHCZZfMe4XQRKS0bOzQ1r4+G2eknhMqP+FhFIkcmWPJlB4uFaIagSIRCKDOZI3IHc0t7z4+N/g2hIaO/JIw==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.1/css/bootstrap.min.css" integrity="sha512-6KY5s6UI5J7SVYuZB4S/CZMyPylqyyNZco376NM2Z8Sb8OxEdp02e1jkKk/wZxIEmjQ6DRCEBhni+gpr9c4tvA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css" integrity="sha512-6S2HWzVFxruDlZxI3sXOZZ4/eJ8AcxkQH1+JjSe/ONCEqR9L4Ysq5JdT5ipqtzU7WHalNwzwBv+iE51gNHJNqQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="<?php echo base_url('assets/streaming.css'); ?>"/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.1/js/bootstrap.min.js" integrity="sha512-ewfXo9Gq53e1q1+WDTjaHAGZ8UvCWq0eXONhwDuIoaH8xz2r96uoAYaQCm1oQhnBfRXrvJztNXFsTloJfgbL5Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-migrate/3.3.2/jquery-migrate.min.js" integrity="sha512-3fMsI1vtU2e/tVxZORSEeuMhXnT9By80xlmXlsOku7hNwZSHJjwcOBpmy+uu+fyWwGCLkMvdVbHkeoXdAzBv+w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mb.YTPlayer/3.3.9/jquery.mb.YTPlayer.js" integrity="sha512-QEsEUG6vCJ4YMCLGNXn9zScVK2FYKyMSntIS5s3P8h1c5kz5320OE5nij835WZqfTt3JrfyyoOTm0JhVWoqJPA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js" integrity="sha512-lbwH47l/tPXJYG9AcFNoJaTMhGvYWhVM9YI43CT+uteTRRaiLCui8snIgyAN8XWgNjNhCqlAUdzZptso6OCoFQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="<?php echo base_url('node_modules/socket.io-client/dist/socket.io.min.js'); ?>" type="text/javascript"></script>
        <style>
            .swal-overlay {
                background-color: black;
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light sticky-top bg-custom">
            <div class="container-fluid">
                <a class="navbar-brand" href="<?php echo base_url('Dashboard/'); ?>">
                    <img src="<?php echo base_url('assets/images/systems/' . $this->bodo->Sys('logo')); ?>" title="" alt="Festival Sertifikasiku"/>
                </a>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    </ul>
                </div>

                <div class="text-right">
                    <button type="button" class="btn btn-custom ms-2">Masuk</button>
                    <button type="button" class="btn btn-custom ms-2">Daftar</button>
                </div>
            </div>
        </nav>
        <input type="hidden" name="url_video"/>
        <section id="main_webinar" class="clearfix main_webinar">
            <div class="container">
                <div class="row pt-5">
                    <div class="col-lg-8 d-xs-block col-xs-12 col-12 col-md-12">
                        <div id="bgndVideo" class="player"></div>
                    </div>
                    <div class="col-lg-4 d-none d-xl-block"><!-- d-sm-none d-xl-block -->
                        <div class="card live-chat-lg">
                            <div class="card-header">
                                <div class="card-title">
                                    <div class="form-group">
                                        <i class="fas fa-comments"></i>
                                        <b>Live Chat</b>
                                    </div>
                                </div>
                            </div>
                            <div id="msg_dir" class="card-body">
                                <?php foreach ($chat as $txtchat) { ?>
                                    <?php if ($txtchat->role_name == 'Administrator' or $txtchat->role_name == 'Super User'): ?>

                                        <div class="d-flex flex-column mb-5 align-items-start">
                                            <div class="d-flex align-items-center" title="Administrator">
                                                <div class="symbol symbol-40 mr-3">
                                                    <?php echo '<img src="' . base_url('assets/images/users/' . $txtchat->pict) . '" class="rounded-circle" alt="' . $txtchat->uname . '"/>'; ?>
                                                </div>
                                                <div class="mx-2">
                                                    <a href="javascript:void(0);" class="text-danger font-weight-bold font-size-h6" style="text-decoration:none;"><?php echo $txtchat->uname; ?> </a>
                                                    <span class="font-size-sm"><i class="fas fa-user-shield text-danger"></i></span>
                                                </div>
                                            </div>
                                            <div class="mt-2 p-5 bg-danger text-white font-size-lg text-left wrap-chat">
                                                <?php echo $txtchat->msg; ?>
                                            </div>
                                        </div>

                                    <?php elseif ($txtchat->role_name == 'platinum') : ?>
                                        <div class="d-flex flex-column mb-5 align-items-start">
                                            <div class="d-flex align-items-center">
                                                <div class="symbol symbol-40 mr-3" title="Platinum Member">
                                                    <?php echo '<img src="' . base_url('assets/images/users/' . $txtchat->pict) . '" class="rounded-circle" alt="' . $txtchat->uname . '"/>'; ?>
                                                </div>
                                                <div class="mx-2 bg-dark px-2 rounded" title="Platinum Member">
                                                    <a href="javascript:void(0);" class="text-white font-size-h6" style="text-decoration:none;font-size:14px;"><?php echo $txtchat->uname; ?> </a>
                                                    <span class="font-size-md"><i class="fas fa-crown text-warning" style="font-size:13px;"></i></span>
                                                </div>
                                                <?php
                                                if ($this->session->userdata('role_name') === 'Super User' or $this->session->userdata('role_name') === 'Administrator') {
                                                    echo '<div id="btn_control' . $txtchat->id . '" class="btn-group">'
                                                    . '<button type="button" class="btn btn-sm btn-default" value="' . Enkrip($txtchat->id) . '" title="Kick Member" onclick="Kick_user(this.value)"><i class="fas fa-times text-danger"></i></button>'
                                                    . '<button type="button" class="btn btn-sm btn-default" value="' . Enkrip($txtchat->id) . '" title="Warning Member" onclick="Warning_user(this.value)"><i class="fas fa-exclamation text-warning"></i></button>'
                                                    . '</div>';
                                                } else {
                                                    null;
                                                }
                                                ?>
                                            </div>
                                            <div class="mt-2 p-5 bg-light-success font-size-lg text-left wrap-chat">
                                                <?php echo $txtchat->msg; ?>
                                            </div>
                                        </div>
                                    <?php elseif ($txtchat->role_name == 'silver') : ?>
                                        <div class="d-flex flex-column mb-5 align-items-start">
                                            <div class="d-flex align-items-center">
                                                <div class="symbol symbol-40 mr-3" title="Silver Member">
                                                    <?php echo '<img src="' . base_url('assets/images/users/' . $txtchat->pict) . '" class="rounded-circle" alt="' . $txtchat->uname . '"/>'; ?>
                                                </div>
                                                <div class="mx-2" title="Silver Member">
                                                    <a href="javascript:void(0);" class="font-size-h6" style="text-decoration:none;font-size:1.150rem;"><?php echo $txtchat->uname; ?> </a>
                                                </div>
                                                <?php
                                                if ($this->session->userdata('role_name') === 'Super User' or $this->session->userdata('role_name') === 'Administrator') {
                                                    echo '<div id="btn_control' . $txtchat->id . '" class="btn-group">'
                                                    . '<button type="button" class="btn btn-sm btn-default" value="' . Enkrip($txtchat->id) . '" title="Kick Member" onclick="Kick_user(this.value)"><i class="fas fa-times text-danger"></i></button>'
                                                    . '<button type="button" class="btn btn-sm btn-default" value="' . Enkrip($txtchat->id) . '" title="Warning Member" onclick="Warning_user(this.value)"><i class="fas fa-exclamation text-warning"></i></button>'
                                                    . '</div>';
                                                } else {
                                                    null;
                                                }
                                                ?>
                                            </div>
                                            <div class="mt-2 p-5 bg-light text-dark-50 font-weight-bold font-size-lg text-left wrap-chat">
                                                <?php echo $txtchat->msg; ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                <?php } ?>
                            </div>
                            <div class="card-footer input-group mb-3 chat_footer">
                                <input type="text" class="form-control" name="msgtxt" autocomplete="off" onkeypress="Javascript: if (event.keyCode === 13)
                                            Send_chat(1);">
                                <button type="button" class="input-group-text" onclick="Send_chat(1)"><i class="fas fa-paper-plane"></i></button>                             
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
                            <img src="http://kenwheeler.github.io/slick/img/fonz1.png" class="img-fluid" width="100"/>
                        </div>
                        <div>
                            <img src="http://kenwheeler.github.io/slick/img/fonz2.png" class="img-fluid" width="100"/>
                        </div>
                        <div>
                            <img src="http://kenwheeler.github.io/slick/img/fonz3.png" class="img-fluid" width="100"/>
                        </div>
                        <div>
                            <img src="http://kenwheeler.github.io/slick/img/fonz1.png" class="img-fluid" width="100"/>
                        </div>
                        <div>
                            <img src="http://kenwheeler.github.io/slick/img/fonz2.png" class="img-fluid" width="100"/>
                        </div>
                        <div>
                            <img src="http://kenwheeler.github.io/slick/img/fonz3.png" class="img-fluid" width="100"/>
                        </div>
                        <div>
                            <img src="http://kenwheeler.github.io/slick/img/fonz1.png" class="img-fluid" width="100"/>
                        </div>
                        <div>
                            <img src="http://kenwheeler.github.io/slick/img/fonz2.png" class="img-fluid" width="100"/>
                        </div>
                        <div>
                            <img src="http://kenwheeler.github.io/slick/img/fonz3.png" class="img-fluid" width="100"/>
                        </div>
                        <div>
                            <img src="http://kenwheeler.github.io/slick/img/fonz1.png" class="img-fluid" width="100"/>
                        </div>
                        <div>
                            <img src="http://kenwheeler.github.io/slick/img/fonz2.png" class="img-fluid" width="100"/>
                        </div>
                        <div>
                            <img src="http://kenwheeler.github.io/slick/img/fonz3.png" class="img-fluid" width="100"/>
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
                            <div id="msg_dir2" class="messages">

                                <?php foreach ($chat as $txtchat2) { ?>
                                    <?php if ($txtchat2->role_name == 'Administrator' or $txtchat2->role_name == 'Super User'): ?>
                                        <div class="d-flex flex-column mb-5 align-items-start">
                                            <div class="d-flex align-items-center" title="Administrator">
                                                <div class="symbol symbol-40 mr-3">
                                                    <img class="rounded-circle" alt="<?php echo $txtchat2->uname; ?>" src="<?php echo base_url('assets/images/users/' . $txtchat2->pict); ?>">
                                                </div>
                                                <div class="mx-2">
                                                    <a href="javascript:void(0);" class="text-danger font-weight-bold font-size-h6" style="text-decoration:none;"><?php echo $txtchat2->uname; ?> </a>
                                                    <span class="text-muted font-size-sm"><i class="fas fa-user-shield text-danger"></i></span>
                                                </div>
                                            </div>
                                            <div class="mt-2 p-5 bg-danger text-white font-size-lg text-left wrap-chat">
                                                <?php echo $txtchat2->msg; ?>
                                            </div>
                                        </div>
                                    <?php elseif ($txtchat2->role_name == 'platinum') : ?>
                                        <div class="d-flex flex-column mb-5 align-items-start">
                                            <div class="d-flex align-items-center">
                                                <div class="symbol symbol-40 mr-3" title="Platinum Member">
                                                    <img class="rounded-circle" alt="<?php echo $txtchat2->uname; ?>" src="<?php echo base_url('assets/images/users/' . $txtchat2->pict); ?>">
                                                </div>
                                                <div class="mx-2 bg-dark px-2 rounded" title="Platinum Member">
                                                    <a href="javascript:void(0);" class="text-white font-size-h6" style="text-decoration:none;font-size:14px;"><?php echo $txtchat2->uname; ?> </a>
                                                    <span class="font-size-md"><i class="fas fa-crown text-warning" style="font-size:14px;"></i></span>
                                                </div>
                                                <?php
                                                if ($this->session->userdata('role_name') === 'Super User' or $this->session->userdata('role_name') === 'Administrator') {
                                                    echo '<div id="btn_control' . $txtchat2->id . '" class="btn-group">'
                                                    . '<button type="button" class="btn btn-sm btn-default" value="' . Enkrip($txtchat2->id) . '" title="Kick Member" onclick="Kick_user(this.value)"><i class="fas fa-times text-danger"></i></button>'
                                                    . '<button type="button" class="btn btn-sm btn-default" value="' . Enkrip($txtchat2->id) . '" title="Warning Member" onclick="Warning_user(this.value)"><i class="fas fa-exclamation text-warning"></i></button>'
                                                    . '</div>';
                                                } else {
                                                    null;
                                                }
                                                ?>
                                            </div>
                                            <div class="mt-2 p-5 bg-light-success font-size-lg text-left wrap-chat">
                                                <?php echo $txtchat2->msg; ?>
                                            </div>
                                        </div>
                                    <?php elseif ($txtchat2->role_name == 'silver') : ?>
                                        <div class="d-flex flex-column mb-5 align-items-start">
                                            <div class="d-flex align-items-center">
                                                <div class="symbol symbol-40 mr-3" title="Silver Member">
                                                    <img class="rounded-circle" alt="<?php echo $txtchat2->uname; ?>" src="<?php echo base_url('assets/images/users/' . $txtchat2->pict); ?>">
                                                </div>
                                                <div class="mx-2" title="Silver Member">
                                                    <a href="javascript:void(0);" class="font-size-h6" style="text-decoration:none;font-size:1.150rem;"><?php echo $txtchat2->uname; ?> </a>
                                                </div>
                                                <?php
                                                if ($this->session->userdata('role_name') === 'Super User' or $this->session->userdata('role_name') === 'Administrator') {
                                                    echo '<div id="btn_control' . $txtchat2->id . '" class="btn-group">'
                                                    . '<button type="button" class="btn btn-sm btn-default" value="' . Enkrip($txtchat2->id) . '" title="Kick Member" onclick="Kick_user(this.value)"><i class="fas fa-times text-danger"></i></button>'
                                                    . '<button type="button" class="btn btn-sm btn-default" value="' . Enkrip($txtchat2->id) . '" title="Warning Member" onclick="Warning_user(this.value)"><i class="fas fa-exclamation text-warning"></i></button>'
                                                    . '</div>';
                                                } else {
                                                    null;
                                                }
                                                ?>
                                            </div>
                                            <div class="mt-2 p-5 bg-light text-dark-50 font-weight-bold font-size-lg text-left wrap-chat">
                                                <?php echo $txtchat2->msg; ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                <?php } ?>

                            </div>
                            <!--end::Messages-->
                        </div>
                    </div>
                    <div class="card-footer align-items-center">
                        <!--begin::Compose-->
                        <textarea name="msgtxt2" class="form-control border-0 p-0" rows="4" placeholder="Type a message" onkeypress="Javascript: if (event.keyCode === 13)
                                    Send_chat(2);"></textarea>
                        <div class="d-flex align-items-center justify-content-between mt-2">
                            <div class="mr-3"></div>
                            <div>
                                <button type="button" class="btn btn-primary text-uppercase font-weight-bold chat-send py-2 px-6" onclick="Send_chat(2)">Send</button>
                                <button type="button" class="btn btn-secondary text-uppercase font-weight-bold chat-send py-2 px-6" data-bs-dismiss="modal" aria-label="Close">Close</button>
                            </div>
                        </div>
                        <!--begin::Compose-->
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
                socket.on('<?php echo base64_encode($this->session->userdata('uname')); ?>', function (data) {
                    swal("makanya jangan ngomong jorok goblok!", {
                        buttons: ["TUTUP", false]
                    }).then((value) => {
                        window.location.href = '<?php echo base_url('Auth/Logout'); ?>';
                    });
                });
                document.getElementById("bgndVideo").addEventListener("contextmenu", function (event) {
                    event.preventDefault();
                    event.stopPropagation();
                });
                $("#bgndVideo").YTPlayer({
                    videoURL: '<?php echo $materi[0]->link_video; ?>',
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
                            url: "<?php echo base_url('Streaming/Chat_send/'); ?>",
                            data: dataString,
                            dataType: "json",
                            cache: false,
                            success: function (data) {
                                $('input[name="msgtxt"]').val('');
                                if (data.block_chat === true) {
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
                            url: "<?php echo base_url('Streaming/Chat_send/'); ?>",
                            data: dataString,
                            dataType: "json",
                            cache: false,
                            success: function (data) {
                                $('textarea[name="msgtxt2"]').val('');
                                if (data.block_chat === true) {
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
                    url: "<?php echo base_url('Streaming/Get_detail?token='); ?>" + id_chat,
                    dataType: "json",
                    cache: false,
                    success: function (data) {
                        if (data.success === true) {
                            var socket = io.connect('https://live-chat.mycapturer.com');
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
                            toastr.error('error while getting user data!');
                        }
                    },
                    error: function (jqXHR) {
                        toastr.error('error ' + jqXHR.status + ' ' + jqXHR.statusText);
                    }
                });
            }
            function Warning_user(id_chat) {

            }
        </script>
    </body>
</html>
