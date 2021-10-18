<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>CODE OTP</title>
        <style>*,::after,::before{box-sizing:border-box}@media(min-width:1200px){.container,.container-lg,.container-md,.container-sm,.container-xl{max-width:1140px}}.container{width:100%;padding-right:15px;padding-left:15px;margin-right:auto;margin-left:auto}.row{display:-ms-flexbox;display:flex;-ms-flex-wrap:wrap;flex-wrap:wrap;margin-right:-15px;margin-left:-15px}.bg-light{background-color:#f8f9fa!important}.col-md-3{-ms-flex:0 0 25%;flex:0 0 25%;max-width:25%;position:relative;width:100%;padding-right:15px;padding-left:15px}.col-md-6{-ms-flex:0 0 50%;flex:0 0 50%;max-width:50%;position:relative;width:100%;padding-right:15px;padding-left:15px}.card{position:relative;display:-ms-flexbox;display:flex;-ms-flex-direction:column;flex-direction:column;min-width:0;word-wrap:break-word;background-color:#fff;background-clip:border-box;border:1px solid rgba(0,0,0,.125);border-radius:.25rem}.card-body{-ms-flex:1 1 auto;flex:1 1 auto;min-height:1px;padding:1.25rem}.table{width:100%;margin-bottom:1rem;color:#212529;border-collapse:collapse}.table-borderless tbody+tbody,.table-borderless td,.table-borderless th,.table-borderless thead th{border:0}.table td,.table th{padding:.75rem;vertical-align:top}.form-group{margin-bottom:1rem}.bg-secondary{background-color:#6c757d!important}.text-center{text-align:center!important}.h1,h1{font-size:2.5rem}.h1,.h2,.h3,.h4,.h5,.h6,h1,h2,h3,h4,h5,h6{margin-bottom:.5rem;font-weight:500;line-height:1.2}h1,h2,h3,h4,h5,h6{margin-top:0}.card-footer:last-child{border-radius:0 0 calc(.25rem - 1px) calc(.25rem - 1px)}.card-footer{padding:.75rem 1.25rem;background-color:rgba(0,0,0,.03);border-top:1px solid rgba(0,0,0,.125)}a{color:#007bff;text-decoration:none;background-color:transparent}a:hover{color:#0056b3;text-decoration:underline}</style>
    </head>
    <body class="bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-borderless" style="width: 100%;">
                                <tbody>
                                    <tr style="border-bottom: 1px solid black;">
                                        <td>
                                            <img src="<?php echo base_url('assets/images/systems/logo.png'); ?>" alt="Festival Sertifikasiku">
                                        </td>
                                        <td style="width: 100%;">
                                            Festival Sertifikasiku
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="form-group">
                                Halo <?php echo $value->fullname;?>,
                            </div>
                            <div class="form-group">
                                masukkan kode OTP berikut:
                            </div>
                            <div class="form-group">
                                <div class="bg-secondary">
                                    <div style="clear: both;margin: 15px 0px;padding:15px 0px;">
                                        <h1 class="text-center"><?php echo $otp; ?></h1>
                                    </div>
                                </div>
                            </div>
                            <div style="clear: both;margin: 20px 0px;border-bottom: 1px solid black;"></div>
                            <div class="form-group">
                                Pesan ini dikirim ke <a href="mailto:{<?php echo $value->uname;?>}"><?php echo $value->uname;?></a> atas permintaan anda.
                            </div>
                            <div class="form-group">
                                sertifikasiku.com, Wisma GKBI, Jl. Jend. Sudirman No.6, RT.14/RW.1, Bend. Hilir, Kecamatan Tanah Abang, Jakarta
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </body>
</html>
