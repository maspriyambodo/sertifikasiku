<?php

defined('BASEPATH') OR exit('No direct script access allowed, are you trying to signin backdoor?');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_auth');
    }

    private function Check_session() {
        if ($this->session->userdata('id_user') and $this->session->userdata('uname') and $this->session->userdata('stat_aktif') and $this->session->userdata('role_id')) {
            $result = redirect(base_url('Dashboard'), 'refresh');
        } elseif ($this->session->tempdata('auth_sekuriti')) {
            $result = auth_sekuriti();
        } elseif ($this->session->tempdata('blocked_account')) {
            $result = blocked_account();
        } else {
            $result = true;
        }
        return $result;
    }

    public function index() {
        $this->Check_session();
        $data = [
            'csrf' => $this->bodo->Csrf(),
            'siteTitle' => 'Signin System | ' . $this->bodo->Sys('app_name'),
        ];
        $this->parser->parse('v_auth', $data);
    }

    public function Signin() {
        $data = [
            'uname' => Post_input("username"),
            'pwd' => Post_input("password")
        ];
        $exec = $this->M_auth->Signin($data);
        if (!empty($exec) and ($exec->limit_login == 0 or $exec->limit_login != 3)) {
            $hashed = $exec->pwd;
            if (password_verify($data['pwd'], $hashed)) {
                $this->bodo->Set_session($exec);
                $this->M_auth->Remove_penalty($data);
                $result = redirect(base_url('Dashboard'), 'refresh');
            } else {
                $this->Attempt(1);
                $result = redirect(base_url('Signin'), $this->session->set_flashdata('err_msg', 'Sorry, your password was incorrect. Please double-check your password.'));
            }
        } elseif (!empty($exec) and $exec->limit_login == 3) {
            blocked_account();
        } else {
            $this->wp_login($data);
        }
        return $result;
    }

    /* private function wp_login($data) 
     * {
      "id": 404,
      "name": "administrator",
      "url": "",
      "description": "",
      "link": "https://dev.alfabet.io/wordpress/author/administrator/",
      "slug": "administrator",
      "avatar_urls": {
      "24": "https://secure.gravatar.com/avatar/b4ebfb4bb8f525bfe576db44ac099d94?s=24&d=mm&r=g",
      "48": "https://secure.gravatar.com/avatar/b4ebfb4bb8f525bfe576db44ac099d94?s=48&d=mm&r=g",
      "96": "https://secure.gravatar.com/avatar/b4ebfb4bb8f525bfe576db44ac099d94?s=96&d=mm&r=g"
      },
      "meta": [],
      "_links": {
      "self": [
      {
      "href": "https://dev.alfabet.io/wordpress/wp-json/wp/v2/users/404"
      }
      ],
      "collection": [
      {
      "href": "https://dev.alfabet.io/wordpress/wp-json/wp/v2/users"
      }
      ]
      }
      }
     */

    private function wp_login($data) {
        $this->load->library('user_agent');
        $this->curl = new Curl\Curl();
        $this->curl->disableTimeout();
        $this->curl->setHeader('Connection', 'keep-alive');
        $this->curl->setHeader('User-Agent', $this->agent->referrer());
        $this->curl->setFollowLocation(true);
        $this->curl->setBasicAuthentication($data['uname'], $data['pwd']);
        $this->curl->setHeader('Content-Type', 'application/json');
        $this->curl->get('https://dev.alfabet.io/wordpress/wp-json/wp/v2/users/?search=' . $data['uname']);
        $exec = $this->curl->response;
//        foreach ($exec[0]->avatar_urls as $key => $value) {
//            $stdArray[$key] = $value;
//        }
        if (!$exec->code and $exec[0]->id) {//jika berhasil $exec[0]->id
            $sesion = [
                'id_user' => $exec[0]->id,
                'uname' => $exec[0]->name,
                'ava' => 'https://secure.gravatar.com/avatar/b4ebfb4bb8f525bfe576db44ac099d94?s=96&d=mm&r=g'
            ];
            $this->session->set_userdata($sesion);
            $result = redirect(base_url('Streaming/index/'), 'refresh');
        } else {//jika salah
            //stdClass Object
            //(
            //    [code] => incorrect_password
            //    [message] => The provided password is an invalid application password.
            //    [data] => 
            //)
            $this->Attempt(2);
            $result = redirect(base_url('Auth/index/'), $this->session->set_flashdata('err_msg', '<b>' . $exec->code . '</b>, ' . $exec->message));
        }
        return $result;
    }

    private function Attempt($id) {
        $attempt = $this->session->userdata('attempt');
        $attempt++;
        $this->session->set_userdata('attempt', $attempt);
        $data = [
            'uname' => Post_input("username"),
            'attempt' => $attempt
        ];
        switch ($id) {
            case 1:
                $this->M_auth->Penalty($data);
                if ($attempt == 3) {
                    $this->session->set_tempdata('blocked_account', true, 300);
                    blocked_account();
                }
            case 2:
                if ($attempt == 5) {
                    $this->session->set_tempdata('auth_sekuriti', true, 360);
                    show_404();
                }
        }
    }

    public function Logout() {
        $this->session->sess_destroy();
        return redirect(base_url('Signin'), 'refresh');
    }

}
