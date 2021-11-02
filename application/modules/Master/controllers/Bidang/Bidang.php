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

    public function lists() {
        $list = $this->model->lists();
        $data = [];
        $no = Post_input("start");
        $privilege = $this->bodo->Check_previlege('Systems/Users/index/');
        foreach ($list as $users) {
            $id_user = Enkrip($users->id);
            if ($users->stat) {
                $stat = '<span class="label label-success label-inline font-weight-lighter mr-2">active</span>';
            } else {
                $stat = '<span class="label label-danger label-inline font-weight-lighter mr-2">nonactive</span>';
            }
            if ($privilege['update']) {
                $editbtn = '<button id="edit_user" type="button" class="btn btn-icon btn-default btn-xs" title="Edit ' . $users->nama . '" value="' . $id_user . '" onclick="Edit(this.value)"><i class="far fa-edit text-warning"></i></button>';
            } else {
                $editbtn = null;
            }
            if ($privilege['delete'] and $users->stat) {
                $activebtn = null;
                $delbtn = '<button id="disable_user" type="button" class="btn btn-icon btn-default btn-xs" title="Disable ' . $users->nama . '" value="' . $id_user . '" onclick="Disablebtn(this.value)"><i class="fas fa-power-off text-danger"></i></button>';
                $removebtn = '<button id="remove_user" type="button" class="btn btn-icon btn-default btn-xs" title="Delete ' . $users->nama . '" value="' . $id_user . '" onclick="Removebtn(this.value)"><i class="fas fa-trash-alt text-danger"></i></button>';
            } elseif ($privilege['delete'] and!$users->stat) {
                $delbtn = null;
                $activebtn = '<button id="act_user" type="button" class="btn btn-icon btn-default btn-xs" title="Enable ' . $users->nama . '" value="' . $id_user . '" onclick="Activebtn(this.value)"><i class="fas fa-power-off text-success"></i></button>';
                $removebtn = '<button id="remove_user" type="button" class="btn btn-icon btn-default btn-xs" title="Delete ' . $users->nama . '" value="' . $id_user . '" onclick="Removebtn(this.value)"><i class="fas fa-trash-alt text-danger"></i></button>';
            } else {
                $removebtn = null;
                $delbtn = null;
                $activebtn = null;
            }
            $no++;
            $row = [];
            $row[] = $no;
            $row[] = $users->nama;
            $row[] = substr($users->deskripsi, 0, 50) . '...';
            $row[] = $stat;
            $row[] = '<div class="btn-group">' . $editbtn . $delbtn . $activebtn . $removebtn . '</div>';
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

    public function save() {
        $data = [
            'mt_industri.nama' => Post_input('namatxt'),
            'mt_industri.deskripsi' => Post_input('desctxt'),
            '`mt_industri`.`stat`' => 1 + false,
            '`mt_industri`.`syscreateuser`' => $this->user + false,
            'mt_industri.syscreatedate' => date('Y-m-d H:i:s')
        ];
        $exec = $this->model->_save($data);
        if ($exec == true) {
            $result = redirect(base_url('Master/Bidang/index/'), $this->session->set_flashdata('succ_msg', 'success, ' . Post_input('namatxt') . ' has been added'));
        } else {
            $result = redirect(base_url('Master/Bidang/index/'), $this->session->set_flashdata('err_msg', 'error while insert data'));
        }
        return $result;
    }

    public function get_detail() {
        $id = Dekrip(Post_get('token'));
        if (!empty($id)) {
            $exec = $this->model->_detail($id);
            $data = [
                'stat' => true,
                'id' => Enkrip($exec->id),
                'namatxt' => $exec->nama,
                'desctxt' => $exec->deskripsi
            ];
        } else {
            $data = [
                'stat' => false
            ];
        }
        return ToJson($data);
    }

    public function update() {
        $token = Dekrip(Post_get('token'));
        $id = Dekrip(Post_input('e_id'));
        if ($token == $id) {
            $data = [
                'id' => $id,
                'e_namatxt' => Post_input('e_namatxt'),
                'e_desctxt' => Post_input('e_desctxt'),
                'sysupdateuser' => $this->user,
                'sysupdatedate' => date('Y-m-d H:i:s')
            ];
            $exec = $this->model->_update($data);
            if ($exec) {
                $result = redirect(base_url('Master/Bidang/index/'), $this->session->set_flashdata('succ_msg', 'success, <b>' . Post_input('e_namatxt') . '</b> has been updated'));
            } else {
                $result = redirect(base_url('Master/Bidang/index/'), $this->session->set_flashdata('err_msg', 'error while update data ' . Post_input('e_namatxt')));
            }
        } else {
            $result = redirect(base_url('Master/Bidang/index/'), $this->session->set_flashdata('err_msg', 'your token was invalid!'));
        }
    }

    public function disable() {
        $token = Dekrip(Post_get('token'));
        $id = Dekrip(Post_input('dis_id'));
        if ($token == $id) {
            $exec = $this->model->_disable($id);
            if ($exec) {
                $result = redirect(base_url('Master/Bidang/index/'), $this->session->set_flashdata('succ_msg', 'success, <b>' . Post_input('dis_nama') . '</b> has been disabled'));
            } else {
                $result = redirect(base_url('Master/Bidang/index/'), $this->session->set_flashdata('err_msg', 'error while disabling data ' . Post_input('dis_nama')));
            }
        } else {
            $result = redirect(base_url('Master/Bidang/index/'), $this->session->set_flashdata('err_msg', 'your token was invalid!'));
        }
    }

    public function activate() {
        $token = Dekrip(Post_get('token'));
        $id = Dekrip(Post_input('act_id'));
        if ($token == $id) {
            $exec = $this->model->_activate($id);
            if ($exec) {
                $result = redirect(base_url('Master/Bidang/index/'), $this->session->set_flashdata('succ_msg', 'success, <b>' . Post_input('act_name') . '</b> has been enabled'));
            } else {
                $result = redirect(base_url('Master/Bidang/index/'), $this->session->set_flashdata('err_msg', 'error while enabling data ' . Post_input('act_name')));
            }
        } else {
            $result = redirect(base_url('Master/Bidang/index/'), $this->session->set_flashdata('err_msg', 'your token was invalid!'));
        }
    }

    public function delete() {
        $token = Dekrip(Post_get('token'));
        $id = Dekrip(Post_input('del_id'));
        if ($token == $id) {
            $data = [
                'id' => $id,
                'id_user' => $this->user,
                'tanggal' => date('Y-m-d H:i:s')
            ];
            $exec = $this->model->_delete($data);
            if ($exec) {
                $result = redirect(base_url('Master/Bidang/index/'), $this->session->set_flashdata('succ_msg', 'success, <b>' . Post_input('del_nama') . '</b> has been deleted'));
            } else {
                $result = redirect(base_url('Master/Bidang/index/'), $this->session->set_flashdata('err_msg', 'error while deleting data ' . Post_input('del_nama')));
            }
        } else {
            $result = redirect(base_url('Master/Bidang/index/'), $this->session->set_flashdata('err_msg', 'your token was invalid!'));
        }
    }

}
