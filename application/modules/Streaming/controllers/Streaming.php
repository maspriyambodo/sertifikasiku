<?php

defined('BASEPATH') OR exit('No direct script access allowed, are you trying to signin backdoor?');

class Streaming extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_streaming', 'model');
    }

    public function index() {
        $data = [
            'chat' => $this->model->Read_chat(),
            'privilege' => $this->bodo->Check_previlege('Streaming/index/')
        ];
        $this->load->view('v_streaming', $data);
    }

    public function Chat_send() {
        $id_user = Dekrip($this->session->userdata('id_user'));
        $role_id = Dekrip($this->session->userdata('role_id'));
        if (empty($id_user) and empty($role_id)) {
            $this->session->sess_destroy();
            $data = [
                'success' => false
            ];
        } else {
            $data = [
                'success' => true,
                'uname' => $this->session->userdata('uname'),
                'msg' => Post_input('message'),
                'ava' => $this->session->userdata('avatar'),
                'role_name' => $this->session->userdata('role_name'),
                'user_id' => $id_user,
                'role_id' => $role_id
            ];
        }
        $this->model->Insert_chat($data);
        ToJson($data);
    }

}
