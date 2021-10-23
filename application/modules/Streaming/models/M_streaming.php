<?php

defined('BASEPATH') OR exit('No direct script access allowed, are you trying to signin backdoor?');

class M_streaming extends CI_Model {

    public function Read_chat() {
        $exec = $this->db->select('tr_chat.id, tr_chat.user_id, tr_chat.msg, tr_chat.syscreatedate, sys_users.uname,dt_users.nama AS fullname, sys_users.pict, sys_users.role_id,sys_roles.`name` AS role_name')
                ->from('tr_chat')
                ->join('sys_users', 'tr_chat.user_id = sys_users.id', 'LEFT')
                ->join('dt_users', 'sys_users.id = dt_users.sys_user_id', 'LEFT')
                ->join('sys_roles', 'sys_users.role_id = sys_roles.id', 'LEFT')
                ->where('DAY(tr_chat.syscreatedate)', 'DAY(CURDATE())', false)
                ->order_by('tr_chat.id', 'ASC')
                ->get()
                ->result();
        return $exec;
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
        $exec = $this->db->select('dt_materi.id AS id_materi,dt_materi.id_sesi,dt_materi.nama_materi,dt_materi.deskripsi,dt_materi.time_start,dt_materi.time_stop,dt_materi.link_video,mt_sesimateri.nama AS nama_sesi')
                ->from('dt_materi')
                ->join('mt_sesimateri', 'dt_materi.id_sesi = mt_sesimateri.id', 'LEFT')
                ->where('`dt_materi`.`stat`', 1, false)
                ->limit(1)
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

    public function set_absensi($data) {
        $this->db->set([
                    '`tr_absensi`.`user_id`' => $data['id_user'] + false,
                    '`tr_absensi`.`materi_id`' => $data['id_materi'] + false,
                    '`tr_absensi`.`stat`' => 1 + false,
                    '`tr_absensi`.`syscreateuser`' => $data['id_user'] + false,
                    'tr_absensi.syscreatedate' => date('Y-m-d H:i:s')
                ])
                ->insert('tr_absensi');
    }

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

}
