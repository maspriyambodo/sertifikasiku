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
        <link href="<?php echo base_url('assets/plugins/global/fonts/galano/style.css'); ?>" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.mb.YTPlayer/3.3.9/css/jquery.mb.YTPlayer.min.css" integrity="sha512-+HWFHCZZfMe4XQRKS0bOzQ1r4+G2eknhMqP+FhFIkcmWPJlB4uFaIagSIRCKDOZI3IHc0t7z4+N/g2hIaO/JIw==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.1/css/bootstrap.min.css" integrity="sha512-6KY5s6UI5J7SVYuZB4S/CZMyPylqyyNZco376NM2Z8Sb8OxEdp02e1jkKk/wZxIEmjQ6DRCEBhni+gpr9c4tvA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css" integrity="sha512-6S2HWzVFxruDlZxI3sXOZZ4/eJ8AcxkQH1+JjSe/ONCEqR9L4Ysq5JdT5ipqtzU7WHalNwzwBv+iE51gNHJNqQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="<?php echo base_url('assets/streaming.css'); ?>"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.7/sweetalert2.min.css" integrity="sha512-cyIcYOviYhF0bHIhzXWJQ/7xnaBuIIOecYoPZBgJHQKFPo+TOBA+BY1EnTpmM8yKDU4ZdI3UGccNGCEUdfbBqw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <style>
            .dropdown-menu[data-bs-popper]{
                left:-66px !important;
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light sticky-top bg-custom">
            <div class="container-fluid">
                <a class="navbar-brand" href="javascript:void();">
                    <img src="<?php echo base_url('assets/images/systems/' . $this->bodo->Sys('logo')); ?>" title="" alt="Festival Sertifikasiku" style="width:50%;"/>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" style="float:right;position:inherit;padding:1px;">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0 d-lg-none">
                        <?php
                        if (Dekrip($this->session->userdata('role_id')) == 1 or Dekrip($this->session->userdata('role_id')) == 2) {
                            echo '<li class="nav-item">'
                            . '<a class="nav-link" href="javascript:absensi();">Absensi</a>'
                            . '</li>';
                            if ($this->bodo->Sys('login_member') == 0) {
                                echo '<li class="nav-item">'
                                . '<a class="nav-link" href="javascript:enable_login();">Enable Login</a>'
                                . '</li>';
                            } else {
                                echo '<li class="nav-item">'
                                . '<a class="nav-link" href="javascript:disable_login();">Disable Login</a>'
                                . '</li>';
                            }
                        } else {
                            null;
                        }
                        ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                hi, <?php echo $this->session->userdata('fullname'); ?>
                            </a>
                            <ul class="dropdown-menu fade" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="<?php echo base_url('Setting%20Profile'); ?>" target="new">Profile</a></li>
                                <li><a class="dropdown-item" href="<?php echo base_url('Auth/Logout/'); ?>">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>

                <div class="collapse navbar-collapse" style="margin-right:3%;">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <?php
                        if (Dekrip($this->session->userdata('role_id')) == 1 or Dekrip($this->session->userdata('role_id')) == 2) {
                            echo '<li class="nav-item">'
                            . '<a class="nav-link btn btn-light" href="javascript:absensi();">Absensi</a>'
                            . '</li>';
                            if ($this->bodo->Sys('login_member') == 0) {
                                echo '<li id="login_control" class="nav-item mx-3">'
                                . '<a class="nav-link btn btn-light" href="javascript:enable_login();">Enable Login</a>'
                                . '</li>';
                            } else {
                                echo '<li id="login_control" class="nav-item mx-3">'
                                . '<a class="nav-link btn btn-light" href="javascript:disable_login();">Disable Login</a>'
                                . '</li>';
                            }
                        } else {
                            null;
                        }
                        ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle btn btn-light" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                hi, <?php echo $this->session->userdata('fullname'); ?>
                            </a>
                            <ul class="dropdown-menu fade" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="<?php echo base_url('Setting%20Profile'); ?>" target="new">Profile</a></li>
                                <li><a class="dropdown-item" href="<?php echo base_url('Auth/Logout/'); ?>">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <?php
        echo '<input type="hidden" name="role_name" value="' . $this->session->userdata('role_name') . '"/>';
        echo '<input type="hidden" name="url_video" value="' . $materi[0]->link_video . '"/>';
        echo '<input type="hidden" name="id_materi" value="' . $materi[0]->id_materi . '"/>';
        echo '<input type="hidden" name="id_sesi" value="' . $materi[0]->id_sesi . '"/>';
        echo '<input type="hidden" name="nama_materi" value="' . $materi[0]->nama_materi . '"/>';
        echo '<input type="hidden" name="deskripsi" value="' . $materi[0]->deskripsi . '"/>';
        echo '<input type="hidden" name="tgl_start" value="' . date('Y-m-d', strtotime($materi[0]->time_start)) . '"/>';
        echo '<input type="hidden" name="jam_start" value="' . date('H:i', strtotime($materi[0]->time_start)) . '"/>';
        echo '<input type="hidden" name="tgl_stop" value="' . date('Y-m-d', strtotime($materi[0]->time_stop)) . '"/>';
        echo '<input type="hidden" name="jam_stop" value="' . date('H:i', strtotime($materi[0]->time_stop)) . '"/>';
        echo '<input type="hidden" name="nama_sesi" value="' . date('H:i', strtotime($materi[0]->nama_sesi)) . '"/>';
        echo '<input type="hidden" name="fullname" value="' . $this->session->userdata('fullname') . '"/>';
        ?>
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
                                                    <a href="javascript:void(0);" class="text-white font-size-h6" style="text-decoration:none;font-size:14px;"><?php echo $txtchat->fullname; ?> </a>
                                                    <span class="font-size-md"><i class="fas fa-crown text-warning" style="font-size:13px;"></i></span>
                                                </div>
                                                <?php
                                                if ($this->session->userdata('role_name') === 'Super User' or $this->session->userdata('role_name') === 'Administrator') {
                                                    echo '<div id="btn_control' . $txtchat->id . '" class="btn-group">'
                                                    . '<button type="button" class="btn btn-sm btn-default" value="' . $txtchat->id . '" title="Kick Member" onclick="Kick_user(this.value)"><i class="fas fa-times text-danger"></i></button>'
                                                    . '<button type="button" class="btn btn-sm btn-default" value="' . $txtchat->id . '" title="Warning Member" onclick="Warning_user(this.value)"><i class="fas fa-exclamation text-warning"></i></button>'
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
                                    <?php elseif ($txtchat->role_name == 'silver' or $txtchat->role_name == 'basic') : ?>
                                        <div class="d-flex flex-column mb-5 align-items-start">
                                            <div class="d-flex align-items-center">
                                                <div class="symbol symbol-40 mr-3" title="<?php echo ucfirst($txtchat->role_name); ?> Member">
                                                    <?php echo '<img src="' . base_url('assets/images/users/' . $txtchat->pict) . '" class="rounded-circle" alt="' . $txtchat->uname . '"/>'; ?>
                                                </div>
                                                <div class="mx-2" title="<?php echo ucfirst($txtchat->role_name); ?> Member">
                                                    <a href="javascript:void(0);" class="font-size-h6" style="text-decoration:none;font-size:1.150rem;"><?php echo $txtchat->fullname; ?> </a>
                                                </div>
                                                <?php
                                                if ($this->session->userdata('role_name') === 'Super User' or $this->session->userdata('role_name') === 'Administrator') {
                                                    echo '<div id="btn_control' . $txtchat->id . '" class="btn-group">'
                                                    . '<button type="button" class="btn btn-sm btn-default" value="' . $txtchat->id . '" title="Kick Member" onclick="Kick_user(this.value)"><i class="fas fa-times text-danger"></i></button>'
                                                    . '<button type="button" class="btn btn-sm btn-default" value="' . $txtchat->id . '" title="Warning Member" onclick="Warning_user(this.value)"><i class="fas fa-exclamation text-warning"></i></button>'
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
                                    <?php else : ?>
                                        <div class="d-flex flex-column mb-5 align-items-start">
                                            <div class="d-flex align-items-center">
                                                <div class="symbol symbol-40 mr-3" title="<?php echo ucfirst($txtchat->role_name); ?> Member">
                                                    <?php echo '<img src="' . base_url('assets/images/users/' . $txtchat->pict) . '" class="rounded-circle" alt="' . $txtchat->uname . '"/>'; ?>
                                                </div>
                                                <div class="mx-2" title="<?php echo ucfirst($txtchat->role_name); ?> Member">
                                                    <a href="javascript:void(0);" class="font-size-h6" style="text-decoration:none;font-size:1.150rem;"><?php echo $txtchat->fullname; ?> </a>
                                                </div>
                                                <?php
                                                if ($this->session->userdata('role_name') === 'Super User' or $this->session->userdata('role_name') === 'Administrator') {
                                                    echo '<div id="btn_control' . $txtchat->id . '" class="btn-group">'
                                                    . '<button type="button" class="btn btn-sm btn-default" value="' . $txtchat->id . '" title="Kick Member" onclick="Kick_user(this.value)"><i class="fas fa-times text-danger"></i></button>'
                                                    . '<button type="button" class="btn btn-sm btn-default" value="' . $txtchat->id . '" title="Warning Member" onclick="Warning_user(this.value)"><i class="fas fa-exclamation text-warning"></i></button>'
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
                            <h4 class="text-white" style="font-family: 'Galano Grotesque Alt Bold';">
                                <?php echo $materi[0]->nama_materi; ?>
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="pb-4">
                    <img class="img-fluid" src="<?php echo base_url('assets/images/51e9abcdaf16d7b14b64edf201d39993.png'); ?>" alt=""/>
                    <div class="clearfix my-4"></div>
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
                                                    <a href="javascript:void(0);" class="text-white font-size-h6" style="text-decoration:none;font-size:14px;"><?php echo $txtchat2->fullname; ?> </a>
                                                    <span class="font-size-md"><i class="fas fa-crown text-warning" style="font-size:14px;"></i></span>
                                                </div>
                                                <?php
                                                if ($this->session->userdata('role_name') === 'Super User' or $this->session->userdata('role_name') === 'Administrator') {
                                                    echo '<div id="btn_control' . $txtchat2->id . '" class="btn-group">'
                                                    . '<button type="button" class="btn btn-sm btn-default" value="' . $txtchat2->id . '" title="Kick Member" onclick="Kick_user(this.value)"><i class="fas fa-times text-danger"></i></button>'
                                                    . '<button type="button" class="btn btn-sm btn-default" value="' . $txtchat2->id . '" title="Warning Member" onclick="Warning_user(this.value)"><i class="fas fa-exclamation text-warning"></i></button>'
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
                                    <?php elseif ($txtchat2->role_name == 'silver' or $txtchat2->role_name == 'basic') : ?>
                                        <div class="d-flex flex-column mb-5 align-items-start">
                                            <div class="d-flex align-items-center">
                                                <div class="symbol symbol-40 mr-3" title="Silver Member">
                                                    <img class="rounded-circle" alt="<?php echo $txtchat2->uname; ?>" src="<?php echo base_url('assets/images/users/' . $txtchat2->pict); ?>">
                                                </div>
                                                <div class="mx-2" title="Silver Member">
                                                    <a href="javascript:void(0);" class="font-size-h6" style="text-decoration:none;font-size:1.150rem;"><?php echo $txtchat2->fullname; ?> </a>
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
                                    <?php else : ?>
                                        <div class="d-flex flex-column mb-5 align-items-start">
                                            <div class="d-flex align-items-center">
                                                <div class="symbol symbol-40 mr-3" title="Silver Member">
                                                    <img class="rounded-circle" alt="<?php echo $txtchat2->uname; ?>" src="<?php echo base_url('assets/images/users/' . $txtchat2->pict); ?>">
                                                </div>
                                                <div class="mx-2" title="Silver Member">
                                                    <a href="javascript:void(0);" class="font-size-h6" style="text-decoration:none;font-size:1.150rem;"><?php echo $txtchat2->fullname; ?> </a>
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.1/js/bootstrap.min.js" integrity="sha512-ewfXo9Gq53e1q1+WDTjaHAGZ8UvCWq0eXONhwDuIoaH8xz2r96uoAYaQCm1oQhnBfRXrvJztNXFsTloJfgbL5Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-migrate/3.3.2/jquery-migrate.min.js" integrity="sha512-3fMsI1vtU2e/tVxZORSEeuMhXnT9By80xlmXlsOku7hNwZSHJjwcOBpmy+uu+fyWwGCLkMvdVbHkeoXdAzBv+w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mb.YTPlayer/3.3.9/jquery.mb.YTPlayer.min.js" integrity="sha512-rVFx7vXgVV8cmgG7RsZNQ68CNBZ7GL3xTYl6GAVgl3iQiSwtuDjTeE1GESgPSCwkEn/ijFJyslZ1uzbN3smwYg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js" integrity="sha512-lbwH47l/tPXJYG9AcFNoJaTMhGvYWhVM9YI43CT+uteTRRaiLCui8snIgyAN8XWgNjNhCqlAUdzZptso6OCoFQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="<?php echo base_url('node_modules/socket.io-client/dist/socket.io.min.js'); ?>" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.7/sweetalert2.all.js" integrity="sha512-wT0KEfF13tBeZVQN9MgyrOPpcazX2XUxLl11DuFYgctVVypKlqneS3cZp37g00U0x3G+rFvpaGtGs7JP3GTSIQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
            var socket = io.connect('https://live-chat.mycapturer.com');
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
                socket.on('new_message', function (data) {
                    var role_user = $('input[name="role_name"]').val();
                    var btn_admin = '<button type="button" class="btn btn-sm btn-default" value="' + data.chat_id + '" title="Kick Member ' + data.username + '" onclick="Kick_user(this.value)"><i class="fas fa-times text-danger"></i></button>'
                            + '<button type="button" class="btn btn-sm btn-default" value="' + data.chat_id + '" title="Warning Member ' + data.username + '" onclick="Warning_user(this.value)"><i class="fas fa-exclamation text-warning"></i></button>';
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
                                + '<a href="javascript:void(0);" class="text-white font-size-h6" style="text-decoration:none;">' + data.fullname + ' </a>'
                                + '<span class="font-size-sm"><i class="fas fa-crown text-warning"></i></span>'
                                + '</div>'
                                + '<div id="btn_control' + data.chat_id + '" class="btn-group"></div>'
                                + '</div>'
                                + '<div class="mt-2 p-5 bg-light-success font-size-lg text-left wrap-chat"> ' + data.msgtxt + ' </div>'
                                + '</div>';
                        $('#msg_dir').append(txt2);
                        $('#msg_dir2').append(txt2);
                    } else if (data.name_role === 'silver' || data.name_role === 'basic') {
                        var txt3 = '<div class="d-flex flex-column mb-5 align-items-start">'
                                + '<div class="d-flex align-items-center">'
                                + '<div class="symbol symbol-40 mr-3" title="' + data.name_role + ' member">'
                                + '<img src="' + data.avatar + '" class="rounded-circle" alt="' + data.username + '">'
                                + '</div>'
                                + '<div class="mx-2" title="' + data.name_role + ' member">'
                                + '<a href="javascript:void(0);" class="font-size-h6" style="text-decoration:none;">' + data.fullname + ' </a>'
                                + '</div>'
                                + '<div id="btn_control' + data.chat_id + '" class="btn-group"></div>'
                                + '</div>'
                                + '<div class="mt-2 p-5 bg-light text-dark-50 font-weight-bold font-size-lg text-left wrap-chat"> ' + data.msgtxt + ' </div>'
                                + '</div>';
                        $('#msg_dir').append(txt3);
                        $('#msg_dir2').append(txt3);
                    } else {
                        var txt3 = '<div class="d-flex flex-column mb-5 align-items-start">'
                                + '<div class="d-flex align-items-center">'
                                + '<div class="symbol symbol-40 mr-3" title="' + data.name_role + ' member">'
                                + '<img src="' + data.avatar + '" class="rounded-circle" alt="' + data.username + '">'
                                + '</div>'
                                + '<div class="mx-2" title="' + data.name_role + ' member">'
                                + '<a href="javascript:void(0);" class="font-size-h6" style="text-decoration:none;">' + data.fullname + ' </a>'
                                + '</div>'
                                + '<div id="btn_control' + data.chat_id + '" class="btn-group"></div>'
                                + '</div>'
                                + '<div class="mt-2 p-5 bg-light text-dark-50 font-weight-bold font-size-lg text-left wrap-chat"> ' + data.msgtxt + ' </div>'
                                + '</div>';
                        $('#msg_dir').append(txt3);
                        $('#msg_dir2').append(txt3);
                    }
                    if (role_user === 'Super User' || role_user === 'Administrator') {
                        $('#btn_control' + data.chat_id).append(btn_admin);
                    } else {
                        null;
                    }
                    $('#msg_dir').animate({
                        scrollTop: $('#msg_dir').get(0).scrollHeight
                    });
                    $('#scroll-pull').animate({
                        scrollTop: $('#scroll-pull').get(0).scrollHeight
                    });
                });
                socket.on('absensi', function (data) {
                    var id_materi = $('input[name="id_materi"]').val();
                    var fullname = $('input[name="fullname"]').val();
                    $.ajax({
                        type: "GET",
                        url: "<?php echo base_url('Streaming/absensi?id_materi='); ?>" + id_materi,
                        dataType: "json",
                        cache: false,
                        success: function (data) {

                        }
                    });
                    Swal.fire({
                        title: 'Absensi',
                        html: 'Halo, <b>' + fullname + '</b>, terimakasih telah mengikuti Digital Marketing Certification.',
                        icon: 'info',
                        confirmButtonText: 'OK',
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        allowEnterKey: true
                    }).then((result) => {
                        $('#main_webinar').empty();
                        $('.second_webinar').empty();
                        $('#chat_on_mobile').empty();
                        $('#kt_chat_modol').empty();
                        window.location.href = "<?php echo base_url('Auth/Logout/'); ?>";
                    });
                });
                socket.on('<?php echo base64_encode($this->session->userdata('uname')); ?>', function (data) {
                    if (data.category === 1) {
                        Swal.fire({
                            title: 'Alert!',
                            text: 'Anda mendapatkan hukuman karena telah melanggar peraturan!',
                            icon: 'error',
                            confirmButtonText: 'TUTUP',
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                            allowEnterKey: true
                        }).then((result) => {
                            $('#main_webinar').empty();
                            $('.second_webinar').empty();
                            $('#chat_on_mobile').empty();
                            $('#kt_chat_modol').empty();
                            window.location.href = "<?php echo base_url('Streaming/punishment/'); ?>";
                        });
                    } else {
                        Swal.fire({
                            title: 'Warning!',
                            text: 'Anda mendapatkan peringatan karena telah melanggar peraturan!',
                            icon: 'warning',
                            confirmButtonText: 'TUTUP',
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                            allowEnterKey: true
                        });
                    }
                });
                document.getElementById("bgndVideo").addEventListener("contextmenu", function (event) {
                    event.preventDefault();
                    event.stopPropagation();
                });
                $("#bgndVideo").YTPlayer({
                    videoURL: $('input[name=url_video]').val(),
                    containment: 'self',
                    autoPlay: true,
                    mute: false,
                    startAt: 0,
                    showControls: true,
                    useOnMobile: true,
                    vol: 100,
                    opacity: 1,
                    optimizeDisplay: false,
                    loop: false,
                    showYTLogo: false,
                    remember_last_time: false,
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
                            message: msgtxt,
                            materi_id: $('input[name="id_materi"]').val()
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

                                    socket.emit('new_message', {
                                        username: data.uname,
                                        fullname: data.fullname,
                                        key: data.key,
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
                            message: msgtxt,
                            materi_id: $('input[name="id_materi"]').val()
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

                                    socket.emit('new_message', {
                                        username: data.uname,
                                        fullname: data.fullname,
                                        key: data.key,
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
        </script>
    </body>
</html>
