<?php

defined('BASEPATH') OR exit('No direct script access allowed, are you trying to signin backdoor?');

class Streaming extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_streaming', 'model');
        $this->id_user = Dekrip($this->session->userdata('id_user'));
        $this->role_id = Dekrip($this->session->userdata('role_id'));
        $this->load->library('user_agent');
    }

    public function index() {
        $data = [
            'sponsor' => $this->model->sponsor(),
            'materi' => $this->model->Materi(),
            'dir_materi' => $this->model->dir_materi(),
            'chat' => $this->load_chat(),
            'privilege' => $this->bodo->Check_previlege('Streaming/index/')
        ];
        return $this->parser->parse('v_streaming', $data);
    }

    private function load_chat() {
        $exec = $this->model->Read_chat();
        foreach ($exec as $key => $value) {
            $nick_name = explode('@', $value->uname);
            $exec[$key]->syscreatedate = date('H:i', strtotime($value->syscreatedate));
            if (empty($exec[$key]->fullname)) {
                $exec[$key]->fullname = $nick_name[0];
            }
        }
        return $exec;
    }

    public function testing() {
        $data = [
            'materi' => $this->model->Materi2(),
            'chat' => $this->model->Read_chat(),
            'privilege' => $this->bodo->Check_previlege('Streaming/index/')
        ];
        return $this->parser->parse('v_streaming2', $data);
    }

    public function testing2() {
        $data = [
            'materi' => $this->model->Materi2(),
            'chat' => $this->model->Read_chat(),
            'privilege' => $this->bodo->Check_previlege('Streaming/index/')
        ];
        return $this->parser->parse('v_dds2', $data);
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
        $fullname = $this->session->userdata('fullname');
        $nickname = explode('@', $this->session->userdata('uname'));
        if (empty($fullname)) {
            $fullname = $nickname[0];
        } else {
            $fullname = $this->session->userdata('fullname');
        }
        if (empty($this->id_user) and empty($this->role_id) or ($this->session->userdata('chat_attempt') === 3)) {
            $this->session->sess_destroy();
            $data['success'] = false;
            $this->session->set_tempdata('blocked_account', true, 300);
        } else {
            $data = [
                'uname' => $this->session->userdata('uname'),
                'fullname' => $fullname,
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
        $data['tym_chat'] = date('H:i');
        $data['block_chat'] = ($block_chat === true ? true : false);
        $data['chat_attempt'] = $this->session->userdata('chat_attempt');
        ToJson($data);
    }

    public function viewers() {
        $random = rand(100, 10000);
        $view = $this->model->_viewers();
        $data = [
            'tot_view' => $view + 472
        ];
        ToJson($data);
    }

    public function Get_detail() {
        $exec = $this->model->Get_detail(Post_get('token')); // Post_get('token') = id_chat
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

//    public function absensi() {
//        $data = [
//            'id_materi' => Post_get('id_materi'),
//            'id_user' => $this->id_user
//        ];
//        $id_absensi = $this->model->set_absensi($data);
//        $response = [
//            'stat' => true,
//            'absensi_id' => $id_absensi
//        ];
//        return ToJson($response);
//    }

    public function set_rating() {
        $fullname = Post_get('user_nama');
        $rating = Post_get('rating');
        $id_materi = Post_get('id_materi');
        $data = [
            'fullname' => $fullname, // untuk table dt_users
            'rating' => $rating, // untuk table tr_absensi
            'id_materi' => $id_materi, // untuk table tr_absensi
            'id_users' => $this->id_user // untuk table tr_absensi
        ];
        $this->model->input_name($data);
    }

//    public function input_name() {
//        $name = Post_get('name');
//        $data = [
//            'id_user' => $this->id_user,
//            'fullname' => $name
//        ];
//        $this->model->input_name($data);
//        return ToJson(['status' => true]);
//    }

    public function enable_login() {
        $exec = $this->model->enable_login();
        if ($exec) {
            $response = [
                'stat' => true
            ];
        } else {
            $response = [
                'stat' => false
            ];
        }
        return ToJson($response);
    }

    public function disable_login() {
        $exec = $this->model->disable_login();
        if ($exec) {
            $response = [
                'stat' => true
            ];
        } else {
            $response = [
                'stat' => false
            ];
        }
        return ToJson($response);
    }

    public function clear_login() {
        $this->model->login_clear();
        $response = [
            'stat' => true
        ];
        return ToJson($response);
    }

    public function set_reminder() {
        $data = [
            'id_user' => $this->id_user,
            'id_materi' => Post_get('id_materi'),
            'stat' => 1,
            'syscreateuser' => $this->id_user,
            'sysupdateuser' => $this->id_user,
            'syscreatedate' => date('Y-m-d H:i:s'),
            'sysupdatedate' => date('Y-m-d H:i:s')
        ];
        $exec = $this->model->_setReminder($data);
        if ($exec) {
            $result = [
                'stat' => true,
                'msg' => 'successfully added reminder note.'
            ];
        } else {
            $result = [
                'stat' => false,
                'msg' => 'error while adding reminder.'
            ];
        }
        return ToJson($result);
    }

    public function unset_reminder() {
        $data = [
            'id_user' => $this->id_user,
            'id_materi' => Post_get('id_materi'),
            'stat' => 0,
            'sysupdateuser' => $this->id_user,
            'sysupdatedate' => date('Y-m-d H:i:s')
        ];
        $exec = $this->model->_UnsetReminder($data);
        if ($exec) {
            $result = [
                'stat' => true,
                'msg' => 'successfully removed reminder note.'
            ];
        } else {
            $result = [
                'stat' => false,
                'msg' => 'error while removing reminder.'
            ];
        }
        return ToJson($result);
    }

    public function absensi_member() {
        $status_absensi = $this->model->status_absensi();
        if ($status_absensi == 1) {
            $response = [
                'status_absensi' => true
            ];
        } else {
            $response = [
                'status_absensi' => false
            ];
        }
        return ToJson($response);
    }

    public function absensi_admin() {
        $id = Post_get('status_absensi');
        $response = [];
        if ($id == 1) {
            $enable_absen = $this->model->enable_absen();
            if ($enable_absen == true) {
                $response['stat'] = true;
            } else {
                $response['stat'] = false;
            }
        } else {
            $disable_absen = $this->model->disable_absen();
            if ($disable_absen == true) {
                $response['stat'] = true;
            } else {
                $response['stat'] = false;
            }
        }
        return ToJson($response);
    }

}
