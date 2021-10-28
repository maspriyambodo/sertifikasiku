<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_sponsor extends CI_Model {

    public function index() {
        $exec = $this->db->query('select * from dt_sponsor');
        mysqli_next_result($this->db->conn_id);
        return $exec;
    }

    public function pro_add($data) {
        $exec = $this->db->insert('dt_sponsor', $data);
        return $exec;
    }


    public function Get_id($id) {
        $exec = $this->db->query(" select * from dt_sponsor where id = '$id' ");
        return $exec;
    }


    public function delete($id){
        $query = $this->db->query("update dt_sponsor set stat = '0' where id = '$id' ");
        return $query;
    }

    public function active($id){
        $query = $this->db->query("update dt_sponsor set stat = '1' where id = '$id' ");
        return $query;
    }

    public function update($data){
        $query = $this->db->query("update dt_sponsor set nama = '$data[nama]',
        kategori = '$data[kategori]',
        path = '$data[path]',
        url_website = '$data[url_website]',
        sysupdatedate = '$data[sysupdatedate]'
        where id = '$data[id]' ");
        return $query;
    }

}
