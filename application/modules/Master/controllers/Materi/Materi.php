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

}
