<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Materi extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_materi', 'model');
        $this->user = $this->bodo->Dec($this->session->userdata('id_user'));
    }

    public function index() {
        $data = [
            'data' => $this->model->index(),
            'sesi' => $this->model->sesi(),
            'bidang_industri' => $this->model->bidang_industri(),
            'klasifikasi' => $this->model->klasifikasi(),
            'csrf' => $this->bodo->Csrf(),
            'item_active' => 'Master/Materi/index/',
            'privilege' => $this->bodo->Check_previlege('Master/Materi/index/'),
            'siteTitle' => 'Master Data Materi | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Data Materi',
            'breadcrumb' => [
                0 => [
                    'nama' => 'index',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('materi/v_index', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

    public function Save() {
        $data = [
            '`dt_materi`.`id_sesi`' => Post_input("id_sesi") + false,
            '`dt_materi`.`id_industri`' => Dekrip(Post_input("segmentxt")) + false,
            '`dt_materi`.`id_klasifikasi`' => Dekrip(Post_input("leveltxt")) + false,
            'dt_materi.narasumber' => Post_input('narsumtxt'),
            'dt_materi.title_narsum' => Post_input('narsumtitle'),
            'dt_materi.link_video' => Post_input("link_video"),
            'dt_materi.nama_materi' => Post_input("nama_materi"),
            'dt_materi.time_start' => Post_input("time_start"),
            'dt_materi.time_stop' => Post_input("time_stop"),
            'dt_materi.deskripsi' => Post_input("deskripsi"),
            '`dt_materi`.`stat`' => 0 + false,
            '`dt_materi`.`syscreateuser`' => $this->user + false,
            'dt_materi.syscreatedate' => date('Y-m-d h:i:s')
        ];
        $exec = $this->model->pro_add($data);
        if (!$exec) {
            $result = redirect(base_url('Master/Materi/index/'), $this->session->set_flashdata('err_msg', 'error while insert data'));
        } else {
            $result = redirect(base_url('Master/Materi/index/'), $this->session->set_flashdata('succ_msg', 'success, new data has been added'));
        }
        return $result;
    }

    public function Update() {
        $data = [
            'id_sesi' => Post_input('id_sesi'),
            'id_industri' => Dekrip(Post_input('segmentxt')),
            'id_klasifikasi' => Dekrip(Post_input('leveltxt')),
            'narasumber' => Post_input('narsumtxt'),
            'title_narsum' => Post_input('narsumtitle'),
            'nama_materi' => Post_input('nama_materi'),
            'deskripsi' => Post_input('deskripsi'),
            'time_start' => Post_input('time_start'),
            'time_stop' => Post_input('time_stop'),
            'link_video' => Post_input('link_video'),
            'sysupdateuser' => $this->user,
            'sysupdatedate' => date('Y-m-d H:i:s')
        ];
        $exec = $this->model->update($data, Post_input('e_id'));
        if (!$exec) {
            $result = redirect(base_url('Master/Materi/index/'), $this->session->set_flashdata('err_msg', 'error while update Master Data Materi'));
        } else {
            $result = redirect(base_url('Master/Materi/index/'), $this->session->set_flashdata('succ_msg', 'success, Master Data Materi has been updated'));
        }
        return $result;
    }

    public function Delete() {
        $id_materi = $this->bodo->Dec(Post_input('d_id'));
        $exec = $this->model->delete($id_materi);
        if (!$exec) {
            $result = redirect(base_url('Master/Materi/index/'), $this->session->set_flashdata('err_msg', 'error while disabling Master Data Materi'));
        } else {
            $result = redirect(base_url('Master/Materi/index/'), $this->session->set_flashdata('succ_msg', 'success, Master Data Materi has disabled'));
        }
        return $result;
    }

    public function Delete2() {
        $id_materi = $this->bodo->Dec(Post_input('des_id'));
        $exec = $this->model->delete2($id_materi);
        if (!$exec) {
            $result = redirect(base_url('Master/Materi/index/'), $this->session->set_flashdata('err_msg', 'error while disabling Master Data Materi'));
        } else {
            $result = redirect(base_url('Master/Materi/index/'), $this->session->set_flashdata('succ_msg', 'success, Master Data Materi has disabled'));
        }
        return $result;
    }

    public function Set_active() {
        $id_materi = $this->bodo->Dec(Post_input('act_id'));
        $exec = $this->model->active($id_materi);
        if (!$exec) {
            $result = redirect(base_url('Master/Materi/index/'), $this->session->set_flashdata('err_msg', 'error while activated Master Data Materi'));
        } else {
            $result = redirect(base_url('Master/Materi/index/'), $this->session->set_flashdata('succ_msg', 'success, Master Data Materi has been Activated'));
        }
        return $result;
    }

    public function Edit($id) {
        $id_materi = Dekrip($id);
        $data = [
            'data' => $this->model->Get_id($id_materi),
            'sesi' => $this->model->sesi(),
            'bidang_industri' => $this->model->bidang_industri(),
            'klasifikasi' => $this->model->klasifikasi(),
            'csrf' => $this->bodo->Csrf(),
            'item_active' => 'Master/Materi/index/',
            'privilege' => $this->bodo->Check_previlege('Master/Materi/index/'),
            'siteTitle' => 'Master Data Materi | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Data Materi',
            'breadcrumb' => [
                0 => [
                    'nama' => 'index',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('materi/edit', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

}
