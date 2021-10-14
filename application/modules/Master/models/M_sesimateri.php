<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_sesimateri extends CI_Model {

    public function index() {
        $exec = $this->db->query('select * from mt_sesimateri');
        mysqli_next_result($this->db->conn_id);
        return $exec;
    }

    public function pro_add($data) {
        $exec = $this->db->insert('mt_sesimateri', $data);  
        return $exec;
    }

    
    public function Get_id($id) {
        $exec = $this->db->query(" select * from mt_sesimateri where id = '$id' ");
        return $exec;
    }


    public function delete($id){
        $query = $this->db->query("update mt_sesimateri set stat = '0' where id = '$id' ");
        return $query;
    }

    public function active($id){
        $query = $this->db->query("update mt_sesimateri set stat = '1' where id = '$id' ");
        return $query;
    }

    public function update($data){
        $query = $this->db->query("update mt_sesimateri set nama = '$data[nama]',
        sysupdateuser = '$data[sysupdateuser]',
        sysupdatedate = '$data[sysupdatedate]'
        where id = '$data[id]' ");       
        return $query;
    }
    
}
