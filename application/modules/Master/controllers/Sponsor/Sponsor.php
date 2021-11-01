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
        $kategori = Dekrip(Post_input('kategori'));
        if ($kategori == 1) {
            $upload_path = 'assets/images/sponsor/';
        } else {
            $upload_path = 'assets/images/media_partner/';
        }
        $param = [
            'upload_path' => $upload_path,
            'file_name' => md5(date('Y-m-d H:i:s')),
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
            'kategori' => $kategori,
            'nama' => Post_input("nama"),
            'url_website' => Post_input("url_website"),
            'path' => $file_name,
            'stat' => 1,
            'syscreateuser' => $this->user,
            'syscreatedate' => date('Y-m-d h:i:s')
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
        $id = Dekrip(Post_input('id'));
        $old_id = Dekrip(Post_input('old_id'));
        if ($id == $old_id) {
            $kategori = Dekrip(Post_input("kategori"));
            $data = [
                'id' => $id,
                'nama' => Post_input("nama"),
                'kategori' => $kategori,
                'url_website' => Post_input("url_website"),
                'sysupdateuser' => $this->user,
                'sysupdatedate' => date('Y-m-d h:i:s')
            ];
            $exec = $this->model->update($data);
            if (!$exec) {
                $result = redirect(base_url('Master/Sponsor/index/'), $this->session->set_flashdata('err_msg', 'error while update data'));
            } else {
                $result = redirect(base_url('Master/Sponsor/index/'), $this->session->set_flashdata('succ_msg', 'success, data has been updated'));
            }
        } else {
            $result = redirect(base_url('Master/Sponsor/index/'), $this->session->set_flashdata('err_msg', 'your token was invalid'));
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
        $sponsor = $this->model->Get_id($id_sponsor);
        $data = [
            'csrf' => $this->bodo->Csrf(),
            'item_active' => 'Master/Sponsor/index/',
            'privilege' => $this->bodo->Check_previlege('Master/Sponsor/index/'),
            'siteTitle' => 'Data Sponsor | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Edit data ' . $sponsor[0]->nama,
            'breadcrumb' => [
                0 => [
                    'nama' => 'index',
                    'link' => base_url('Master/Sponsor/index/'),
                    'status' => false
                ],
                1 => [
                    'nama' => 'edit',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['sponsor'] = $sponsor;
        $data['content'] = $this->parser->parse('sponsor/edit', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

    public function update_logo() {
        $kategori = Dekrip(Post_input('kategori'));
        $id_ = Dekrip(Post_input('old_id'));
        if ($kategori == 1) {//sponsor
            $upload_path = 'assets/images/sponsor/';
        } else {//media partner
            $upload_path = 'assets/images/media_partner/';
        }
        $param = [
            'upload_path' => $upload_path,
            'file_name' => md5(date('Y-m-d H:i:s')),
            'input_name' => "favico",
            'allowed_types' => 'gif|jpg|png|gif|ico'
        ];
        $fav = _Upload($param);
        if (!$fav) {
            $result = [
                'status' => false,
                'msg' => 'error while upload logo',
                'csrf' => $this->bodo->Csrf()['hash']
            ];
        } else {
            $exec = $this->model->update_logo($id_, $fav['file_name']);
            if ($exec) {
                $result = [
                    'status' => true,
                    'msg' => 'logo has been changed',
                    'csrf' => $this->bodo->Csrf()['hash'],
                    'new_img' => base_url($upload_path . $fav['file_name'])
                ];
            } else {
                $result = [
                    'status' => false,
                    'msg' => 'error while change logo',
                    'csrf' => $this->bodo->Csrf()['hash']
                ];
            }
        }
        ToJson($result);
    }

}
