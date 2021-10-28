<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Bidang extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_industri', 'model');
        $this->user = $this->bodo->Dec($this->session->userdata('id_user'));
    }

    public function index() {
        $data = [
            'data' => $this->model->index(),
            'csrf' => $this->bodo->Csrf(),
            'item_active' => 'Master/Bidang/index/',
            'privilege' => $this->bodo->Check_previlege('Master/Bidang/index/'),
            'siteTitle' => 'Master Data Bidang Industri | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Bidang Industri',
            'breadcrumb' => [
                0 => [
                    'nama' => 'index',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('bidang/v_index', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

}
