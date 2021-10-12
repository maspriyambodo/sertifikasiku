<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_materi extends CI_Model {

    public function index() {
        $exec = $this->db->query('select * from dt_materi');
        mysqli_next_result($this->db->conn_id);
        return $exec;
    }

    public function sesi() {
        $exec = $this->db->query('select * from mt_sesimateri');
        mysqli_next_result($this->db->conn_id);
        return $exec;
    }

    public function pro_add($data) {
        $exec = $this->db->insert('dt_materi', $data);  
        return $exec;
    }

    
    public function Get_id($id_materi) {
        $exec = $this->db->query(" select * from dt_materi where id = '$id_materi' ");
        return $exec;
    }


    public function delete($id_materi){
        $query = $this->db->query("update dt_materi set stat = '0' where id = '$id_materi' ");
        return $query;
    }

    public function update($data){
        $query = $this->db->query("update dt_materi set id_sesi = '$data[id_sesi]',
        link_video = '$data[link_video]',
        nama_materi = '$data[nama_materi]',
        time_start = '$data[time_start]',
        time_stop = '$data[time_stop]',
        deskripsi = '$data[deskripsi]',		
        sysupdateuser = '$data[sysupdateuser]',
        sysupdatedate = '$data[sysupdatedate]'
        where id = '$data[id]' ");       
        return $query;
    }

    
    
}
