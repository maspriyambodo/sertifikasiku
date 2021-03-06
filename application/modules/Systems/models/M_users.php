<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_users extends CI_Model {

    var $table = 'sys_users';
    var $column_order = array('sys_users.id', 'sys_users.uname', 'dt_users.nama', 'sys_roles.name', null, null); //set column field database for datatable orderable
    var $column_search = array('sys_users.uname', 'sys_roles.name', 'dt_users.nama'); //set column field database for datatable searchable 
    var $order = array('id' => 'asc'); // default order 

    public function index($param) {
        $exec = $this->db->query('CALL sys_users_select("' . $param['param'] . '",' . $param['id_user'] . ',' . $param['panjang'] . ',' . $param['mulai'] . ');');
        mysqli_next_result($this->db->conn_id);
        return $exec->result();
    }

    private function _filter() {
        $role_id = $this->bodo->Dec($this->session->userdata('role_id'));
        $id_user = $this->bodo->Dec($this->session->userdata('id_user'));
        if ($role_id == 1 or $role_id == 2) {
            $exec = $this->db->select('sys_users.id,sys_users.uname,sys_users.pwd,sys_users.role_id,sys_users.pict,sys_users.stat,sys_roles.name, dt_users.nama AS fullname');
            $this->db->from($this->table)
                    ->join('sys_roles', '`sys_users`.`role_id` = `sys_roles`.`id`')
                    ->join('dt_users', 'sys_users.id = dt_users.sys_user_id');
        } else {
            $exec = $this->db->select('sys_users.id,sys_users.uname,sys_users.pwd,sys_users.role_id,sys_users.pict,sys_users.stat,sys_roles.name, dt_users.nama AS fullname');
            $this->db->from($this->table)
                    ->join('sys_roles', '`sys_users`.`role_id` = `sys_roles`.`id`')
                    ->join('dt_users', 'sys_users.id = dt_users.sys_user_id')
                    ->where('`sys_users`.`id`', $id_user, false)
                    ->or_where('`sys_roles`.`parent_id`', $role_id, false);
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

    public function Role($param) {
        $exec = $this->db->query('CALL sys_roles_select(' . $param . ');');
        mysqli_next_result($this->db->conn_id);
        return $exec->result();
    }

    public function Save($data) {
        $exec = $this->db->query('CALL sys_users_insert("' . $data['uname'] . '","' . $data['pwd'] . '",' . $data['role_id'] . ',"' . $data['pict'] . '",' . $data['stat'] . ',' . $data['user_login'] . ',"' . $data['fullname'] . '","' . $data['telp'] . '");');
        if (empty($exec->conn_id->affected_rows) or $exec->conn_id->affected_rows == 0) {
            log_message('error', APPPATH . 'modules/Systems/models/M_users -> function Save ' . 'error ketika sys_users_insert');
            $result = redirect(base_url('Systems/Users/Add/'), $this->session->set_flashdata('err_msg', 'failed, error while processing user data!'));
        } else {
            mysqli_next_result($this->db->conn_id);
            $result = redirect(base_url('Systems/Users/index/'), $this->session->set_flashdata('succ_msg', 'success, data user has been processing'));
        }
        return $result;
    }

    public function Check($uname) {
        $exec = $this->db->select('sys_users.uname')
                ->from('sys_users')
                ->where('sys_users.uname', $uname)
                ->get()
                ->result();
        return $exec;
    }

    public function Stat($data) {
        $exec = $this->db->query('CALL sys_users_stat(' . $data['id_user'] . ',' . $data['user_login'] . ',' . $data['stat_active'] . ');');
        mysqli_next_result($this->db->conn_id);
        return $exec;
    }

    public function Reset($data, $id) {
        $this->db->trans_begin();
        $this->db->set($data)
                ->where('`sys_users`.`id`', $id, false)
                ->update('sys_users');
        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            $result = redirect(base_url('Systems/Users/index/'), $this->session->set_flashdata('err_msg', 'failed, error while processing user data'));
        } else {
            $this->db->trans_commit();
            $result = redirect(base_url('Systems/Users/index/'), $this->session->set_flashdata('succ_msg', 'success, user password has been reset'));
        }
    }

    /* public function Import_m($data) 
     * sys_users.uname,
      sys_users.role_id,
      sys_users.pict,
      sys_users.stat,
      sys_users.syscreateuser,
      sys_users.syscreatedate
     */

    public function Import_m($data) {
        $this->db->insert_batch('sys_users', $data);
    }

    public function Get_userid($mail) {
        $exec = $this->db->select('sys_users.id AS sys_user_id,sys_users.uname,dt_users.nama AS fullname')
                ->from('sys_users')
                ->join('dt_users', 'sys_users.id = dt_users.sys_user_id', 'LEFT')
                ->where('sys_users.uname', $mail)
                ->limit(1)
                ->get()
                ->row();
        return $exec;
    }

    public function Get_detail($mail) {
        $exec = $this->db->select('sys_users.id AS sys_user_id,sys_users.uname,sys_users.login_stat,sys_users.login_attempt,dt_users.nama AS fullname,dt_users.sys_user_id AS user_id')
                ->from('sys_users')
                ->join('dt_users', 'sys_users.id = dt_users.sys_user_id', 'LEFT')
                ->where('sys_users.uname', $mail)
                // ->where('`sys_users`.`login_stat`', 0, false) // fungsi untuk limit login hanya 1 device
                ->limit(1)
                ->get()
                ->result();
        return $exec;
    }

    public function insert_dtuser($data) {
        $this->db->insert_batch('dt_users', $data);
    }

    public function Cek_dulikat($uname) {
        $exec = $this->db->select()
                ->from('sys_users')
                ->where('sys_users.uname', $uname)
                ->count_all_results();
        return $exec;
    }

    public function set_password($param) {
        $this->db->set('sys_users.pwd', $param['otp'])
                ->where('`sys_users`.`id`', $param['sys_user_id'], false)
                ->update('sys_users');
    }

    public function set_loginstat($id) {
        $this->db->set('`sys_users`.`login_stat`', 1, false)
                ->set('sys_users.ip_address', $this->input->ip_address())
                ->set('sys_users.last_login', date('Y-m-d H:i:s'))
                ->set('sys_users.user_agent', $this->agent->platform() . ', ' . $this->agent->browser() . ', ' . $this->agent->version())
                ->where('`sys_users`.`id`', $id, false)
                ->update('sys_users');
    }

    public function _roleUser($role_name) {
        $exec = $this->db->select('sys_roles.id')
                ->from('sys_roles')
                ->where('sys_roles.name', $role_name)
                ->get()
                ->row();
        $role_id = $exec->id;
        if (empty($role_id)) {
            $this->db->query('CALL sys_roles_insert("' . $role_name . '","generate from import user",0,' . $this->bodo->Dec($this->session->userdata('id_user')) . ');');
            mysqli_next_result($this->db->conn_id);
            $exec2 = $this->db->select('sys_roles.id')
                    ->from('sys_roles')
                    ->where('sys_roles.name', $role_name)
                    ->get()
                    ->row();
            $role_id = $exec2->id;
        }
        return $role_id;
    }

}
