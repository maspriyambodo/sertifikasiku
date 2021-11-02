<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_sponsor extends CI_Model {

    public function index() {
        $exec = $this->db->select('dt_sponsor.id,dt_sponsor.kategori,dt_sponsor.nama,dt_sponsor.path,dt_sponsor.url_website,dt_sponsor.stat')
                ->from('dt_sponsor')
                ->where('`dt_sponsor`.`stat` <>', 2, false)
                ->get()
                ->result();
        return $exec;
    }

    public function pro_add($data) {
        $exec = $this->db->insert('dt_sponsor', $data);
        return $exec;
    }

    public function Get_id($id) {
//        $exec = $this->db->query(" select * from dt_sponsor where id = '$id' ");
        $exec = $this->db->select('dt_sponsor.id,dt_sponsor.kategori,dt_sponsor.nama,dt_sponsor.path,dt_sponsor.url_website')
                ->from('dt_sponsor')
                ->where('`dt_sponsor`.`id`', $id, false)
                ->get()
                ->result();
        $exec[0]->id = Enkrip($exec[0]->id);
        $exec[0]->old_id = Enkrip($id);
        if ($exec[0]->kategori == 1) {//sponsor
            $exec[0]->path = base_url('assets/images/sponsor/' . $exec[0]->path);
        } else {
            $exec[0]->path = base_url('assets/images/media_partner/' . $exec[0]->path);
        }
        return $exec;
    }

    public function delete($id) {
        $query = $this->db->query("update dt_sponsor set stat = 2 where id = '$id' ");
        return $query;
    }

    public function active($id) {
        $query = $this->db->query("update dt_sponsor set stat = 1 where id = '$id' ");
        return $query;
    }

    public function update($data) {
        $this->db->trans_begin();
        $this->db->set([
                    '`dt_sponsor`.`kategori`' => $data['kategori'],
                    'dt_sponsor.nama' => $data['nama'],
                    'dt_sponsor.url_website' => $data['url_website'],
                    '`dt_sponsor`.`sysupdateuser`' => $data['sysupdateuser'],
                    'dt_sponsor.sysupdatedate' => $data['sysupdatedate']
                ])
                ->where('`dt_sponsor`.`id`', $data['id'], false)
                ->update('dt_sponsor');
        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            $result = false;
        } else {
            $this->db->trans_commit();
            $result = true;
        }
        return $result;
    }

    public function update_logo($id, $path) {
        $this->db->trans_begin();
        $this->db->set([
                    'dt_sponsor.path' => $path,
                    '`dt_sponsor`.`sysupdateuser`' => Dekrip($this->session->userdata('id_user')),
                    'dt_sponsor.sysupdatedate' => date('Y-m-d H:i:s')
                ])
                ->where('`dt_sponsor`.`id`', $id, false)
                ->update('dt_sponsor');
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
