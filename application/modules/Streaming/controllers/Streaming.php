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
                'uname' => $this->session->userdata('uname'),
                'msg' => Post_input('message'),
                'ava' => base_url('assets/images/users/' . $this->session->userdata('avatar')),
                'role_name' => $this->session->userdata('role_name'),
                'user_id' => $id_user,
                'role_id' => $role_id
            ];
            $exec = $this->model->Insert_chat($data);
            if ($exec === false) {
                $data['success'] = 'gagal';
            } else {
                $data['success'] = true;
                $data['chat_id'] = Enkrip($exec);
            }
        }
        ToJson($data);
    }

    public function Get_detail() {
        $id_chat = Dekrip(Post_get('token'));
        $exec = $this->model->Get_detail($id_chat);
        if (empty($exec)) {
            $data = [
                'success' => false,
            ];
        } else {
            $data = [
                'success' => true,
                'uname' => $exec[0]->uname,
                'msg' => $exec[0]->msg,
                'ava' => base_url('assets/images/users/' . $exec[0]->pict),
                'role_name' => $exec[0]->role_name,
                'user_id' => $exec[0]->user_id,
                'role_id' => $exec[0]->role_id,
                'chat_id' => $exec[0]->id
            ];
        }
        return ToJson($data);
    }

}
