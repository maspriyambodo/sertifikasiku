<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_dashboard extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->role = $this->bodo->Dec($this->session->userdata('role_id'));
    }

    var $table = 'sys_users';
    var $column_order = [null, 'fullname', 'uname', null, null, 'user_agent', null]; //set column field database for datatable orderable
    var $column_search = ['fullname', 'uname', 'telp', 'pekerjaan', 'user_agent']; //set column field database for datatable searchable 
    var $order = ['id' => 'asc']; // default order 

    private function _filter() {
        $exec = $this->db->select('sys_users.id,sys_users.uname,sys_users.ip_address,sys_users.last_login,sys_users.user_agent,sys_roles.`name` AS role_name,dt_users.nama AS fullname,dt_users.telp,dt_users.pekerjaan')
                ->from('sys_users')
                ->join('sys_roles', 'sys_users.role_id = sys_roles.id', 'LEFT')
                ->join('dt_users', 'sys_users.id = dt_users.sys_user_id', 'LEFT')
                ->where('`sys_users`.`login_stat`', 1, false)
                ->where('DAY(`sys_users`.`last_login`)', date('d'), false)
                ->where('MONTH(`sys_users`.`last_login`)', date('m'), false)
                ->where('YEAR(`sys_users`.`last_login`)', date('Y'), false)
                ->group_by('sys_users.id');
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

    public function Search($searchtxt) {
        $exec = $this->db->select('sys_menu.nama AS menu_nama,sys_menu.icon,sys_menu.link,sys_menu_group.nama AS grup_nama')
                ->from('sys_menu')
                ->join('sys_menu_group', 'sys_menu.group_menu = sys_menu_group.id')
                ->join('sys_permissions', 'sys_menu.id = sys_permissions.id_menu ')
                ->where('`sys_menu`.`stat`', 1, false)
                ->where('`sys_permissions`.`v`', 1, false)
                ->where('`sys_permissions`.`role_id`', $this->role, false)
                ->like('sys_menu.nama', $searchtxt)
                ->or_where('`sys_menu`.`stat`', 1, false)
                ->where('`sys_permissions`.`v`', 1, false)
                ->where('`sys_permissions`.`role_id`', $this->role, false)
                ->like('sys_menu.link', $searchtxt)
                ->get()
                ->result();
        return $exec;
    }

    public function report_login() {
        $exec = $this->db->select('sys_users.id,sys_users.uname,sys_users.ip_address,sys_users.last_login,sys_users.user_agent,sys_roles.`name` AS role_name,dt_users.nama AS fullname,dt_users.telp,dt_users.pekerjaan')
                ->from('sys_users')
                ->join('sys_roles', 'sys_users.role_id = sys_roles.id', 'LEFT')
                ->join('dt_users', 'sys_users.id = dt_users.sys_user_id', 'LEFT')
                ->where('`sys_users`.`login_stat`', 1, false)
                ->where('DAY(`sys_users`.`last_login`)', date('d'), false)
                ->where('MONTH(`sys_users`.`last_login`)', date('m'), false)
                ->where('YEAR(`sys_users`.`last_login`)', date('Y'), false)
                ->group_by('sys_users.id')
                ->get()
                ->result();
        return $exec;
    }

}
