<?php

defined('BASEPATH') OR exit('No direct script access allowed, are you trying to signin backdoor?');

class Streaming extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_streaming', 'model');
        $this->id_user = Dekrip($this->session->userdata('id_user'));
        $this->role_id = Dekrip($this->session->userdata('role_id'));
    }

    public function index() {
        $data = [
            'materi' => $this->model->Materi(),
            'chat' => $this->model->Read_chat(),
            'privilege' => $this->bodo->Check_previlege('Streaming/index/')
        ];
        return $this->parser->parse('v_streaming', $data);
    }

    public function Chat_send() {
        $this->load->helper(['text', 'offensive_words']);
//        $string = word_censor(Post_input('message'), word_block(), '<del class="text-danger">censor</del>');
        $string = word_censor(Post_input('message'), word_block(), '<del class="text-danger">censor</del>');
        if (strpos($string, 'censor')) {
            $attempt = $this->session->userdata('chat_attempt');
            $attempt++;
            $this->session->set_userdata('chat_attempt', $attempt);
            $block_chat = true;
        }
        return $this->_chatSend($string, $block_chat);
    }

    private function _chatSend($string, $block_chat) {
        if (empty($this->id_user) and empty($this->role_id) or ($this->session->userdata('chat_attempt') === 3)) {
            $this->session->sess_destroy();
            $data['success'] = false;
            $this->session->set_tempdata('blocked_account', true, 300);
        } else {
            $data = [
                'uname' => $this->session->userdata('uname'),
                'fullname' => $this->session->userdata('fullname'),
                'key' => Enkrip($this->session->userdata('uname')),
                'msg' => $string,
                'ava' => base_url('assets/images/users/' . $this->session->userdata('avatar')),
                'role_name' => $this->session->userdata('role_name'),
                'user_id' => $this->id_user,
                'role_id' => $this->role_id,
                'materi_id' => Post_input('materi_id')
            ];
            $exec = $this->model->Insert_chat($data);
            if ($exec === false) {
                $data['success'] = 'gagal';
            } else {
                $data['success'] = true;
                $data['chat_id'] = $exec;
            }
        }
        $data['block_chat'] = ($block_chat === true ? true : false);
        $data['chat_attempt'] = $this->session->userdata('chat_attempt');
        ToJson($data);
    }

    public function Get_detail() {
        $exec = $this->model->Get_detail(Post_get('token'));// Post_get('token') = id_chat
        if (empty($exec)) {
            $data = [
                'success' => false,
            ];
        } else {
            $data = [
                'success' => true,
                'uname' => $exec->uname,
                'key' => base64_encode($exec->uname),
                'msg' => $exec->msg,
                'ava' => base_url('assets/images/users/' . $exec->pict),
                'role_name' => $exec->role_name,
                'user_id' => $exec->user_id,
                'role_id' => $exec->role_id,
                'chat_id' => $exec->id
            ];
        }
        return ToJson($data);
    }

    public function punishment() {
        $this->model->Kick_user($this->id_user);
        $this->session->sess_destroy();
        blocked_account();
    }

}
