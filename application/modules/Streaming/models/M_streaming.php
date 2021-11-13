<?php

defined('BASEPATH') OR exit('No direct script access allowed, are you trying to signin backdoor?');

class M_streaming extends CI_Model {

    public function Read_chat() {
        $id_materi = $this->_getidMateri();
        $exec = $this->db->select('tr_chat.id, tr_chat.user_id, tr_chat.msg, tr_chat.syscreatedate, sys_users.uname,dt_users.nama AS fullname, sys_users.pict, sys_users.role_id,sys_roles.`name` AS role_name')
                ->from('tr_chat')
                ->join('sys_users', 'tr_chat.user_id = sys_users.id', 'LEFT')
                ->join('dt_users', 'sys_users.id = dt_users.sys_user_id', 'LEFT')
                ->join('sys_roles', 'sys_users.role_id = sys_roles.id', 'LEFT')
                ->join('dt_materi', 'tr_chat.materi_id = dt_materi.id', 'LEFT')
                ->where('DAY(tr_chat.syscreatedate)', 'DAY(CURDATE())', false)
                ->where('`dt_materi`.`stat`', 1, false)
                ->where('`tr_chat`.`materi_id`', $id_materi->id, false)
                ->group_by('tr_chat.id')
                ->order_by('tr_chat.id', 'ASC')
                ->get()
                ->result();
        return $exec;
    }

    private function _getidMateri() {
        $id_materi = $this->db->select('dt_materi.id')
                ->from('dt_materi')
                ->where('`dt_materi`.`stat`', 1, false)
                ->get()
                ->row();
        return $id_materi;
    }

    public function Insert_chat($data) {
        $this->db->trans_begin();
        $this->db->set([
            'tr_chat.user_id' => $data['user_id'],
            'tr_chat.msg' => $data['msg'],
            'tr_chat.syscreateuser' => $data['user_id'],
            'tr_chat.syscreatedate' => date('Y-m-d H:i:s'),
            'tr_chat.materi_id' => $data['materi_id']
        ]);
        $this->db->insert('tr_chat');
        $result = $this->db->insert_id();
        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            log_message('error', 'error insert chat');
            $result = false;
        } else {
            $this->db->trans_commit();
        }
        return $result;
    }

    public function Get_detail($id_chat) {
        $exec = $this->db->select('tr_chat.id, tr_chat.user_id, tr_chat.msg, tr_chat.syscreatedate, sys_users.uname, sys_users.pict, sys_users.role_id,sys_roles.`name` AS role_name')
                ->from('tr_chat')
                ->join('sys_users', 'tr_chat.user_id = sys_users.id', 'LEFT')
                ->join('sys_roles', 'sys_users.role_id = sys_roles.id', 'LEFT')
                ->where('`tr_chat`.`id`', $id_chat, false)
                ->order_by('tr_chat.id ASC')
                ->limit(1)
                ->get()
                ->row();
        return $exec;
    }

    public function Materi() {
        $exec = $this->db->select('`dt_materi`.`id` AS `id_materi`,
	`dt_materi`.`id_sesi`,
	`dt_materi`.`nama_materi`,
	`dt_materi`.`deskripsi`,
	`dt_materi`.`time_start`,
	`dt_materi`.`time_stop`,
	`dt_materi`.`link_video`,
        `dt_materi`.`narasumber`,
	`mt_sesimateri`.`nama` AS `nama_sesi`')
                ->from('dt_materi')
                ->join('mt_sesimateri', 'dt_materi.id_sesi = mt_sesimateri.id', 'LEFT')
                ->where('`dt_materi`.`stat`', 1, false)
                ->limit(1)
                ->get()
                ->result();
        return $exec;
    }

    public function dir_materi() {
        $exec = $this->db->select('dt_materi.id AS id_materi,
	dt_materi.narasumber,
	dt_materi.nama_materi,
	dt_materi.time_start,
	dt_materi.time_stop,
        dt_materi.stat,
        dt_userinterest.stat AS stat_schedule,
	mt_industri.nama AS nama_segment')
                ->from('dt_materi')
                ->join('mt_industri', 'dt_materi.id_industri = mt_industri.id')
                ->join('dt_userinterest', 'dt_userinterest.id_materi = dt_materi.id', 'LEFT')
                ->where('`dt_materi`.`stat` <>', 2, false)
                ->where('DATE_FORMAT(dt_materi.time_start,"%Y-%m-%d") >=', 'DATE_FORMAT(NOW(),"%Y-%m-%d")', false)
                ->group_by('dt_materi.id')
                ->order_by('date_format( dt_materi.time_start, "%Y-%m-%d" ) ASC')
                ->order_by('dt_materi.id_sesi ASC')
                ->get()
                ->result();
        return $exec;
    }

    public function Materi2() {
        $exec = $this->db->select('dt_materi.id AS id_materi,dt_materi.id_sesi,dt_materi.nama_materi,dt_materi.deskripsi,dt_materi.time_start,dt_materi.time_stop,dt_materi.link_video,mt_sesimateri.nama AS nama_sesi')
                ->from('dt_materi')
                ->join('mt_sesimateri', 'dt_materi.id_sesi = mt_sesimateri.id', 'LEFT')
                ->where('`dt_materi`.`id`', 3, false)
                ->get()
                ->result();
        return $exec;
    }

    public function Kick_user($id_user) {
        $this->db->trans_begin();
        $this->db->set([
                    '`sys_users`.`login_attempt`' => 3 + false,
                    '`sys_users`.`sysupdateuser`' => $id_user + false,
                    'sys_users.sysupdatedate' => date('Y-m-d H:i:s')
                ])
                ->where('`sys_users`.`id`', $id_user, false)
                ->update('sys_users');
        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            log_message('error', 'error while Kick_user => ./application/modules/Streaming/models/M_streaming.php Line ');
        } else {
            $this->db->trans_commit();
        }
    }

//    public function set_absensi($data) {
//        $exec = $this->db->select('tr_absensi.id AS id_absensi')
//                ->from('tr_absensi')
//                ->where('`tr_absensi`.`user_id`', $data['id_user'], false)
//                ->where('`tr_absensi`.`materi_id`', $data['id_materi'], false)
//                ->where('`tr_absensi`.`stat`', 1, false)
//                ->get()
//                ->row();
//        if (!empty($exec)) {
//            $result = $exec->id_absensi;
//        } else {
//            $this->db->set([
//                        '`tr_absensi`.`user_id`' => $data['id_user'] + false,
//                        '`tr_absensi`.`materi_id`' => $data['id_materi'] + false,
//                        '`tr_absensi`.`stat`' => 1 + false,
//                        '`tr_absensi`.`syscreateuser`' => $data['id_user'] + false,
//                        'tr_absensi.syscreatedate' => date('Y-m-d H:i:s')
//                    ])
//                    ->insert('tr_absensi');
//            $result = $this->db->insert_id();
//        }
//        return $exec->id_absensi;
//    }

    public function enable_login() {
        $this->db->trans_begin();
        $this->db->set('`sys_app`.`login_member`', 1, false)
                ->update('sys_app');
        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            $result = false;
        } else {
            $this->db->trans_commit();
            $result = true;
        }
        return $result;
    }

    public function disable_login() {
        $this->db->trans_begin();
        $this->db->set('`sys_app`.`login_member`', 0, false)
                ->update('sys_app');
        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            $result = false;
        } else {
            $this->db->trans_commit();
            $result = true;
        }
        return $result;
    }

    public function login_clear() {
        $this->db->set('`sys_users`.`login_stat`', 0, false)
                ->update('sys_users');
    }

    public function input_name($data) {
        $this->db->set('dt_users.nama', $data['fullname'])
                ->where('`dt_users`.`sys_user_id`', $data['id_users'])
                ->update('dt_users');
        return $this->insert_absensi($data);
    }

    private function insert_absensi($data) {//untuk set rating materi
        $this->db->set([
                    '`tr_absensi`.`user_id`' => $data['id_users'] + false,
                    '`tr_absensi`.`materi_id`' => $data['id_materi'] + false,
                    '`tr_absensi`.`rating_materi`' => $data['rating'] + false,
                    '`tr_absensi`.`stat`' => 1 + false,
                    '`tr_absensi`.`syscreateuser`' => $data['id_users'] + false,
                    'tr_absensi.syscreatedate' => date('Y-m-d H:i:s')
                ])
                ->insert('tr_absensi');
        return true;
    }

    public function sponsor() {
        $exec = $this->db->select('dt_sponsor.id,dt_sponsor.kategori,dt_sponsor.nama,dt_sponsor.path,dt_sponsor.url_website,dt_sponsor.stat ')
                ->from('dt_sponsor')
                ->where('`dt_sponsor`.`stat`', 1, false)
                ->get()
                ->result();
        return $exec;
    }

    public function _viewers() {
        $exec = $this->db->select()
                ->from('sys_users')
                ->where('`sys_users`.`login_stat`', 1, false)
                ->count_all_results();
        return $exec;
    }

    public function _setReminder($data) {
        $check_exists = $this->db->select('dt_userinterest.id')
                ->from('dt_userinterest')
                ->where('`dt_userinterest`.`id_user`', $data['id_user'], false)
                ->where('`dt_userinterest`.`id_materi`', $data['id_materi'] + false)
                ->get()
                ->result();
        if (!empty($check_exists[0]->id)) {
            $result = $this->_UnsetReminder($data);
        } else {
            $this->db->trans_begin();
            $this->db->set([
                        '`dt_userinterest`.`id_user`' => $data['id_user'] + false,
                        '`dt_userinterest`.`id_materi`' => $data['id_materi'] + false,
                        '`dt_userinterest`.`stat`' => $data['stat'] + false,
                        '`dt_userinterest`.`syscreateuser`' => $data['syscreateuser'] + false,
                        'dt_userinterest.syscreatedate' => $data['syscreatedate']
                    ])
                    ->insert('dt_userinterest');
            if ($this->db->trans_status() === false) {
                $this->db->trans_rollback();
                $result = false;
            } else {
                $this->db->trans_commit();
                $result = true;
            }
        }
        return $result;
    }

    public function _UnsetReminder($data) {
        $this->db->trans_begin();
        $this->db->set([
                    '`dt_userinterest`.`stat`' => $data['stat'] + false,
                    '`dt_userinterest`.`sysupdateuser`' => $data['sysupdateuser'] + false,
                    'dt_userinterest.sysupdatedate' => $data['sysupdatedate']
                ])
                ->where('`dt_userinterest`.`id_materi`', $data['id_materi'] + false)
                ->where('`dt_userinterest`.`id_user`', $data['id_user'] + false)
                ->update('dt_userinterest');
        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            $result = false;
        } else {
            $this->db->trans_commit();
            $result = true;
        }
        return $result;
    }

}
