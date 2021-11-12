<?php

use chriskacerguis\RestServer\RestController;

defined('BASEPATH') OR exit('No direct script access allowed');

class Absensi extends RestController {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_absensi', 'model');
        $this->load->model('Auth/M_auth', 'model2');
    }

    public function index_get() {
        $limit_start = Post_get('start');
        $limit_length = Post_get('length');
        $list = $this->model->index($limit_start, $limit_length);
        $data = [];
        static $no = 0;
        foreach ($list as $users) {
            $id_user = Enkrip($users->id_absensi);
            $no++;
            $row = [];
            $row['start'] = $limit_start;
            $row['length'] = $limit_length;
            $row['no'] = $no;
            $row['id_absensi'] = $id_user;
            $row['email'] = $users->email;
            $row['role_name'] = $users->role_name;
            $row['fullname'] = $users->fullname;
            $row['telp'] = $users->telp;
            $row['pekerjaan'] = $users->pekerjaan;
            $row['time_start'] = $users->time_start;
            $row['nama_sesi'] = $users->nama_sesi;
            $row['nama_materi'] = $users->nama_materi;
            $row['narasumber'] = $users->narasumber;
            $row['title_narsum'] = $users->title_narsum;
            $row['rating_materi'] = $users->rating_materi;
            $row['waktu_absen'] = $users->waktu_absen;
            $data[] = $row;
        }
        return $this->response($data, RestController::HTTP_OK);
    }

}
