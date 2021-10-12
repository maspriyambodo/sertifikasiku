<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Sesi extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_sesimateri', 'model');
        $this->user = $this->bodo->Dec($this->session->userdata('id_user'));
    }

    public function index() {
        $data = [
            'csrf' => $this->bodo->Csrf(),
            'item_active' => 'Master/Sesi/index/',
            'privilege' => $this->bodo->Check_previlege('Master/Sesi/index/'),
            'siteTitle' => 'Master Data Sesi Materi | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Data Sesi Materi',
            'breadcrumb' => [
                0 => [
                    'nama' => 'index',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('sesi/v_index', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

}
