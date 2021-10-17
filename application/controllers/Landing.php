<?php

defined('BASEPATH') OR exit('are you trying to signin backdoor?');

class Landing extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Systems/M_users', 'model');
    }

    public function index() {
        $this->parser->parse('v_landing', []);
    }

    public function Get_mail() {
        $uname = Post_get('email');
        $exec = $this->model->Get_userid($uname);
        if (!empty($exec)) {
            $data = [
                'status' => true,
                'sys_user_id' => Enkrip($exec->sys_user_id)
            ];
        } else {
            $data = [
                'status' => false
            ];
        }
        return ToJson($data);
    }

}
