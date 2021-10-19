<?php

defined('BASEPATH') OR exit('are you trying to signin backdoor?');

class Landing extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Systems/M_users', 'model');
        $this->load->model('Auth/M_auth');
        $this->load->helper('string');
    }

    public function index() {
        $data = [
            'csrf' => $this->bodo->Csrf()
        ];
        $this->parser->parse('v_landing', $data);
    }

    public function Get_mail() {
        $uname['uname'] = Post_get('email');
        $exec = $this->model->Get_detail($uname['uname']);
        if (!empty($exec)) {
            $set_session = $this->M_auth->Signin($uname);
            $this->bodo->Set_session($set_session);
            $otp = random_string('numeric', 5);
            $data = [
                'status' => true,
                'sys_user_id' => Enkrip($exec[0]->sys_user_id),
                'href_url' => base_url('Streaming/index/')
            ];
            $param = [
                'otp' => password_hash($otp, PASSWORD_DEFAULT),
                'sys_user_id' => $exec[0]->sys_user_id
            ];
//            $this->model->set_password($param);
//            $this->send_otp($exec, $otp);
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
            'smtp_user' => 'fd8950b794824e',
            'smtp_pass' => 'fe2f84fe51e0fb',
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
            'useragent' => 'Mini Class Sertifikasiku',
            'protocol' => 'smtp',
            'smtp_host' => 'smtp.gmail.com',
            'smtp_user' => 'it.sertifikasiku@gmail.com',
            'smtp_pass' => '*S3r1tf1k4s1ku@2021',
            '_smtp_auth' => true,
            'smtp_crypto' => 'ssl',
            'charset' => 'utf-8',
            'wordwrap' => true,
            'mailtype' => 'html',
            'smtp_port' => 465
        ];
        return $this->email->initialize($config)
                        ->set_newline("\r\n")
                        ->from('admin@sertifikasiku.com', 'Kode OTP Mini Class Sertifikasiku')
                        ->to($exec['value']->uname)
                        ->subject('Kode OTP Mini Class Sertifikasiku')
                        ->message($this->load->view("v_email", $exec, true))
                        ->send();
    }

    public function verify_otp() {
        $data = [
            'uname' => Post_input("mail_user"),
            'pwd' => Post_input("otp_code")
        ];
        $exec = $this->M_auth->Signin($data);
        $hashed = $exec->pwd;
        if (password_verify($data['pwd'], $hashed)) {
            $this->bodo->Set_session($exec);
            $result = [
                'stat' => true,
                'href_url' => base_url('Streaming/index/')
            ];
        } else {
            $result = [
                'stat' => false
            ];
        }
        $result['csrf'] = $this->bodo->Csrf()['hash'];
        return ToJson($result);
    }

}
