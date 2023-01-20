<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_profile extends CI_Controller
{
    function __construct()
    {
        //akan berjalan ketika controller Beranda di jalankan
        parent::__construct();
        $this->load->model('admin/M_profile');

        if ($this->session->userdata('login') == FALSE) {
            redirect(base_url('c_login/')); //mengarahkan ke halaman login
        }
    }
    public function my_profile($id)
    {
        $data['content'] = 'admin/profile/V_profile';
        $data['profile'] = $this->M_profile->get_user($id)->row();
        $this->load->view('admin/Main', $data);
    }

    public function ac_update_uname($id) //update nama dan username
    {
        $nama = $this->input->post('nama');
        $uname = $this->input->post('uname');

        $where = "id_user='" . $id . "'";
        $data = array(
            'nama_user' => $nama,
            'username' => $uname
        );

        $query = $this->M_profile->update($where, $data, 'tbl_user');
        if ($query) {
            $this->session->set_flashdata('success', ' Data Berhasil Diperbaharui!');
            redirect('c_login/logout/');
        } else {
            $this->session->set_flashdata('error', ' Data gagal diperbaharui!');
            redirect('admin/c_profile/my_profile/' . $id);
        }
    }

    public function ac_update_pwd($id) //upodate password
    {
        $pwd = $this->input->post('pwd');

        $where = "id_user='" . $id . "'";
        $data = array(
            'password' => $pwd
        );

        $query = $this->M_profile->update($where, $data, 'tbl_user');
        if ($query) {
            $this->session->set_flashdata('success', ' Data Berhasil Diperbaharui!');
            redirect('c_login/logout/');
        } else {
            $this->session->set_flashdata('error', ' Data gagal diperbaharui!');
            redirect('admin/c_profile/my_profile/' . $id);
        }
    }
}
