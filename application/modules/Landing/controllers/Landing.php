<?php

defined('BASEPATH') OR exit('are you trying to signin backdoor?');

class Landing extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Systems/M_users', 'model');

        $this->kodeOtp = mt_rand(10000,99999);
        $this->date_time = new DateTime(date('Y-m-d H:i:s'));
    }

    public function index() {
        $this->parser->parse('v_landing', []);
    }

    public function Get_mail() {
        $uname = Post_get('email');
        $exec = $this->model->Get_userid($uname);
        if (!empty($exec)) {
            $this->load->library('ah_email', 'ah_email');

			$this->date_time->modify('+30 minute');
			$tanggalKadaluarsa = $this->date_time->format('Y-m-d H:i:s');

            $data = [
                'status' => true,
                'sys_user_id' => Enkrip($exec->sys_user_id),
                'email' 		=> $uname,
                'kode' 			=> $this->kodeOtp,
                'expired_at' 	=> $tanggalKadaluarsa,
                'status_otp' 		=> 'Y'
            ];

            $this->ah_email->send($uname, 'Informasi Kode OTP Akun Kamu', 'verify', array(
                'kodeOtp'  => $this->kodeOtp,
            ));

            $data_session=array(
                'email' 			=> $uname,
                'statuslogin' 	=> 'pendinglogin',
            );

            $this->session->set_userdata($data_session);

            $this->db->insert('kodeotp', $data);
        } else {
            $data = [
                'status' => false
            ];
        }
        return ToJson($data);
    }

}
