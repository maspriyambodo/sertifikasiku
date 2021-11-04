<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_materi extends CI_Model {

    public function index() {
        $exec = $this->db->select('date_format( dt_materi.time_start, "%d-%m-%Y" ) AS tgl_mulai,
	date_format( dt_materi.time_start, "%H:%i" ) AS jam_mulai,
	date_format( dt_materi.time_stop, "%d-%m-%Y" ) AS tgl_selesai,
	date_format( dt_materi.time_stop, "%H:%i" ) AS jam_selesai,
	mt_sesimateri.nama AS nama_sesi,
        dt_materi.id,
        dt_materi.stat,
	dt_materi.id_sesi,
	dt_materi.id_industri,
	dt_materi.id_klasifikasi,
	dt_materi.narasumber,
	dt_materi.title_narsum,
	dt_materi.nama_materi,
	dt_materi.deskripsi,
	dt_materi.link_video,
	mt_industri.nama AS nama_industri,
	mt_klasifikasi.nama AS nama_level')
                ->from('dt_materi')
                ->join('mt_sesimateri', 'dt_materi.id_sesi = mt_sesimateri.id')
                ->join('mt_industri', 'dt_materi.id_industri = mt_industri.id')
                ->join('mt_klasifikasi', 'dt_materi.id_klasifikasi = mt_klasifikasi.id')
                ->where('`dt_materi`.`stat` <>', 2, false)
                ->get()
                ->result();
        return $exec;
    }

    public function sesi() {
        $exec = $this->db->query('select * from mt_sesimateri');
        return $exec->result();
    }

    public function pro_add($data) {
        $exec = $this->db->insert('dt_materi', $data);
        return $exec;
    }

    public function Get_id($id_materi) {
        $exec = $this->db->query("select * from dt_materi where id = '$id_materi'");
        return $exec->result();
    }

    public function delete($id_materi) {
        $query = $this->db->query("update dt_materi set stat = 0 where id = '$id_materi' ");
        return $query;
    }

    public function delete2($id_materi) {
        $query = $this->db->query("update dt_materi set stat = 2 where id = '$id_materi' ");
        return $query;
    }

    public function active($id_materi) {
        $query = $this->db->query("update dt_materi set stat = 1 where id = '$id_materi' ");
        return $query;
    }

    public function update($data, $id) {
        $query = $this->db->set([
                    '`dt_materi`.`id_sesi`' => $data['id_sesi'],
                    '`dt_materi`.`id_industri`' => $data['id_industri'],
                    '`dt_materi`.`id_klasifikasi`' => $data['id_klasifikasi'],
                    'dt_materi.narasumber' => $data['narasumber'],
                    'dt_materi.title_narsum' => $data['title_narsum'],
                    'dt_materi.nama_materi' => $data['nama_materi'],
                    'dt_materi.deskripsi' => $data['deskripsi'],
                    'dt_materi.time_start' => $data['time_start'],
                    'dt_materi.time_stop' => $data['time_stop'],
                    'dt_materi.link_video' => $data['link_video'],
                    '`dt_materi`.`sysupdateuser`' => $data['sysupdateuser'],
                    'dt_materi.sysupdatedate' => $data['sysupdatedate']
                ])
                ->where('`dt_materi`.`id`', $id, false)
                ->update('dt_materi');
        return $query;
    }

    public function bidang_industri() {
        $exec = $this->db->select('mt_industri.id,mt_industri.nama')
                ->from('mt_industri')
                ->where('`mt_industri`.`stat`', 1, false)
                ->get()
                ->result();
        foreach ($exec as $value) {
            $data[] = (object) [
                        'id_industri' => Enkrip($value->id),
                        'nama_industri' => $value->nama
            ];
        }
        return $data;
    }

    public function klasifikasi() {
        $exec = $this->db->select('mt_klasifikasi.id,mt_klasifikasi.nama ')
                ->from('mt_klasifikasi')
                ->where('`mt_klasifikasi`.`stat`', 1, false)
                ->get()
                ->result();
        foreach ($exec as $value) {
            $data[] = (object) [
                        'id_klasifikasi' => Enkrip($value->id),
                        'nama_klasifikasi' => $value->nama
            ];
        }
        return $data;
    }

}
