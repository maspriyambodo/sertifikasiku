<?php defined('BASEPATH') OR exit('No direct script access allowed');

$config['settings'] = array(
    'smtp_host'     => 'smtp.mailtrap.io',
    'smtp_port'     => '2525',
    'smtp_user'     => '9cf16dcde1e5f8',
    'smtp_pass'     => '079205e126bf43',
    'from_email'    => 'no-reply@sertifikasiku.com',
    'from_name'     => 'Sertifikasiku',

    'protocol'      => 'smtp',
    'smtp_crypto'   => 'tls',

    'mailtype'      => 'html',
    'charset'       => 'utf-8',
    'wordwrap'=> TRUE,
    'newline'       => "\r\n",
    'crlf'          => "\r\n",
);