<?php

defined('BASEPATH') OR exit('No direct script access allowed, are you trying to signin backdoor?');

class Streaming extends CI_Controller {

    private function Check_sesi() {
        $sesi = [
            'id_user' => $this->session->userdata('id_user'),
            'username' => $this->session->userdata('uname'),
            'ava' => $this->session->userdata('ava')
        ];
        if (empty($sesi['id_user'])) {
            $result = redirect(base_url('Auth/index/'), 'refresh');
        } else {
            $result = $sesi;
        }
        return $result;
    }

    public function index() {
        $this->Check_sesi();
        $this->load->view('v_streaming');
    }

    public function Chat_send() {
        $sesi = $this->Check_sesi();
        $data = [
            'success' => true,
            'uname' => $sesi['username'],
            'msg' => Post_input('message'),
            'ava' => $sesi['ava']
        ];
        ToJson($data);
    }

}
