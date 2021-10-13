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
            'data' => $this->model->index()->result(),
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
        $data['content'] = $this->parser->parse('sesi/index', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }


    public function Save() {     
        $data = [
            'id' => Post_input("id"),
            'nama' => Post_input("nama"),
            'stat' => 1,
            'syscreateuser' => $this->user,
            'syscreatedate' => date('Y-m-d h:i:sa')
        ];
    $exec = $this->model->pro_add($data);

    if (!$exec) {
        $result = redirect(base_url('Master/Sesi/index/'), $this->session->set_flashdata('err_msg', 'error while insert data'));
    } else {
        $result = redirect(base_url('Master/Sesi/index/'), $this->session->set_flashdata('succ_msg', 'success, new data has been added'));
    }
    return $result;
}

public function Update() {
    $id = $this->bodo->Dec(Post_input('id'));
   
        $data = [
            'id' => $id,
            'nama' => Post_input("nama"),
            'sysupdateuser' => $this->user,
            'sysupdatedate' => date('Y-m-d h:i:sa')
        ];
        
        $exec = $this->model->update($data);
        if (!$exec) {
           $result = redirect(base_url('Master/Sesi/index/'), $this->session->set_flashdata('err_msg', 'error while update new group'));
        } else {
            $result = redirect(base_url('Master/Sesi/index/'), $this->session->set_flashdata('succ_msg', 'success, new group menu has been updated'));
        }
    return $result;
}


public function Delete() {
$id = $this->bodo->Dec(Post_input('id'));
$exec = $this->model->delete($id);

if (!$exec) {
    $result = redirect(base_url('Master/Sesi/index/'), $this->session->set_flashdata('err_msg', 'error while insert data'));
} else {
    $result = redirect(base_url('Master/Sesi/index/'), $this->session->set_flashdata('succ_msg', 'success, new data has been added'));
}
return $result;

}

public function Set_active() {
    $id = $this->bodo->Dec(Post_input('id'));
    $exec = $this->model->active($id);
    
    if (!$exec) {
        $result = redirect(base_url('Master/Sesi/index/'), $this->session->set_flashdata('err_msg', 'error while insert data'));
    } else {
        $result = redirect(base_url('Master/Sesi/index/'), $this->session->set_flashdata('succ_msg', 'success, new data has been added'));
    }
    return $result;
    
    }



public function Edit($id) {
   $id_sesi = $this->bodo->Dec($id);
        $data = [
            'data' => $this->model->Get_id($id_sesi)->result(),
            'csrf' => $this->bodo->Csrf(),
            'id' => $id,
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
        
        $data['content'] = $this->parser->parse('sesi/edit', $data, true);
        return $this->parser->parse('Template/layout', $data);
    
}

}
