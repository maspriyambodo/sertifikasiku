<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_klasifikasi extends CI_Model {

    var $table = 'mt_klasifikasi';
    var $column_order = ['nama']; //set column field database for datatable orderable
    var $column_search = ['nama']; //set column field database for datatable searchable
    var $order = ['id' => 'asc']; // default order

    private function _get_datatables_query() {
        $this->db->select()
                ->from($this->table)
                ->where('`mt_klasifikasi`.`stat` <>', 2, false);
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
        $this->db->select()
                ->from($this->table)
                ->where('`mt_klasifikasi`.`stat` <>', 2, false);
        return $this->db->count_all_results();
    }

    public function Edit($id) {
        $exec = $this->db->select()
                ->from('mt_klasifikasi')
                ->where('`mt_klasifikasi`.`id`', $id, false)
                ->get()
                ->row();
        return $exec;
    }

    public function Update($data, $id) {
        $this->db->trans_begin();
        $this->db->set($data)
                ->where('`mt_klasifikasi`.`id`', $id, false)
                ->update('mt_klasifikasi');
        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            redirect(base_url('Master/Klasifikasi/index/'), $this->session->set_flashdata('err_msg', 'error while update data!'));
        } else {
            $this->db->trans_commit();
            redirect(base_url('Master/Klasifikasi/index/'), $this->session->set_flashdata('succ_msg', 'data has been changed successfully!'));
        }
    }

    public function Add($data) {
        $this->db->trans_begin();
        $this->db->insert('mt_klasifikasi', $data);
        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            redirect(base_url('Master/Klasifikasi/index/'), $this->session->set_flashdata('err_msg', 'error while inserting new data!'));
        } else {
            $this->db->trans_commit();
            redirect(base_url('Master/Klasifikasi/index/'), $this->session->set_flashdata('succ_msg', 'data has been saved successfully!'));
        }
    }

}
