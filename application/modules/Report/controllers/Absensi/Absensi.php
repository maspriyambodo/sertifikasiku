<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Absensi extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_absen', 'model');
        $this->user = Dekrip($this->session->userdata('id_user'));
    }

    public function index() {
        $data = [
            'csrf' => $this->bodo->Csrf(),
            'item_active' => 'Report/Absensi/index/',
            'privilege' => $this->bodo->Check_previlege('Report/Absensi/index/'),
            'siteTitle' => 'Report Absensi | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Report Absensi',
            'breadcrumb' => [
                0 => [
                    'nama' => 'Dashboard',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('absen/v_index', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

    public function lists() {
        $list = $this->model->lists();
        $data = [];
        $no = Post_input("start");
        $privilege = $this->bodo->Check_previlege('Report/Absensi/index/');
        foreach ($list as $users) {
            $no++;
            $row = [];
            $row[] = $no;
            $row[] = $users->email;
            $row[] = $users->role_name;
            $row[] = $users->fullname;
            $row[] = $users->telp;
            $row[] = $users->pekerjaan;
            $row[] = $users->time_start;
            $row[] = $users->nama_sesi;
            $row[] = $users->nama_materi;
            $row[] = $users->rating_materi;
            $row[] = $users->narasumber;
            $row[] = $users->title_narsum;
            $row[] = $users->waktu_absen;
            $data[] = $row;
        }
        return $this->_list($data, $privilege);
    }

    private function _list($data, $privilege) {
        if ($privilege['read']) {
            $output = [
                "draw" => Post_input('draw'),
                "recordsTotal" => $this->model->count_all(),
                "recordsFiltered" => $this->model->count_filtered(),
                "data" => $data
            ];
        } else {
            $output = [
                "draw" => Post_input('draw'),
                "recordsTotal" => 0,
                "recordsFiltered" => 0,
                "data" => []
            ];
        }
        ToJson($output);
    }

    public function Statistik_() {
        $exec = $this->model->_statistik();
        return ToJson($exec);
    }

}
