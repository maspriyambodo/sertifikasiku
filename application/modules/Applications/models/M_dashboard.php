<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_dashboard extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->role = $this->bodo->Dec($this->session->userdata('role_id'));
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
        $exec = $this->db->select('sys_users.id,sys_users.uname,sys_users.ip_address,sys_users.last_login,sys_roles.`name` AS role_name,dt_users.nama AS fullname,dt_users.telp,dt_users.pekerjaan')
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
