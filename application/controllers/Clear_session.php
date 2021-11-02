<?php

// crontab -e 
// * 23 * * * /usr/bin/php /var/www/html/sertifikasiku/index.php Clear_session/index/

defined('STDIN');

class Clear_session extends CI_Controller {

    public function index() {
        echo exec('rm -rf ' . APPPATH . 'sessions/*');
        log_message('error', 'success clear all sessions with cronjob!');
        $this->db->set('`sys_users`.`login_stat`', 0, false)
                ->update('sys_users');// for reset login_stat table sys_users
        log_message('error', 'success clear all login_stat with cronjob!');
    }

}
