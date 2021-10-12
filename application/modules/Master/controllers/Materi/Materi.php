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
            'data' => $this->model->index()->result(),
            'sesi' => $this->model->sesi()->result(),
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
                'id_sesi' => Post_input("id_sesi"),
                'link_video' => Post_input("link_video"),
                'nama_materi' => Post_input("nama_materi"),
                'time_start' => Post_input("time_start"),
                'time_stop' => Post_input("time_stop"),
                'deskripsi' => Post_input("deskripsi"),
                'stat' => 1,
                'syscreateuser' => $this->user,
                'syscreatedate' => date('Y-m-d h:i:sa')
            ];
        $exec = $this->model->pro_add($data);

        if ($exec['status'] == false) {
            $result = redirect(base_url('Master/Materi/index/'), $this->session->set_flashdata('err_msg', 'error while insert data'));
        } else {
            $result = redirect(base_url('Master/Materi/index/'), $this->session->set_flashdata('succ_msg', 'success, new data has been added'));
        }
        return $result;
    }

    public function Update() {
        $id = $this->bodo->Dec(Post_input('id'));
       
            $data = [
                'id' => $id,
                'id_sesi' => Post_input("id_sesi"),
                'link_video' => Post_input("link_video"),
                'nama_materi' => Post_input("nama_materi"),
                'time_start' => Post_input("time_start"),
                'time_stop' => Post_input("time_stop"),
                'deskripsi' => Post_input("deskripsi"),
                'sysupdateuser' => $this->user,
                'sysupdatedate' => date('Y-m-d h:i:sa')
            ];
            $exec = $this->model->update($data);
            if ($exec['status'] == false) {
               $result = redirect(base_url('Master/Materi/index/'), $this->session->set_flashdata('err_msg', 'error while update new group'));
            } else {
                $result = redirect(base_url('Master/Materi/index/'), $this->session->set_flashdata('succ_msg', 'success, new group menu has been updated'));
            }
        return $result;
    }

   
    public function Delete() {
    $id_materi = $this->bodo->Dec(Post_input('id'));
    $exec = $this->model->delete($id_materi);

    if ($exec['status'] == false) {
        $result = redirect(base_url('Master/Materi/index/'), $this->session->set_flashdata('err_msg', 'error while insert data'));
    } else {
        $result = redirect(base_url('Master/Materi/index/'), $this->session->set_flashdata('succ_msg', 'success, new data has been added'));
    }
    return $result;

    }


    public function Edit($id) {
       $id_materi = $this->bodo->Dec($id);
            $data = [
                'data' => $this->model->Get_id($id_materi)->result(),
                'sesi' => $this->model->sesi()->result(),
                'csrf' => $this->bodo->Csrf(),
                'id' => $id,
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
