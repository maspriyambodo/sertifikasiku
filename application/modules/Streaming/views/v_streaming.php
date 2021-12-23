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
        <link href="<?php echo base_url('vendor/jquery.mb.YTPlayer/dist/css/jquery.mb.YTPlayer.min.css'); ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url('vendor/twbs/bootstrap/dist/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css" integrity="sha512-6S2HWzVFxruDlZxI3sXOZZ4/eJ8AcxkQH1+JjSe/ONCEqR9L4Ysq5JdT5ipqtzU7WHalNwzwBv+iE51gNHJNqQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="<?php echo base_url('assets/streaming.css'); ?>"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.7/sweetalert2.min.css" integrity="sha512-cyIcYOviYhF0bHIhzXWJQ/7xnaBuIIOecYoPZBgJHQKFPo+TOBA+BY1EnTpmM8yKDU4ZdI3UGccNGCEUdfbBqw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" integrity="sha512-c42qTSw/wPZ3/5LBzD+Bw5f7bSF2oxou6wEb+I/lqeaKV5FDIfMvvRp772y4jcJLKuGUOpbJMdg/BTl50fJYAw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <body oncontextmenu="return false">
        <nav class="navbar navbar-expand-lg navbar-light fixed-top bg-custom">
            <div class="container-fluid">
                <a class="navbar-brand" href="javascript:void();">
                    <?php
                    echo '<img class="img-thumbnail" src="' . base_url('assets/images/systems/' . $this->bodo->Sys('logo')) . '" alt="Sertifikasiku logo" style="max-width:115px;"/>';
                    ?>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" style="float:right;position:inherit;padding:1px;">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0 d-lg-none">
                        <?php
                        if (Dekrip($this->session->userdata('role_id')) == 1 or Dekrip($this->session->userdata('role_id')) == 2) {
                            if ($this->bodo->Sys('absensi_member') == 0) {
                                echo '<li id="absensi_control1" class="nav-item">'
                                . '<a class="nav-link" href="javascript:enable_absensi();">Enable Absensi</a>'
                                . '</li>';
                            } else {
                                echo '<li id="absensi_control1" class="nav-item">'
                                . '<a class="nav-link" href="javascript:disable_absensi();">Disable Absensi</a>'
                                . '</li>';
                            }
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
                            echo '<li class="nav-item">'
                            . '<a class="nav-link" href="javascript:absensi_member();">Absensi</a>'
                            . '</li>';
                        }
                        ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <?php
                                if (empty($this->session->userdata('fullname'))) {
                                    $nickname = explode('@', $this->session->userdata('uname'));
                                    echo 'hi, ' . $nickname[0];
                                } else {
                                    echo 'hi, ' . $this->session->userdata('fullname');
                                }
                                ?>
                            </a>
                            <ul class="dropdown-menu fade" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="<?php echo base_url('Dashboard/'); ?>" target="new">Dashboard</a></li>
                                <li><a class="dropdown-item" href="<?php echo base_url('Setting%20Profile'); ?>" target="new">Profile</a></li>
                                <?php
                                if (Dekrip($this->session->userdata('role_id')) == 1 or Dekrip($this->session->userdata('role_id')) == 2) {
                                    echo '<li><a class="dropdown-item" href="' . base_url('Dashboard/') . '" target="new">Dashboard</a></li>';
                                    echo '<li><a class="dropdown-item" href="javascript:clear_login();">Clear Login</a></li>';
                                } else {
                                    null;
                                }
                                ?>
                                <li><a class="dropdown-item" href="<?php echo base_url('Auth/Logout/'); ?>">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>

                <div class="collapse navbar-collapse" style="margin-right:3%;">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <?php
                        if (Dekrip($this->session->userdata('role_id')) == 1 or Dekrip($this->session->userdata('role_id')) == 2) {
                            if ($this->bodo->Sys('absensi_member') == 0) {
                                echo '<li id="absensi_control2" class="nav-item">'
                                . '<a class="nav-link btn btn-light" href="javascript:enable_absensi();" style="color:#214980 !important;">Enable Absensi</a>'
                                . '</li>';
                            } else {
                                echo '<li id="absensi_control2" class="nav-item">'
                                . '<a class="nav-link btn btn-light" href="javascript:disable_absensi();" style="color:#214980 !important;">Disable Absensi</a>'
                                . '</li>';
                            }
                            if ($this->bodo->Sys('login_member') == 0) {
                                echo '<li id="login_control" class="nav-item mx-3">'
                                . '<a class="nav-link btn btn-light" href="javascript:enable_login();" style="color:#214980 !important;">Enable Login</a>'
                                . '</li>';
                            } else {
                                echo '<li id="login_control" class="nav-item mx-3">'
                                . '<a class="nav-link btn btn-light" href="javascript:disable_login();" style="color:#214980 !important;">Disable Login</a>'
                                . '</li>';
                            }
                        } else {
                            echo '<li class="nav-item">'
                            . '<a class="nav-link btn btn-light" href="javascript:absensi_member();" style="color:#214980 !important;margin-right:5px;">Absensi</a>'
                            . '</li>';
                        }
                        ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle btn btn-light" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color:#214980 !important;">
                                <?php
                                if (empty($this->session->userdata('fullname'))) {
                                    echo 'hi, ' . $nickname[0];
                                } else {
                                    echo 'hi, ' . $this->session->userdata('fullname');
                                }
                                ?>
                            </a>
                            <ul class="dropdown-menu animate__fadeIn" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="<?php echo base_url('Setting%20Profile'); ?>" target="new">Profile</a></li>
                                <?php
                                if (Dekrip($this->session->userdata('role_id')) == 1 or Dekrip($this->session->userdata('role_id')) == 2) {
                                    echo '<li><a class="dropdown-item" href="' . base_url('Dashboard/') . '" target="new">Dashboard</a></li>';
                                    echo '<li><a class="dropdown-item" href="javascript:clear_login();">Clear Login</a></li>';
                                } else {
                                    null;
                                }
                                ?>
                                <li><a class="dropdown-item" href="<?php echo base_url('Auth/Logout/'); ?>">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <?php
        echo '<input type="hidden" name="is_mobile" value="' . ($this->agent->is_mobile == 1 ? 1 : 0) . '"/>';
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
        <div class="clearfix pt-5 d-xl-none"></div>
        <section id="main_webinar" class="clearfix main_webinar" style="padding-bottom:20px;" loading="lazy">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 d-xs-block col-xs-12 col-12 col-md-12">
                        <div id="height_video">
                            <div id="bgndVideo" class="player animate__fadeInLeft" data-property="{videoURL:'<?php echo $materi[0]->link_video; ?>',containment:'self',vol:50,optimizeDisplay:false,showYTLogo:false}"></div>
                            <div class="form-group text-white mt-2">
                                <span id="viewers"></span> sedang menonton
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 d-none d-xl-block"><!-- d-sm-none d-xl-block -->
                        <div id="live-chat-lg" class="card live-chat-lg animate__fadeInRight">
                            <div class="card-header">
                                <div class="card-title">
                                    <div class="form-group text-muted">
                                        <i class="fas fa-comments"></i>
                                        <b>Live Chat</b>
                                    </div>
                                </div>
                            </div>
                            <div id="msg_dir" class="card-body">
                                <?php foreach ($chat as $txtchat) { ?>
                                    <?php if ($txtchat->role_name == 'Administrator' or $txtchat->role_name == 'Super User'): ?>

                                        <div class="d-flex flex-column mb-2 align-items-start">
                                            <div class="d-flex align-items-center" title="Administrator">
                                                <div class="symbol symbol-40 mr-3">
                                                    <?php echo '<img src="' . base_url('assets/images/users/' . $txtchat->pict) . '" class="rounded-circle" alt="' . $txtchat->uname . '"/>'; ?>
                                                </div>
                                                <div class="mx-2">
                                                    <a href="javascript:void(0);" class="text-danger font-weight-normal" style="text-decoration:none;font-size:12px;"><?php echo $txtchat->fullname; ?> </a>
                                                    <span class="font-size-sm"><i class="fas fa-user-shield text-danger"></i></span>
                                                </div>
                                                <div class="tym-chat"><?php echo $txtchat->syscreatedate; ?></div>
                                            </div>
                                            <div class="p-1 bg-danger text-white text-left wrap-chat">
                                                <?php echo $txtchat->msg; ?>
                                            </div>
                                        </div>

                                    <?php elseif ($txtchat->role_name == 'platinum') : ?>
                                        <div class="d-flex flex-column mb-2 align-items-start">
                                            <div class="d-flex align-items-center">
                                                <div class="symbol symbol-40 mr-3" title="Platinum Member">
                                                    <?php echo '<img src="' . base_url('assets/images/users/' . $txtchat->pict) . '" class="rounded-circle" alt="' . $txtchat->uname . '"/>'; ?>
                                                </div>
                                                <div class="mx-2 bg-dark px-2 rounded" title="Platinum Member">
                                                    <a href="javascript:rep_chat('<?php echo $txtchat->fullname; ?>');" class="text-white font-weight-normal" style="text-decoration:none;font-size:12px;"><?php echo $txtchat->fullname; ?> </a>
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
                                                <div class="tym-chat"><?php echo $txtchat->syscreatedate; ?></div>
                                            </div>
                                            <div class="p-1 bg-light-success text-left wrap-chat">
                                                <?php echo $txtchat->msg; ?>
                                            </div>
                                        </div>
                                    <?php elseif ($txtchat->role_name == 'silver' or $txtchat->role_name == 'basic') : ?>
                                        <div class="d-flex flex-column mb-2 align-items-start">
                                            <div class="d-flex align-items-center">
                                                <div class="symbol symbol-40 mr-3" title="<?php echo ucfirst($txtchat->role_name); ?> Member">
                                                    <?php echo '<img src="' . base_url('assets/images/users/' . $txtchat->pict) . '" class="rounded-circle" alt="' . $txtchat->uname . '"/>'; ?>
                                                </div>
                                                <div class="mx-2" title="<?php echo ucfirst($txtchat->role_name); ?> Member">
                                                    <a href="javascript:rep_chat('<?php echo $txtchat->fullname; ?>');" class="font-weight-normal" style="text-decoration:none;font-size:12px;"><?php echo $txtchat->fullname; ?> </a>
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
                                                <div class="tym-chat"><?php echo $txtchat->syscreatedate; ?></div>
                                            </div>
                                            <div class="p-1 bg-light text-dark-50 font-weight-bold text-left wrap-chat">
                                                <?php echo $txtchat->msg; ?>
                                            </div>
                                        </div>
                                    <?php else : ?>
                                        <div class="d-flex flex-column mb-2 align-items-start">
                                            <div class="d-flex align-items-center">
                                                <div class="symbol symbol-40 mr-3" title="<?php echo ucfirst($txtchat->role_name); ?> Member">
                                                    <?php echo '<img src="' . base_url('assets/images/users/' . $txtchat->pict) . '" class="rounded-circle" alt="' . $txtchat->uname . '"/>'; ?>
                                                </div>
                                                <div class="mx-2" title="<?php echo ucfirst($txtchat->role_name); ?> Member">
                                                    <a href="javascript:rep_chat('<?php echo $txtchat->fullname; ?>');" class="font-weight-normal" style="text-decoration:none;font-size:12px;"><?php echo $txtchat->fullname; ?> </a>
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
                                                <div class="tym-chat"><?php echo $txtchat->syscreatedate; ?></div>
                                            </div>
                                            <div class="p-1 bg-light text-dark-50 font-weight-bold text-left wrap-chat">
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

                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">
                                    <div class="text-center">
                                        Schedule Webinar
                                    </div>
                                </div>
                            </div>
                            <div class="card-body" style="max-height:393.05px;overflow: auto;">
                                <?php
                                foreach ($dir_materi as $schedule_materi) {
                                    if ($schedule_materi->stat == 1) {
                                        $bg_schedule = ' style="background: rgba(0, 120, 254, 0.07);"';
                                    } else {
                                        $bg_schedule = null;
                                    }
                                    ?>
                                    <div class="row mb-4"<?php echo $bg_schedule; ?>>
                                        <div style="font-family: Galano Grotesque SemiBold;font-size: 12px;line-height: 14px;color: #242827;" class="col-4 col-xs-4">
                                            <div class="text-center" style="background: linear-gradient(90deg, #2C64A1 0%, #164579 51.56%, #2C64A1 100%);border-radius: 2px;min-width:1px;margin-bottom:10px;">
                                                <div style="color: #FFFFFF;text-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);font-family: Galano Grotesque SemiBold;font-size: 12px;">
                                                    <?php echo $schedule_materi->nama_segment; ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <?php echo date('d M Y', strtotime($schedule_materi->time_start)); ?>
                                                <div class="clearfix"></div>
                                                <?php echo date('H:i', strtotime($schedule_materi->time_start)) . ' - ' . date('H:i', strtotime($schedule_materi->time_stop)); ?>
                                            </div>
                                        </div>
                                        <?php
                                        if ($schedule_materi->stat_schedule == 1) {
                                            $btn_schedule = '<div class="text-center" style="float:right;">'
                                                    . '<div id="btn_reminder' . $schedule_materi->id_materi . '" style="width: 83px;background: #878787;box-shadow:0px 2px 2px rgba(0, 0, 0, 0.1);border-radius: 4px;cursor:pointer;" title="unset reminder" onclick="unset_reminder(' . $schedule_materi->id_materi . ')">'
                                                    . '<div style="font-family: Galano Grotesque Medium;font-size: 8px;line-height: 9px;color: #FFFFFF;padding:4px 0px;"><i class="fas fa-bell"></i> set reminder</div>'
                                                    . '</div>'
                                                    . '</div>';
                                        } elseif ($schedule_materi->stat_schedule == 0) {
                                            $btn_schedule = '<div class="text-center" style="float:right;">'
                                                    . '<div id="btn_reminder' . $schedule_materi->id_materi . '" style="width: 83px;background: #459CCF;box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);border-radius: 4px;cursor:pointer;" title="set reminder" onclick="set_reminder(' . $schedule_materi->id_materi . ')">'
                                                    . '<div style="font-family: Galano Grotesque Medium;font-size: 8px;line-height: 9px;color: #FFFFFF;padding:4px 0px;"><i class="fas fa-bell"></i> set reminder</div>'
                                                    . '</div>'
                                                    . '</div>';
                                        } elseif (empty($schedule_materi->stat_schedule)) {
                                            $btn_schedule = '<div class="text-center" style="float:right;">'
                                                    . '<div id="btn_reminder' . $schedule_materi->id_materi . '" style="width: 83px;background: #459CCF;box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);border-radius: 4px;cursor:pointer;" title="set reminder" onclick="set_reminder(' . $schedule_materi->id_materi . ')">'
                                                    . '<div style="font-family: Galano Grotesque Medium;font-size: 8px;line-height: 9px;color: #FFFFFF;padding:4px 0px;"><i class="fas fa-bell"></i> set reminder</div>'
                                                    . '</div>'
                                                    . '</div>';
                                        }

                                        if ($schedule_materi->stat == 1) {
                                            echo '<div style="font-family: Galano Grotesque Medium;font-size: 12px;line-height: 14px;color: #242827;" class="col-8 col-xs-8">'
                                            . '<div class="form-group">'
                                            . $schedule_materi->narasumber
                                            . '</div>'
                                            . '<div style="font-family: Galano Grotesque Regular;font-size: 12px;line-height: 14px;color: #242827;flex: none;order: 1;flex-grow: 0;margin: 2px 0px;">'
                                            . $schedule_materi->nama_materi
                                            . '</div>'
                                            . '</div>';
                                        } else {
                                            echo '<div style="font-family: Galano Grotesque Medium;font-size: 12px;line-height: 14px;color: #242827;" class="col-8 col-xs-8">'
                                            . $btn_schedule
                                            . '<div class="form-group">'
                                            . $schedule_materi->narasumber
                                            . '</div>'
                                            . '<div style="font-family: Galano Grotesque Regular;font-size: 12px;line-height: 14px;color: #242827;flex: none;order: 1;flex-grow: 0;margin: 2px 0px;">'
                                            . $schedule_materi->nama_materi
                                            . '</div>'
                                            . '</div>';
                                        }
                                        ?>
                                    </div>
                                <?php } ?>

                            </div>
                        </div>

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
        <script src="<?php echo base_url('vendor/twbs/bootstrap/dist/js/bootstrap.min.js'); ?>" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-migrate/3.3.2/jquery-migrate.min.js" integrity="sha512-3fMsI1vtU2e/tVxZORSEeuMhXnT9By80xlmXlsOku7hNwZSHJjwcOBpmy+uu+fyWwGCLkMvdVbHkeoXdAzBv+w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="<?php echo base_url('vendor/jquery.mb.YTPlayer/dist/jquery.mb.YTPlayer.js'); ?>" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js" integrity="sha512-lbwH47l/tPXJYG9AcFNoJaTMhGvYWhVM9YI43CT+uteTRRaiLCui8snIgyAN8XWgNjNhCqlAUdzZptso6OCoFQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="<?php echo base_url('node_modules/socket.io-client/dist/socket.io.min.js'); ?>" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.7/sweetalert2.all.js" integrity="sha512-wT0KEfF13tBeZVQN9MgyrOPpcazX2XUxLl11DuFYgctVVypKlqneS3cZp37g00U0x3G+rFvpaGtGs7JP3GTSIQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js" integrity="sha512-USPCA7jmJHlCNRSFwUFq3lAm9SaOjwG8TaB8riqx3i/dAJqhaYilVnaf2eVUH5zjq89BU6YguUuAno+jpRvUqA==" crossorigin="anonymous"></script>

        <div class="modal fade tos" id="tos" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="tosdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-center" id="tosdropLabel">Acceptable Uses Policy</h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <ul>
                                <li>Peserta harap memastikan jaringan internet, gangguan sinyal tidak menjadi tanggung jawab dari penyelenggara.</li>
                                <li>Peserta hanya bisa login menggunakan SATU DEVICE saja.</li>
                                <li>Peserta dilarang keras mengucapkan kata-kata kasar atau mengandung unsur sara pada kolom komentar.</li>
                                <li>Peserta diharapkan memperhatikan jadwal acara.</li>
                                <li>Harap memberikan pertanyaan pada kolom komentar setelah sesi tanya jawab dibuka. </li>
                                <li>Sesi absensi akan ada setelah sesi tanya jawab.</li>
                                <li>E-sertifikat hanya akan diberikan pada peserta yang mengikuti webinar dari awal sesi hingga sesi selesai.</li>
                                <li>E-sertifikat akan muncul pada MyCourse paling lambat H+5 setelah sesi webinar berlangsung.</li>
                            </ul>
                        </div>
                        <div class="form-check form-group form-switch" style="padding-left:3.5em" data-bs-dismiss="modal">
                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                            <label class="form-check-label" for="flexSwitchCheckDefault">saya mengerti dan menerima.</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
                                        <div class="d-flex flex-column mb-2 align-items-start">
                                            <div class="d-flex align-items-center" title="Administrator">
                                                <div class="symbol symbol-40 mr-3">
                                                    <img class="rounded-circle" alt="<?php echo $txtchat2->uname; ?>" src="<?php echo base_url('assets/images/users/' . $txtchat2->pict); ?>">
                                                </div>
                                                <div class="mx-2">
                                                    <a href="javascript:void(0);" class="text-danger font-weight-bold font-size-h6" style="text-decoration:none;"><?php echo $txtchat2->fullname; ?> </a>
                                                    <span class="text-muted font-size-sm"><i class="fas fa-user-shield text-danger"></i></span>
                                                </div>
                                                <div class="tym-chat"><?php echo $txtchat2->syscreatedate; ?></div>
                                            </div>
                                            <div class="p-1 bg-danger text-white text-left wrap-chat">
                                                <?php echo $txtchat2->msg; ?>
                                            </div>
                                        </div>
                                    <?php elseif ($txtchat2->role_name == 'platinum') : ?>
                                        <div class="d-flex flex-column mb-2 align-items-start">
                                            <div class="d-flex align-items-center">
                                                <div class="symbol symbol-40 mr-3" title="Platinum Member">
                                                    <img class="rounded-circle" alt="<?php echo $txtchat2->uname; ?>" src="<?php echo base_url('assets/images/users/' . $txtchat2->pict); ?>">
                                                </div>
                                                <div class="mx-2 bg-dark px-2 rounded" title="Platinum Member">
                                                    <a href="javascript:rep_chat('<?php echo $txtchat2->fullname; ?>');" class="text-white font-weight-normal" style="text-decoration:none;font-size:12px;"><?php echo $txtchat2->fullname; ?> </a>
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
                                                <div class="tym-chat"><?php echo $txtchat2->syscreatedate; ?></div>
                                            </div>
                                            <div class="p-1 bg-light-success text-left wrap-chat">
                                                <?php echo $txtchat2->msg; ?>
                                            </div>
                                        </div>
                                    <?php elseif ($txtchat2->role_name == 'silver' or $txtchat2->role_name == 'basic') : ?>
                                        <div class="d-flex flex-column mb-2 align-items-start">
                                            <div class="d-flex align-items-center">
                                                <div class="symbol symbol-40 mr-3" title="Silver Member">
                                                    <img class="rounded-circle" alt="<?php echo $txtchat2->uname; ?>" src="<?php echo base_url('assets/images/users/' . $txtchat2->pict); ?>">
                                                </div>
                                                <div class="mx-2" title="Silver Member">
                                                    <a href="javascript:rep_chat('<?php echo $txtchat2->fullname; ?>');" class="font-weight-normal" style="text-decoration:none;font-size:12px;"><?php echo $txtchat2->fullname; ?> </a>
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
                                                <div class="tym-chat"><?php echo $txtchat2->syscreatedate; ?></div>
                                            </div>
                                            <div class="p-1 bg-light text-dark-50 font-weight-bold text-left wrap-chat">
                                                <?php echo $txtchat2->msg; ?>
                                            </div>
                                        </div>
                                    <?php else : ?>
                                        <div class="d-flex flex-column mb-2 align-items-start">
                                            <div class="d-flex align-items-center">
                                                <div class="symbol symbol-40 mr-3" title="Silver Member">
                                                    <img class="rounded-circle" alt="<?php echo $txtchat2->uname; ?>" src="<?php echo base_url('assets/images/users/' . $txtchat2->pict); ?>">
                                                </div>
                                                <div class="mx-2" title="Silver Member">
                                                    <a href="javascript:rep_chat('<?php echo $txtchat2->fullname; ?>');" class="font-weight-normal" style="text-decoration:none;font-size:12px;"><?php echo $txtchat2->fullname; ?> </a>
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
                                                <div class="tym-chat"><?php echo $txtchat2->syscreatedate; ?></div>
                                            </div>
                                            <div class="p-1 bg-light text-dark-50 font-weight-bold text-left wrap-chat">
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
                    Send_chat(
                            2);"></textarea>
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

        <div class="modal fade modal_absen" id="modal_absen" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modal_absenLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <input type="hidden" name="id_absensi"/>
                        <h5 class="text-center">ABSENSI</h5>
                        <div class="form-group">
                            <div id="absenmsg" class="text-center"></div>
                        </div>
                        <div class="form-group">
                            <div class="text-center">
                                <small class="text-info">harap masukkan nama lengkap untuk memperoleh e-sertifikat.</small>
                            </div>
                        </div>
                        <div class="clearfix my-4"></div>
                        <div class="form-group">
                            <input type="text" name="absentxt" class="form-control" autocomplete="off" placeholder="Nama Lengkap"/>
                        </div>

                        <div class="clearfix my-4"></div>
                        <div class="text-center">
                            <b>berikan rating untuk materi</b>
                            <div class="clearfix my-2"></div>
                            <i id="rating1" class="fas fa-star" style="font-size: 48px;" title="bad" onmouseover="rating(1)" onclick="setrating(1)"></i>
                            <i id="rating2" class="fas fa-star" style="font-size: 48px;" title="enough" onmouseover="rating(2)" onclick="setrating(2)"></i>
                            <i id="rating3" class="fas fa-star" style="font-size: 48px;" title="medium" onmouseover="rating(3)" onclick="setrating(3)"></i>
                            <i id="rating4" class="fas fa-star" style="font-size: 48px;" title="good" onmouseover="rating(4)" onclick="setrating(4)"></i>
                            <i id="rating5" class="fas fa-star" style="font-size: 48px;" title="excellent" onmouseover="rating(5)" onclick="setrating(5)"></i>
                            <input type="hidden" name="ratingtxt" value="0"/>
                        </div>
                        <div class="clearfix my-4"></div>
                        <div class="text-center">
                            <button id="absenbtn" type="button" class="btn btn-info" onclick="absenbtn()">HADIR</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <script>
            var socket = io.connect('https://live-chat.mycapturer.com');
            document.onkeydown = function (e) {
                if (event.keyCode === 123) {
                    return false;
                }
                if (e.ctrlKey && e.shiftKey && e.keyCode === 'I'.charCodeAt(0)) {
                    return false;
                }
                if (e.ctrlKey && e.shiftKey && e.keyCode === 'C'.charCodeAt(0)) {
                    return false;
                }
                if (e.ctrlKey && e.shiftKey && e.keyCode === 'J'.charCodeAt(0)) {
                    return false;
                }
                if (e.ctrlKey && e.keyCode === 'U'.charCodeAt(0)) {
                    return false;
                }
            };
            $(document).ready(function () {
                join_stream();
                setInterval(function () {
                    console.clear();
                }, 3000);
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
                $('#bgndVideo').YTPlayer({
                    onReady: function (play) {
                        var height_bgndVideo = $('.YTPOverlay').height();
                        var role_name = $('input[name="role_name"]').val();
                        if (role_name === 'Super User' || role_name === 'Administrator') {
                            null;
                        } else {
                            $('#tos').modal('show');
                        }
                        $('#live-chat-lg').attr('style', 'height:100%;max-height:' + height_bgndVideo + 'px;height:' + height_bgndVideo + 'px;');
                        $('#msg_dir').animate({
                            scrollTop: $('#msg_dir').get(0).scrollHeight
                        });
                        $('#scroll-pull').animate({
                            scrollTop: $('#scroll-pull').get(0).scrollHeight
                        });
                    },
                    onError: function (play) {
                        toastr.error('error while getting video, please refresh page!');
                    }
                });
                socket.on('viewers', function (data) {
                    document.getElementById('viewers').innerHTML = numeral(data.tot_view).format('0,0');
                });
                socket.on('new_message', function (data) {
                    var role_user = $('input[name="role_name"]').val();
                    var btn_admin = '<button type="button" class="btn btn-sm btn-default" value="' + data.chat_id + '" title="Kick Member ' + data.username + '" onclick="Kick_user(this.value)"><i class="fas fa-times text-danger"></i></button>'
                            + '<button type="button" class="btn btn-sm btn-default" value="' + data.chat_id + '" title="Warning Member ' + data.username + '" onclick="Warning_user(this.value)"><i class="fas fa-exclamation text-warning"></i></button>';
                    if (data.name_role === 'Administrator' || data.name_role === 'Super User') {
                        var txt1 = '<div class="d-flex flex-column mb-2 align-items-start">'
                                + '<div class="d-flex align-items-center" title="Administrator">'
                                + '<div class="symbol symbol-40 mr-3">'
                                + '<img src="' + data.avatar + '" class="rounded-circle" alt="' + data.username + '">'
                                + '</div>'
                                + '<div class="mx-2">'
                                + '<a href="javascript:void(0);" class="text-danger font-weight-bold font-size-h6" style="text-decoration:none;">' + data.username + ' </a>'
                                + '<span class="font-size-sm"><i class="fas fa-user-shield text-danger"></i></span>'
                                + '</div>'
                                + '<div class="tym-chat">' + data.tym_chat + '</div>'
                                + '</div>'
                                + '<div class="p-1 bg-danger text-white text-left wrap-chat"> ' + data.msgtxt + ' </div>'
                                + '</div>';
                        $('#msg_dir').append(txt1);
                        $('#msg_dir2').append(txt1);
                    } else if (data.name_role === 'platinum') {
                        var txt2 = '<div class="d-flex flex-column mb-2 align-items-start">'
                                + '<div class="d-flex align-items-center">'
                                + '<div class="symbol symbol-40 mr-3" title="Platinum Member">'
                                + '<img src="' + data.avatar + '" class="rounded-circle" alt="' + data.username + '">'
                                + '</div>'
                                + '<div class="mx-2 bg-dark px-2 rounded" title="Platinum Member">'
                                + '<a href="javascript:rep_chat("' + data.fullname + '");" class="text-white font-weight-normal" style="text-decoration:none;font-size:12px;">' + data.fullname + ' </a>'
                                + '<span class="font-size-sm"><i class="fas fa-crown text-warning"></i></span>'
                                + '</div>'
                                + '<div id="btn_control' + data.chat_id + '" class="btn-group"></div>'
                                + '<div class="tym-chat">' + data.tym_chat + '</div>'
                                + '</div>'
                                + '<div class="p-1 bg-light-success text-left wrap-chat"> ' + data.msgtxt + ' </div>'
                                + '</div>';
                        $('#msg_dir').append(txt2);
                        $('#msg_dir2').append(txt2);
                    } else if (data.name_role === 'silver' || data.name_role === 'basic') {
                        var txt3 = '<div class="d-flex flex-column mb-2 align-items-start">'
                                + '<div class="d-flex align-items-center">'
                                + '<div class="symbol symbol-40 mr-3" title="' + data.name_role + ' member">'
                                + '<img src="' + data.avatar + '" class="rounded-circle" alt="' + data.username + '">'
                                + '</div>'
                                + '<div class="mx-2" title="' + data.name_role + ' member">'
                                + '<a href="javascript:rep_chat("' + data.fullname + '");" class="font-weight-normal" style="text-decoration:none;font-size:12px;">' + data.fullname + ' </a>'
                                + '</div>'
                                + '<div id="btn_control' + data.chat_id + '" class="btn-group"></div>'
                                + '<div class="tym-chat">' + data.tym_chat + '</div>'
                                + '</div>'
                                + '<div class="p-1 bg-light text-dark-50 font-weight-bold text-left wrap-chat"> ' + data.msgtxt + ' </div>'
                                + '</div>';
                        $('#msg_dir').append(txt3);
                        $('#msg_dir2').append(txt3);
                    } else {
                        var txt3 = '<div class="d-flex flex-column mb-2 align-items-start">'
                                + '<div class="d-flex align-items-center">'
                                + '<div class="symbol symbol-40 mr-3" title="' + data.name_role + ' member">'
                                + '<img src="' + data.avatar + '" class="rounded-circle" alt="' + data.username + '">'
                                + '</div>'
                                + '<div class="mx-2" title="' + data.name_role + ' member">'
                                + '<a href="javascript:rep_chat("' + data.fullname + '");" class="font-weight-normal" style="text-decoration:none;font-size:12px;">' + data.fullname + ' </a>'
                                + '</div>'
                                + '<div id="btn_control' + data.chat_id + '" class="btn-group"></div>'
                                + '<div class="tym-chat">' + data.tym_chat + '</div>'
                                + '</div>'
                                + '<div class="p-1 bg-light text-dark-50 font-weight-bold text-left wrap-chat"> ' + data.msgtxt + ' </div>'
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
                socket.on('<?php echo base64_encode($this->session->userdata('uname')); ?>', function (data) {
                    if (data.category === 1) {
                        $.ajax({
                            type: "GET",
                            url: "<?php echo base_url('Streaming/punishment/'); ?>",
                            dataType: "json",
                            cache: false,
                            success: function (data) {

                            }
                        });
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
                            window.location.href = "<?php echo base_url('Signin/'); ?>";
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
                $('#msg_dir').animate({
                    scrollTop: $('#msg_dir').get(0).scrollHeight
                });
                $('#scroll-pull').animate({
                    scrollTop: $('#scroll-pull').get(0).scrollHeight
                });
            });
            $("body").contextmenu(function () {
                return false;
            });
            function join_stream() {
                $.ajax({
                    type: "GET",
                    url: "<?php echo base_url('Streaming/viewers/'); ?>",
                    dataType: "json",
                    cache: false,
                    success: function (data) {
                        socket.emit('join_stream', {
                            tot_viewers: data.tot_view
                        });
                    }
                });
            }
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
                                        id_chat: data.chat_id,
                                        tym_chat: data.tym_chat
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
                                        id_chat: data.chat_id,
                                        tym_chat: data.tym_chat
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
            function rep_chat(uname) {
                $('input[name="msgtxt"]').val('@' + uname + ' ');
                $('textarea[name="msgtxt2"]').val('@' + uname + ' ');
            }
            function rating(id) {
                if (id === 1) {
                    $('#rating1').attr('style', 'color:yellow;font-size: 48px;cursor:pointer;');
                    $('#rating2').attr('style', 'font-size: 48px;cursor:pointer;');
                    $('#rating3').attr('style', 'font-size: 48px;cursor:pointer;');
                    $('#rating4').attr('style', 'font-size: 48px;cursor:pointer;');
                    $('#rating5').attr('style', 'font-size: 48px;cursor:pointer;');
                } else if (id === 2) {
                    $('#rating1').attr('style', 'color:yellow;font-size: 48px;cursor:pointer;');
                    $('#rating2').attr('style', 'color:yellow;font-size: 48px;cursor:pointer;');
                    $('#rating3').attr('style', 'font-size: 48px;cursor:pointer;');
                    $('#rating4').attr('style', 'font-size: 48px;cursor:pointer;');
                    $('#rating5').attr('style', 'font-size: 48px;cursor:pointer;');
                } else if (id === 3) {
                    $('#rating1').attr('style', 'color:yellow;font-size: 48px;cursor:pointer;');
                    $('#rating2').attr('style', 'color:yellow;font-size: 48px;cursor:pointer;');
                    $('#rating3').attr('style', 'color:yellow;font-size: 48px;cursor:pointer;');
                    $('#rating4').attr('style', 'font-size: 48px;cursor:pointer;');
                    $('#rating5').attr('style', 'font-size: 48px;cursor:pointer;');
                } else if (id === 4) {
                    $('#rating1').attr('style', 'color:yellow;font-size: 48px;cursor:pointer;');
                    $('#rating2').attr('style', 'color:yellow;font-size: 48px;cursor:pointer;');
                    $('#rating3').attr('style', 'color:yellow;font-size: 48px;cursor:pointer;');
                    $('#rating4').attr('style', 'color:yellow;font-size: 48px;cursor:pointer;');
                    $('#rating5').attr('style', 'font-size: 48px;cursor:pointer;');
                } else if (id === 5) {
                    $('#rating1').attr('style', 'color:yellow;font-size: 48px;cursor:pointer;');
                    $('#rating2').attr('style', 'color:yellow;font-size: 48px;cursor:pointer;');
                    $('#rating3').attr('style', 'color:yellow;font-size: 48px;cursor:pointer;');
                    $('#rating4').attr('style', 'color:yellow;font-size: 48px;cursor:pointer;');
                    $('#rating5').attr('style', 'color:yellow;font-size: 48px;cursor:pointer;');
                } else {
                    null;
                }
            }
            function setrating(id) {
                if (id === 1) {
                    $('input[name="ratingtxt"]').val(1);
                    $('#rating1').attr('style', 'color:yellow;font-size: 48px;cursor:pointer;');
                    $('#rating2').attr('style', 'font-size: 48px;cursor:pointer;');
                    $('#rating3').attr('style', 'font-size: 48px;cursor:pointer;');
                    $('#rating4').attr('style', 'font-size: 48px;cursor:pointer;');
                    $('#rating5').attr('style', 'font-size: 48px;cursor:pointer;');
                } else if (id === 2) {
                    $('input[name="ratingtxt"]').val(2);
                    $('#rating1').attr('style', 'color:yellow;font-size: 48px;cursor:pointer;');
                    $('#rating2').attr('style', 'color:yellow;font-size: 48px;cursor:pointer;');
                    $('#rating3').attr('style', 'font-size: 48px;cursor:pointer;');
                    $('#rating4').attr('style', 'font-size: 48px;cursor:pointer;');
                    $('#rating5').attr('style', 'font-size: 48px;cursor:pointer;');
                } else if (id === 3) {
                    $('input[name="ratingtxt"]').val(3);
                    $('#rating1').attr('style', 'color:yellow;font-size: 48px;cursor:pointer;');
                    $('#rating2').attr('style', 'color:yellow;font-size: 48px;cursor:pointer;');
                    $('#rating3').attr('style', 'color:yellow;font-size: 48px;cursor:pointer;');
                    $('#rating4').attr('style', 'font-size: 48px;cursor:pointer;');
                    $('#rating5').attr('style', 'font-size: 48px;cursor:pointer;');
                } else if (id === 4) {
                    $('input[name="ratingtxt"]').val(4);
                    $('#rating1').attr('style', 'color:yellow;font-size: 48px;cursor:pointer;');
                    $('#rating2').attr('style', 'color:yellow;font-size: 48px;cursor:pointer;');
                    $('#rating3').attr('style', 'color:yellow;font-size: 48px;cursor:pointer;');
                    $('#rating4').attr('style', 'color:yellow;font-size: 48px;cursor:pointer;');
                } else if (id === 5) {
                    $('input[name="ratingtxt"]').val(5);
                    $('#rating1').attr('style', 'color:yellow;font-size: 48px;cursor:pointer;');
                    $('#rating2').attr('style', 'color:yellow;font-size: 48px;cursor:pointer;');
                    $('#rating3').attr('style', 'color:yellow;font-size: 48px;cursor:pointer;');
                    $('#rating4').attr('style', 'color:yellow;font-size: 48px;cursor:pointer;');
                    $('#rating5').attr('style', 'color:yellow;font-size: 48px;cursor:pointer;');
                }
            }
            function absenbtn() {
                var namatxt = $('input[name="absentxt"]');
                var ratingtxt = $('input[name="ratingtxt"]');
                var id_materi = $('input[name="id_materi"]');
                if (namatxt.val() === '') {
                    toastr.warning('please fill your fullname!');
                } else if (ratingtxt.val() === '0') {
                    toastr.warning('mohon berikan penilaian untuk materi');
                } else {
                    $.ajax({
                        type: "GET",
                        url: "<?php echo base_url('Streaming/set_rating?user_nama='); ?>" + $('input[name="absentxt"]').val() + '&rating=' + ratingtxt.val() + '&id_materi=' + id_materi.val(),
                        dataType: "json",
                        cache: false,
                        success: function (data) {

                        }
                    });
                    location.reload();
                }
            }
            function set_reminder(id_materi) {
                var btn_reminder = $('#btn_reminder' + id_materi);
                btn_reminder.removeAttr('onclick');
                btn_reminder.removeAttr('style');
                $.ajax({
                    type: "GET",
                    url: "<?php echo base_url('Streaming/set_reminder?id_materi='); ?>" + id_materi,
                    dataType: "json",
                    cache: false,
                    success: function (data) {
                        if (data.stat === true) {
                            btn_reminder.attr('onclick', 'unset_reminder(' + id_materi + ')');
                            btn_reminder.attr('style', 'width: 83px;background: #878787;box-shadow:0px 2px 2px rgba(0, 0, 0, 0.1);border-radius: 4px;cursor:pointer;');
                            toastr.success(data.msg);
                        } else {
                            btn_reminder.attr('onclick', 'set_reminder(' + id_materi + ')');
                            btn_reminder.attr('style', 'width: 83px;background: #459CCF;box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);border-radius: 4px;cursor:pointer;');
                            toastr.error(data.msg);
                        }
                    }, error: function (jqXHR) {
                        btn_reminder.attr('onclick', 'set_reminder(' + id_materi + ')');
                        btn_reminder.attr('style', 'width: 83px;background: #459CCF;box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);border-radius: 4px;cursor:pointer;');
                        toastr.error('error ' + jqXHR.status + ' ' + jqXHR.statusText);
                    }
                });
            }
            function unset_reminder(id_materi) {
                var btn_reminder = $('#btn_reminder' + id_materi);
                btn_reminder.removeAttr('onclick');
                btn_reminder.removeAttr('style');
                $.ajax({
                    type: "GET",
                    url: "<?php echo base_url('Streaming/unset_reminder?id_materi='); ?>" + id_materi,
                    dataType: "json",
                    cache: false,
                    success: function (data) {
                        if (data.stat === true) {
                            btn_reminder.attr('onclick', 'set_reminder(' + id_materi + ')');
                            btn_reminder.attr('style', 'width: 83px;background: #459CCF;box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);border-radius: 4px;cursor:pointer;');
                            toastr.success(data.msg);
                        } else {
                            btn_reminder.attr('onclick', 'unset_reminder(' + id_materi + ')');
                            btn_reminder.attr('style', 'width: 83px;background: #878787;box-shadow:0px 2px 2px rgba(0, 0, 0, 0.1);border-radius: 4px;cursor:pointer;');
                            toastr.error(data.msg);
                        }
                    }, error: function (jqXHR) {
                        btn_reminder.attr('onclick', 'unset_reminder(' + id_materi + ')');
                        btn_reminder.attr('style', 'width: 83px;background: #878787;box-shadow:0px 2px 2px rgba(0, 0, 0, 0.1);border-radius: 4px;cursor:pointer;');
                        toastr.error('error ' + jqXHR.status + ' ' + jqXHR.statusText);
                    }
                });
            }
            function absensi_member() {
                $.ajax({
                    type: "GET",
                    url: "<?php echo base_url('Streaming/absensi_member/'); ?>",
                    dataType: "json",
                    cache: false,
                    success: function (data) {
                        if (data.status_absensi === true) {
                            var fullname = $('input[name="fullname"]').val();
                            var absenmsg = document.getElementById('absenmsg');
                            var nama_materi = $('input[name="nama_materi"]');
                            if (fullname === '') {
                                absenmsg.innerHTML = 'Halo, terimakasih telah mengikuti ' + nama_materi.val();
                                $('#modal_absen').modal('show');
                            } else {
                                absenmsg.innerHTML = 'Halo ' + fullname + ', terimakasih telah mengikuti ' + nama_materi.val();
                                $('#modal_absen').modal('show');
                            }
                        } else {
                            toastr.error('harap mengikuti materi sampai selesai!');
                        }
                    }, error: function (jqXHR) {
                        toastr.error('error ' + jqXHR.status + ' ' + jqXHR.statusText);
                    }
                });
            }
        </script>
        <?php
        if ($this->session->userdata('role_name') === 'Super User' or $this->session->userdata('role_name') === 'Administrator') {
            require_once 'admin_control.php';
        } else {
            null;
        }
        ?>
    </body>
</html>
