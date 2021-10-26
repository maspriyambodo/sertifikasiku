<?php

defined('BASEPATH') OR exit('are you trying to signin backdoor?');

class Landing extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Systems/M_users', 'model');
        $this->load->model('Streaming/M_streaming', 'model2');
        $this->load->model('Auth/M_auth');
        $this->load->helper('string');
        $this->load->library('user_agent');
    }

    public function index() {
        if ($this->session->userdata('id_user')) {
            $result = redirect(base_url('Streaming/index/'), 'refresh');
        } else {
            $data = [
                'csrf' => $this->bodo->Csrf(),
                'materi' => $this->model2->Materi()
            ];
            $result = $this->parser->parse('v_landing', $data);
        }
        return $result;
    }

    public function testing() {
        if ($this->session->userdata('id_user')) {
            $result = redirect(base_url('Streaming/testing/'), 'refresh');
        } else {
            $data = [
                'csrf' => $this->bodo->Csrf(),
                'materi' => $this->model2->Materi2()
            ];
            $result = $this->parser->parse('v_testing', $data);
        }
        return $result;
    }

    public function Get_mail() {
        $uname['uname'] = strtolower(Post_get('email'));
        $exec = $this->model->Get_detail($uname['uname']);
        if (!empty($exec) and $exec[0]->login_stat == 0 and $exec[0]->login_attempt <> 3 and!empty($exec[0]->user_id)) {
//            $set_session = $this->M_auth->Signin($uname);
//            $this->bodo->Set_session($set_session);
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
//            $this->model->set_loginstat($param['sys_user_id']);
            $this->model->set_password($param);
            $this->send_mail($exec, $otp); //ganti ketika develpment to send_mail(); and send_otp() while production
        } elseif ($exec[0]->login_attempt == 3) {
            $data = [
                'status' => 'blokir_akun' // diblokir karena admin klik tombol blokir akun pada live chat 
            ];
        } elseif ($exec[0]->login_stat == 1) {
            $data = [
                'status' => 'lagi_login'
            ];
        } else {
            $data = [
                'status' => false
            ];
        }
        return ToJson($data);
    }

    public function Get_mail2() {
        $uname['uname'] = strtolower(Post_get('email'));
        $exec = $this->model->Get_detail($uname['uname']);
        if (!empty($exec) and $exec[0]->login_stat == 0 and $exec[0]->login_attempt <> 3 and!empty($exec[0]->user_id)) {
            $set_session = $this->M_auth->Signin($uname);
            $this->bodo->Set_session($set_session);
            $otp = random_string('numeric', 5);
            $data = [
                'status' => true,
                'sys_user_id' => Enkrip($exec[0]->sys_user_id),
                'href_url' => base_url('Streaming/testing/')
            ];
            $param = [
                'otp' => password_hash($otp, PASSWORD_DEFAULT),
                'sys_user_id' => $exec[0]->sys_user_id
            ];
//            $this->model->set_loginstat($param['sys_user_id']);
//            $this->model->set_password($param);
//            $this->send_otp($exec, $otp);
        } elseif ($exec[0]->login_attempt == 3) {
            $data = [
                'status' => 'blokir_akun' // diblokir karena admin klik tombol blokir akun pada live chat 
            ];
        } elseif ($exec[0]->login_stat == 1) {
            $data = [
                'status' => 'lagi_login'
            ];
        } else {
            $data = [
                'status' => false
            ];
        }
        return ToJson($data);
    }

    public function send_mail($exec, $otp) {
        $exec['value'] = $exec[0];
        $exec['otp'] = $otp;
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
                        ->from('admin@sertifikasiku.com', 'Kode OTP Festival Sertifikasiku')
                        ->to($exec['value']->uname)
                        ->subject('Kode OTP Festival Sertifikasiku')
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
            $this->model->set_loginstat($exec->id_user);
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
