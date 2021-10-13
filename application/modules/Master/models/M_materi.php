<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_materi extends CI_Model {

    public function index() {
        $exec = $this->db->query("select a.*,
        date_format(a.time_start, '%d-%m-%Y') as tgl_mulai,
        date_format(a.time_start, '%H:%i') as jam_mulai,
        date_format(a.time_stop, '%d-%m-%Y') as tgl_selesai,
        date_format(a.time_stop, '%H:%i') as jam_selesai, b.nama as nama_sesi from dt_materi a left join mt_sesimateri b on a.id_sesi = b.id");
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

    public function active($id_materi){
        $query = $this->db->query("update dt_materi set stat = '1' where id = '$id_materi' ");
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
