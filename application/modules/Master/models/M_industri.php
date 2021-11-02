<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_industri extends CI_Model {

    var $table = 'mt_industri';
    var $column_order = ['mt_industri.id', 'mt_industri.nama', null, 'mt_industri.stat']; //set column field database for datatable orderable
    var $column_search = ['mt_industri.nama', 'mt_industri.deskripsi']; //set column field database for datatable searchable 
    var $order = ['id' => 'asc']; // default order

    private function _get_datatables_query() {
        $this->db->select('mt_industri.id,mt_industri.nama,mt_industri.deskripsi,mt_industri.stat')
                ->from($this->table)
                ->where('`mt_industri`.`stat` <>', 2, false);
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
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    public function _save($data) {
        $this->db->trans_begin();
        $this->db->insert($this->table, $data);
        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            $result = false;
        } else {
            $this->db->trans_commit();
            $result = true;
        }
        return $result;
    }

    public function _detail($id) {
        $exec = $this->db->select('mt_industri.id,mt_industri.nama,mt_industri.deskripsi')
                ->from('mt_industri')
                ->where('`mt_industri`.`id`', $id, false)
                ->get()
                ->row();
        return $exec;
    }

    public function _update($data) {
        $this->db->trans_begin();
        $this->db->set([
                    'mt_industri.nama' => $data['e_namatxt'],
                    'mt_industri.deskripsi' => $data['e_desctxt'],
                    '`mt_industri`.`sysupdateuser`' => $data['sysupdateuser'],
                    'mt_industri.sysupdatedate' => $data['sysupdatedate']
                ])
                ->where('`mt_industri`.`id`', $data['id'], false)
                ->update($this->table);
        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            $result = false;
        } else {
            $this->db->trans_commit();
            $result = true;
        }
        return $result;
    }

    public function _disable($id) {
        $this->db->trans_begin();
        $this->db->set([
                    '`mt_industri`.`stat`' => 0 + false
                ])
                ->where('`mt_industri`.`id`', $id, false)
                ->update($this->table);
        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            $result = false;
        } else {
            $this->db->trans_commit();
            $result = true;
        }
        return $result;
    }

    public function _activate($id) {
        $this->db->trans_begin();
        $this->db->set([
                    '`mt_industri`.`stat`' => 1 + false
                ])
                ->where('`mt_industri`.`id`', $id, false)
                ->update($this->table);
        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            $result = false;
        } else {
            $this->db->trans_commit();
            $result = true;
        }
        return $result;
    }

    public function _delete($data) {
        $this->db->trans_begin();
        $this->db->set([
                    '`mt_industri`.`stat`' => 2 + false,
                    '`mt_industri`.`sysdeleteuser`' => $data['id_user'] + false,
                    'mt_industri.sysdeletedate' => $data['tanggal']
                ])
                ->where('`mt_industri`.`id`', $data['id'], false)
                ->update($this->table);
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
