<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_gejala extends CI_Controller
{
    function __construct()
    {
        //akan berjalan ketika controller Beranda di jalankan
        parent::__construct();
        $this->load->model('admin/M_gejala');

        if ($this->session->userdata('login') == FALSE) {
            redirect(base_url('c_login/')); //mengarahkan ke halaman login
        }
    }
    public function index()
    {
        $data['content'] = 'admin/gejala/V_gejala';
        $data['gejala'] = $this->M_gejala->get('tbl_gejala')->result();
        $this->load->view('admin/Main', $data);
    }

    public function ac_add_gejala()
    {
        $kd = $this->input->post('kd');
        $ng = $this->input->post('nama_gejala');

        $data = array(
            'kode_gejala' => $kd,
            'nama_gejala' => $ng
        );

        $query = $this->M_gejala->input($data, 'tbl_gejala');
        if ($query) {
            $this->session->set_flashdata('success', ' Data Berhasil Ditambahkan!');
            redirect('admin/c_gejala/');
        } else {
            $this->session->set_flashdata('error', ' Data gagal ditambahkan!');
            redirect('admin/c_gejala/');
        }
    }

    public function ac_update_gejala()
    {
        $id = $this->input->post('id');
        $kd = $this->input->post('kd');
        $ng = $this->input->post('nama_gejala');

        $data = array(
            'kode_gejala' => $kd,
            'nama_gejala' => $ng
        );
        $where = "id_gejala='" . $id . "'";
        $query = $this->M_gejala->update($where, $data, 'tbl_gejala');
        if ($query) {
            $this->session->set_flashdata('success', ' Data Berhasil Diperbaharui!');
            redirect('admin/c_gejala/');
        } else {
            $this->session->set_flashdata('error', ' Data gagal diperbaharui!');
            redirect('admin/c_gejala/');
        }
    }

    public function ac_del_gejala($id)
    {
        $where = "id_gejala='" . $id . "'";
        $query = $this->M_gejala->delete($where, 'tbl_gejala');
        if ($query) {
            $this->session->set_flashdata('success', ' Data Berhasil Dihapus!');
            redirect('admin/c_gejala/');
        } else {
            $this->session->set_flashdata('error', ' Data gagal dihapus!');
            redirect('admin/c_gejala/');
        }
    }
}
