<?php

defined('BASEPATH') OR exit('are you trying to signin backdoor?');

class Landing extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Systems/M_users', 'model');
        $this->load->helper('string');
    }

    public function index() {
        $this->parser->parse('v_landing', []);
    }

    public function Get_mail() {
        $uname = Post_get('email');
        $exec = $this->model->Get_detail($uname);
        if (!empty($exec)) {
            $otp = random_string('numeric', 5);
            $data = [
                'status' => true,
                'sys_user_id' => Enkrip($exec[0]->sys_user_id)
            ];
            $param = [
                'otp' => password_hash($otp, PASSWORD_DEFAULT),
                'sys_user_id' => $exec[0]->sys_user_id
            ];
            $this->model->set_password($param);
            $this->send_otp($exec, $otp);
        } else {
            $data = [
                'status' => false
            ];
        }
        return ToJson($data);
    }

    public function send_mail() {
        $uname = Post_get('email');
        $exec = $this->model->Get_detail($uname);
        $this->load->library('email');
        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'smtp.mailtrap.io',
            'smtp_port' => 2525,
            'smtp_user' => 'c86c8ffd9896ec',
            'smtp_pass' => 'a1a42d614b6817',
            'crlf' => "\r\n",
            'newline' => "\r\n",
            'charset' => 'utf-8',
            'wordwrap' => true,
            'mailtype' => 'html',
            'useragent' => 'Festival Sertifikasiku',
        ];
        $exec['value'] = $exec[0];
        $exec['otp'] = random_string('numeric', 5);
        return $this->email->initialize($config)
                        ->set_newline("\r\n")
                        ->from('Festival Sertifikasiku', 'CODE OTP')
                        ->to('d30113aded-5946a9+1@inbox.mailtrap.io')
                        ->subject('CODE OTP')
                        ->message($this->load->view("v_email", $exec, true))
                        ->send();
    }

    private function send_otp($exec, $otp) {
        $exec['value'] = $exec[0];
        $exec['otp'] = $otp;
        $this->load->library('email');
        $config = [
            'useragent' => 'Festival Sertifikasiku',
            'protocol' => 'smtp',
            'smtp_host' => 'mail.kemenag.dev',
            'smtp_user' => 'kemasjidan@kemenag.dev',
            'smtp_pass' => 'Simas@123',
            '_smtp_auth' => true,
            'smtp_crypto' => 'ssl',
            'charset' => 'utf-8',
            'wordwrap' => true,
            'mailtype' => 'html',
            'smtp_port' => 465
        ];
        return $this->email->initialize($config)
                        ->set_newline("\r\n")
                        ->from('Festival Sertifikasiku', 'CODE OTP')
                        ->to($exec['value']->uname)
                        ->subject('CODE OTP')
                        ->message($this->load->view("v_email", $exec, true))
                        ->send();
    }

}
