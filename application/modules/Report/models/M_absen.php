<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_absen extends CI_Model {

    var $table = 'tr_absensi';
    var $column_order = [null, 'sys_users.uname', 'sys_roles.`name`', 'dt_users.nama', 'dt_users.telp', 'dt_users.pekerjaan', null, 'mt_sesimateri.nama', 'dt_materi.nama_materi', 'dt_materi.narasumber', 'title_narsum', 'tr_absensi.rating_materi', 'tr_absensi.syscreatedate']; //set column field database for datatable orderable
    var $column_search = ['sys_users.uname', 'dt_users.nama', 'dt_users.telp', 'dt_users.pekerjaan', 'mt_sesimateri.nama', 'dt_materi.nama_materi', 'dt_materi.narasumber', 'title_narsum', 'tr_absensi.syscreatedate']; //set column field database for datatable searchable 
    var $order = ['mt_sesimateri.id' => 'asc']; // default order 

    private function _filter() {
        $role_id = Dekrip($this->session->userdata('role_id'));
        $id_user = Dekrip($this->session->userdata('id_user'));
        if ($role_id == 1) {
            $exec = $this->db->select('tr_absensi.id AS id_absensi,sys_users.uname AS email,sys_roles.`name` AS role_name,dt_users.nama AS fullname,dt_users.telp,dt_users.pekerjaan,DATE_FORMAT(dt_materi.time_start,"%d %b %Y") AS time_start,mt_sesimateri.nama AS nama_sesi,dt_materi.nama_materi,dt_materi.narasumber,dt_materi.title_narsum,tr_absensi.rating_materi,tr_absensi.syscreatedate AS waktu_absen');
            $this->db->from($this->table)
                    ->join('sys_users', 'tr_absensi.user_id = sys_users.id')
                    ->join('sys_roles', 'sys_users.role_id = sys_roles.id')
                    ->join('dt_users', 'dt_users.sys_user_id = sys_users.id')
                    ->join('dt_materi', 'tr_absensi.materi_id = dt_materi.id')
                    ->join('mt_sesimateri', 'dt_materi.id_sesi = mt_sesimateri.id')
                    ->group_by('tr_absensi.user_id')
                    ->group_by('tr_absensi.materi_id')
                    ->order_by('mt_sesimateri.id ASC');
        } else {
            $exec = $this->db->select('tr_absensi.id AS id_absensi,sys_users.uname AS email,sys_roles.`name` AS role_name,dt_users.nama AS fullname,dt_users.telp,dt_users.pekerjaan,DATE_FORMAT(dt_materi.time_start,"%d %b %Y") AS time_start,mt_sesimateri.nama AS nama_sesi,dt_materi.nama_materi,dt_materi.narasumber,dt_materi.title_narsum,tr_absensi.rating_materi,tr_absensi.syscreatedate AS waktu_absen');
            $this->db->from($this->table)
                    ->join('sys_users', 'tr_absensi.user_id = sys_users.id')
                    ->join('sys_roles', 'sys_users.role_id = sys_roles.id')
                    ->join('dt_users', 'dt_users.sys_user_id = sys_users.id')
                    ->join('dt_materi', 'tr_absensi.materi_id = dt_materi.id')
                    ->join('mt_sesimateri', 'dt_materi.id_sesi = mt_sesimateri.id')
                    ->where('`sys_users`.`id`', $id_user, false)
                    ->group_by('tr_absensi.user_id')
                    ->group_by('tr_absensi.materi_id')
                    ->order_by('mt_sesimateri.id ASC');
        }
        return $exec;
    }

    private function _get_datatables_query() {
        $this->_filter();
        $i = 0;
        foreach ($this->column_search as $item) { // loop column 
            if ($_POST['search']['value']) { // if datatable send POST for search
                if ($i === 0) { // first loop
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if (isset($_POST['order'])) { // here order processing
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function lists() {
        $this->_get_datatables_query();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered() {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all() {
        $this->_filter();
        return $this->db->count_all_results();
    }

    public function _statistik() {
        $exec = $this->db->select('dt_materi.id,dt_materi.narasumber,Sum( tr_absensi.rating_materi ) AS rating,dt_materi.nama_materi')
                ->from('dt_materi')
                ->join('tr_absensi', 'tr_absensi.materi_id = dt_materi.id ', 'LEFT')
                ->group_by('dt_materi.id')
                ->get()
                ->result();
        return $exec;
    }

    public function _userLogin() {
        $exec = $this->db->select('dt_materi.narasumber,dt_materi.nama_materi,Count(DISTINCT(tr_absensi.user_id)) AS user_hadir')
                ->from('dt_materi')
                ->join('tr_absensi', 'tr_absensi.materi_id = dt_materi.id', 'LEFT')
                ->group_by('dt_materi.id')
                ->get()
                ->result();
        return $exec;
    }

    public function detail_rating($id_materi) {
        $exec = $this->db->select('sys_users.uname,dt_users.nama AS fullname,dt_materi.narasumber,dt_materi.title_narsum,dt_materi.nama_materi,tr_absensi.rating_materi')
                ->from('tr_absensi')
                ->join('dt_materi', 'tr_absensi.materi_id = dt_materi.id', 'LEFT')
                ->join('sys_users', 'tr_absensi.user_id = sys_users.id', 'LEFT')
                ->join('dt_users', 'dt_users.sys_user_id = sys_users.id')
                ->where('`tr_absensi`.`materi_id`', $id_materi, false)
                ->group_by('tr_absensi.user_id')
                ->get()
                ->result();
        return $exec;
    }

}
