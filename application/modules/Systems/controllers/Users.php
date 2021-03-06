<?php

defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class Users extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_users');
        $this->user = $this->bodo->Dec($this->session->userdata('id_user'));
    }

    public function index() {
        $data = [
            'csrf' => $this->bodo->Csrf(),
            'item_active' => 'Systems/Users/index/',
            'privilege' => $this->bodo->Check_previlege('Systems/Users/index/'),
            'siteTitle' => 'Users Management',
            'pagetitle' => 'User Management',
            'breadcrumb' => [
                0 => [
                    'nama' => 'User Management',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('users/index', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

    public function lists() {
        $list = $this->M_users->lists();
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
                $editbtn = '<button id="edit_user" type="button" class="btn btn-icon btn-default btn-xs" title="Edit ' . $users->uname . '" value="' . $id_user . '" onclick="Edit(this.value)"><i class="far fa-edit"></i></button>';
            } else {
                $editbtn = null;
            }
            if ($privilege['delete'] and $users->stat) {
                $activebtn = null;
                $delbtn = '<button id="del_user" type="button" class="btn btn-icon btn-danger btn-xs" title="Delete ' . $users->uname . '" value="' . $id_user . '" onclick="Delete(this.value)"><i class="far fa-trash-alt"></i></button>';
                $reset_pwd = '<button id="reset_password" type="button" class="btn btn-icon btn-default btn-xs" title="Reset Password ' . $users->uname . '" value="' . $id_user . '" onclick="Reset_pwd(this.value)"><i class="fas fa-key"></i></button>';
            } elseif ($privilege['delete'] and!$users->stat) {
                $delbtn = null;
                $reset_pwd = '<button id="reset_password" type="button" class="btn btn-icon btn-default btn-xs" title="Reset Password ' . $users->uname . '" value="' . $id_user . '" onclick="Reset_pwd(this.value)"><i class="fas fa-key"></i></button>';
                $activebtn = '<button id="act_user" type="button" class="btn btn-icon btn-success btn-xs" title="Activate ' . $users->uname . '" value="' . $id_user . '" onclick="Active(this.value)"><i class="fas fa-unlock"></i></button>';
            } else {
                $delbtn = null;
                $activebtn = null;
                $reset_pwd = null;
            }
            $no++;
            $row = [];
            $row[] = $no;
            $row[] = $users->uname;
            $row[] = $users->fullname;
            $row[] = $users->name;
            $row[] = $stat;
            $row[] = '<div class="btn-group">' . $editbtn . $reset_pwd . $delbtn . $activebtn . '</div>';
            $data[] = $row;
        }
        return $this->_list($data, $privilege);
    }

    private function _list($data, $privilege) {
        if ($privilege['read']) {
            $output = [
                "draw" => Post_input('draw'),
                "recordsTotal" => $this->M_users->count_all(),
                "recordsFiltered" => $this->M_users->count_filtered(),
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

    public function Add() {
        $data = [
            'role' => $this->M_users->Role(0),
            'csrf' => $this->bodo->Csrf(),
            'item_active' => 'Systems/Users/index/',
            'privilege' => $this->bodo->Check_previlege('Systems/Users/index/'),
            'siteTitle' => 'Add new User',
            'pagetitle' => 'Add user',
            'breadcrumb' => [
                0 => [
                    'nama' => 'User Management',
                    'link' => base_url('Systems/Users/index/'),
                    'status' => false
                ],
                1 => [
                    'nama' => 'Add',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('users/add', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

    public function Save() {
        $param = [
            'upload_path' => 'assets/images/users/',
            'file_name' => 'users' . date('d_His'),
            'input_name' => "profile_avatar",
            'allowed_types' => 'gif|jpg|png|gif|ico'
        ];
        $pict = _Upload($param);
        $role_user = $this->bodo->Dec(Post_input('role_user'));
        if (!$pict['status']) {
            $file_name = 'blank.png';
        } else {
            $file_name = $pict['file_name'];
        }
        $data = [
            'uname' => Post_input('uname'),
            'pwd' => password_hash("a", PASSWORD_DEFAULT),
            'role_id' => $role_user,
            'pict' => $file_name,
            'stat' => 1,
            'user_login' => $this->user,
            'fullname' => Post_input('fullnametxt'),
            'telp' => Post_input('tlptxt')
        ];
        return $this->_Save($data);
    }

    private function _Save($data) {
        if ($data['role_id'] == 1 and $this->bodo->Dec($this->session->userdata('role_id')) != 1) {
            redirect(base_url('Systems/Users/Add/'), $this->session->set_flashdata('err_msg', 'failed, error while processing user data!'));
        } else {
            $this->M_users->Save($data);
        }
    }

    public function Check_uname() {
        $uname = Post_get('nama');
        $check = $this->M_users->Check($uname);
        if ($check) {
            $response = [
                'status' => true,
                'msg' => 'username already exist'
            ];
        } else {
            $response = [
                'status' => false,
                'msg' => 'username available to use'
            ];
        }
        return ToJson($response);
    }

    public function Delete() {
        $id_user = $this->bodo->Dec(Post_input("e_id"));
        $data = [
            'id_user' => $id_user,
            'stat_active' => 0,
            'user_login' => $this->user
        ];
        if ($id_user == 1) {
            $result = redirect(base_url('Systems/Users/index/'), $this->session->set_flashdata('err_msg', 'error, users cannot be deleted!!!'));
        } else {
            $exec = $this->M_users->Stat($data);
            if (empty($exec->conn_id->affected_rows) or $exec->conn_id->affected_rows == 0) {
                $result = redirect(base_url('Systems/Users/index/'), $this->session->set_flashdata('err_msg', 'error, failed to deleted users!'));
            } else {
                $result = redirect(base_url('Systems/Users/index/'), $this->session->set_flashdata('succ_msg', 'success, users has been deleted!'));
            }
        }
        return $result;
    }

    public function Active() {
        $id_user = $this->bodo->Dec(Post_input("act_id"));
        $data = [
            'id_user' => $id_user,
            'stat_active' => 1,
            'user_login' => $this->user
        ];
        $exec = $this->M_users->Stat($data);
        if (empty($exec->conn_id->affected_rows) or $exec->conn_id->affected_rows == 0) {
            $result = redirect(base_url('Systems/Users/index/'), $this->session->set_flashdata('err_msg', 'error, failed to activating user!'));
        } else {
            $result = redirect(base_url('Systems/Users/index/'), $this->session->set_flashdata('succ_msg', 'success, user has been activated!'));
        }
    }

    public function Edit() {
        $id_user = $this->bodo->Dec(Post_get('id'));
        $data = [
            'data' => $this->M_users->index(['param' => 'get_detail', 'id_user' => $id_user, 'panjang' => 0, 'mulai' => 0]),
            'role' => $this->M_users->Role(0),
            'csrf' => $this->bodo->Csrf(),
            'item_active' => 'Systems/Users/index/',
            'privilege' => $this->bodo->Check_previlege('Systems/Users/index/'),
            'siteTitle' => 'Edit User',
            'pagetitle' => 'Edit user',
            'breadcrumb' => [
                0 => [
                    'nama' => 'User Management',
                    'link' => base_url('Systems/Users/index/'),
                    'status' => false
                ],
                1 => [
                    'nama' => 'Edit',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('users/edit', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

    public function Update() {
        $param = [
            'upload_path' => 'assets/images/users/',
            'file_name' => 'users' . date('d_His'),
            'input_name' => "profile_avatar",
            'allowed_types' => 'gif|jpg|png|gif|ico'
        ];
        $pict = _Upload($param);
        $role_user = $this->bodo->Dec(Post_input('role_user'));
        $old_ava = Post_input("old_ava");
        $id_user = $this->bodo->Dec(Post_input("id_user"));
        if (!$pict['status'] or empty($pict['status'])) {
            $pict['file_name'] = $old_ava;
        } else {
            unlink('assets/images/users/' . $old_ava);
        }
        $data = [
            'uname' => Post_input('uname'),
            'pwd' => 'update',
            'role_id' => $role_user,
            'pict' => $pict['file_name'],
            'stat' => $id_user, //jika fungsi update maka berubah jadi id user
            'user_login' => $this->user,
            'fullname' => Post_input('fullnametxt'),
            'telp' => Post_input('tlptxt')
        ];
        return $this->_Save($data);
    }

    public function Reset() {
        $id = $this->bodo->Dec(Post_input('reset_id'));
        if ($id == 1) {
            $result = redirect(base_url('Systems/Users/index/'), $this->session->set_flashdata('err_msg', 'failed, error while processing user data'));
        } elseif (empty($id) or!$id) {
            $result = redirect(base_url('Systems/Users/index/'), $this->session->set_flashdata('err_msg', 'failed, error while processing user data'));
        } else {
            $data = [
                'pwd' => password_hash("a", PASSWORD_DEFAULT),
                '`sys_users`.`login_attempt`' => 0 + false,
                '`sys_users`.`sysupdateuser`' => $this->user + false,
                'sysupdatedate' => date('Y-m-d H:i:s')
            ];
            $result = $this->M_users->Reset($data, $id);
        }
        return $result;
    }

    /* public function Import() 
     * $file = Array
      (
      [name] => Daftar Aplikasi Bimas Islam.xlsx
      [type] => application/vnd.openxmlformats-officedocument.spreadsheetml.sheet
      [tmp_name] => /tmp/phpbcxiR5
      [error] => 0
      [size] => 11013
      )
     */

    public function Import() {
        $file = $_FILES['importxt'];
        $reader = new Xlsx();
        $reader->setReadDataOnly(true);
        $spreadsheet = $reader->load($file['tmp_name']);
        $sheetData = $spreadsheet->getActiveSheet()->toArray();
        if (!empty($sheetData)) {
            for ($i = 1; $i < count($sheetData); $i++) {
                $field = strtolower($sheetData[$i]['0']); // uname
                $field1 = strtolower($sheetData[$i]['1']); //role_name
                $field2 = $sheetData[$i]['2']; //fullname
                $field3 = $sheetData[$i]['3']; //telepon
                $field4 = $sheetData[$i]['4']; //pekerjaan
                if (!empty($field1)) {
                    $role_name = $this->M_users->_roleUser($field1);
                } else {
                    $role_name = $this->M_users->_roleUser('unknown');
                }
                $data[] = (object) [
                            'uname' => $field,
                            'role_id' => $role_name + false,
                            'stat' => 1 + false,
                            'pict' => 'blank.png',
                            'syscreateuser' => $this->user + false,
                            'syscreatedate' => date('Y-m-d H:i:s')
                ];
                $dt_user[] = (object) [
                            'nama' => $field2,
                            'mail' => $field,
                            'sys_user_id' => null,
                            'telp' => $field3,
                            'pekerjaan' => $field4,
                            'syscreateuser' => $this->user + false,
                            'syscreatedate' => date('Y-m-d H:i:s')
                ];
            }
            $result = $this->Check_duplikat($data, $dt_user);
        } else {
            $result = redirect(base_url('Systems/Users/index/'), $this->session->set_flashdata('err_msg', 'failed, file not supported!'));
        }
        return $result;
    }

    private function Check_duplikat($data, $dt_user) {
        for ($index = 0; $index < count($data); $index++) {
            $cek = $this->M_users->Cek_dulikat($data[$index]->uname);
            if ($cek > 0 and!empty($cek)) {
                unset($data[$index]);
                unset($dt_user[$index]);
            } elseif (empty($data[$index]->uname)) {
                unset($data[$index]);
                unset($dt_user[$index]);
            }
        }
        print_array($data);
        die;
//            =====
        if (!empty($data)) {
            $this->M_users->Import_m($data);
            $result = $this->_dtuser($dt_user);
        } else {
            $result = redirect(base_url('Systems/Users/index/'), $this->session->set_flashdata('err_msg', 'error, data user not found!'));
        }
        return $result;
    }

    private function _dtuser($dt_user) {
        foreach ($dt_user as $key2 => $value2) {
            $sys_user_id = $this->M_users->Get_userid($value2->mail);
            if (!empty($sys_user_id)) {
                $dt_user[$key2]->sys_user_id = $sys_user_id->sys_user_id;
            } elseif (empty($dt_user[$key2]->nama)) {
                unset($dt_user[$key2]);
            } else {
                unset($dt_user[$key2]);
            }
        }
        $this->M_users->insert_dtuser($dt_user);
        return redirect(base_url('Systems/Users/index/'), $this->session->set_flashdata('succ_msg', 'success, ' . count($dt_user) . ' users has been added!'));
    }

    public function Download() {
        $token = Dekrip(Post_get('token'));
        if ($token == 'benar') {
            header('Content-Disposition: attachment; filename=' . md5(date('Y-m-d H:i:s')) . '.xlsx');
            readfile(FCPATH . 'assets/media/sertif.xlsx');
        } else {
            echo "your token not match!";
        }
    }

}
