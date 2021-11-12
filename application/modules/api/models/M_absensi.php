<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_absensi extends CI_Model {

    public function index($limit_start, $limit_length) {
        $exec = $this->db->select('tr_absensi.id AS id_absensi,sys_users.uname AS email,sys_roles.`name` AS role_name,dt_users.nama AS fullname,dt_users.telp,dt_users.pekerjaan,DATE_FORMAT(dt_materi.time_start,"%d %b %Y") AS time_start,mt_sesimateri.nama AS nama_sesi,dt_materi.nama_materi,dt_materi.narasumber,dt_materi.title_narsum,tr_absensi.rating_materi,tr_absensi.syscreatedate AS waktu_absen')
                ->from('tr_absensi')
                ->join('sys_users', 'tr_absensi.user_id = sys_users.id')
                ->join('sys_roles', 'sys_users.role_id = sys_roles.id')
                ->join('dt_users', 'dt_users.sys_user_id = sys_users.id')
                ->join('dt_materi', 'tr_absensi.materi_id = dt_materi.id')
                ->join('mt_sesimateri', 'dt_materi.id_sesi = mt_sesimateri.id')
                ->group_by('tr_absensi.user_id')
                ->group_by('tr_absensi.materi_id')
                ->order_by('mt_sesimateri.id ASC')
                ->limit($limit_length, $limit_start)
                ->get()
                ->result();
        return $exec;
    }

    public function count_all() {
        $exec = $this->db->select('tr_absensi.id')
                ->from('tr_absensi')
                ->join('sys_users', 'tr_absensi.user_id = sys_users.id')
                ->join('sys_roles', 'sys_users.role_id = sys_roles.id')
                ->join('dt_users', 'dt_users.sys_user_id = sys_users.id')
                ->join('dt_materi', 'tr_absensi.materi_id = dt_materi.id')
                ->join('mt_sesimateri', 'dt_materi.id_sesi = mt_sesimateri.id')
                ->group_by('tr_absensi.user_id')
                ->group_by('tr_absensi.materi_id')
                ->order_by('mt_sesimateri.id ASC')
                ->count_all_results();
        return $exec;
    }

}
