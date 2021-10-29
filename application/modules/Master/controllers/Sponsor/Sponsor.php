<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Sponsor extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_sponsor', 'model');
        $this->user = $this->bodo->Dec($this->session->userdata('id_user'));
    }

    public function index() {
        $data = [
            'data' => $this->model->index()->result(),
            'csrf' => $this->bodo->Csrf(),
            'item_active' => 'Master/Sponsor/index/',
            'privilege' => $this->bodo->Check_previlege('Master/Sponsor/index/'),
            'siteTitle' => 'Master Sponsor | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Sponsor',
            'breadcrumb' => [
                0 => [
                    'nama' => 'index',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('sponsor/index', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }


    public function Save() {
        $param = [
            'upload_path' => 'assets/images/sponsor/',
            'file_name' => 'sponsor' . date('d_His'),
            'input_name' => "path",
            'allowed_types' => 'gif|jpg|png|gif|ico'
        ];
        $pict = _Upload($param);
        if (!$pict['status']) {
            $file_name = 'blank.png';
        } else {
            $file_name = $pict['file_name'];
        }
        $data = [
            'id' => Post_input("id"),
            'kategori' => Post_input("kategori"),
            'nama' => Post_input("nama"),
            'url_website' => Post_input("url_website"),
            'path' => $file_name,
            'stat' => 1,
            'syscreateuser' => $this->user,
            'syscreatedate' => date('Y-m-d h:i:sa')
        ];
        $exec = $this->model->pro_add($data);

        if (!$exec) {
            $result = redirect(base_url('Master/Sponsor/index/'), $this->session->set_flashdata('err_msg', 'error while insert data'));
        } else {
            $result = redirect(base_url('Master/Sponsor/index/'), $this->session->set_flashdata('succ_msg', 'success, new data has been added'));
        }
        return $result;
    }

    public function Update() {
        $id = $this->bodo->Dec(Post_input('id'));

        $param = [
            'upload_path' => 'assets/images/sponsor/',
            'file_name' => 'sponsor' . date('d_His'),
            'input_name' => "path",
            'allowed_types' => 'gif|jpg|png|gif|ico'
        ];
        $pict = _Upload($param);
        $old_ava = Post_input("old_ava");
        if (!$pict['status'] or empty($pict['status'])) {
            $pict['file_name'] = $old_ava;
        } else {
            unlink('assets/images/sponsor/' . $old_ava);
        }

        $data = [
            'id' => $id,
            'nama' => Post_input("nama"),
            'path' => $pict['file_name'],
            'kategori' => Post_input("kategori"),
            'url_website' => Post_input("url_website"),
            'sysupdateuser' => $this->user,
            'sysupdatedate' => date('Y-m-d h:i:sa')
        ];

        $exec = $this->model->update($data);
        if (!$exec) {
           $result = redirect(base_url('Master/Sponsor/index/'), $this->session->set_flashdata('err_msg', 'error while update data'));
        } else {
            $result = redirect(base_url('Master/Sponsor/index/'), $this->session->set_flashdata('succ_msg', 'success, data has been updated'));
        }
        return $result;
    }


    public function Delete() {
        $id = $this->bodo->Dec(Post_input('id'));
        $exec = $this->model->delete($id);

        if (!$exec) {
            $result = redirect(base_url('Master/Sponsor/index/'), $this->session->set_flashdata('err_msg', 'error while delete data'));
        } else {
            $result = redirect(base_url('Master/Sponsor/index/'), $this->session->set_flashdata('succ_msg', 'success, data has been deleted'));
        }
        return $result;
    }

    public function Set_active() {
        $id = $this->bodo->Dec(Post_input('id'));
        $exec = $this->model->active($id);

        if (!$exec) {
            $result = redirect(base_url('Master/Sponsor/index/'), $this->session->set_flashdata('err_msg', 'error while enable data'));
        } else {
            $result = redirect(base_url('Master/Sponsor/index/'), $this->session->set_flashdata('succ_msg', 'success, data has been enabled'));
        }
        return $result;
    }



    public function Edit($id) {
        $id_sponsor = $this->bodo->Dec($id);
        $data = [
            'data' => $this->model->Get_id($id_sponsor)->result(),
            'csrf' => $this->bodo->Csrf(),
            'id' => $id,
            'item_active' => 'Master/Sponsor/index/',
            'privilege' => $this->bodo->Check_previlege('Master/Sponsor/index/'),
            'siteTitle' => 'Master Sponsor | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Sponsor',
            'breadcrumb' => [
                0 => [
                    'nama' => 'index',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];

        $data['content'] = $this->parser->parse('sponsor/edit', $data, true);
        return $this->parser->parse('Template/layout', $data);

    }

}
