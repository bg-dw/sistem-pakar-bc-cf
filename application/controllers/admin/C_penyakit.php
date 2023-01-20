<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_penyakit extends CI_Controller
{
    function __construct()
    {
        //akan berjalan ketika controller Beranda di jalankan
        parent::__construct();
        $this->load->model('admin/M_penyakit');

        if ($this->session->userdata('login') == FALSE) {
            redirect(base_url('c_login/')); //mengarahkan ke halaman login
        }
    }
    public function index()
    {
        $data['content'] = 'admin/penyakit/V_penyakit';
        $data['penyakit'] = $this->M_penyakit->get('tbl_penyakit')->result();
        $this->load->view('admin/Main', $data);
    }

    public function ac_add_penyakit()
    {
        $kd = $this->input->post('kd');
        $ng = $this->input->post('nama_penyakit');

        $data = array(
            'kode_penyakit' => $kd,
            'nama_penyakit' => $ng
        );

        $query = $this->M_penyakit->input($data, 'tbl_penyakit');
        if ($query) {
            $this->session->set_flashdata('success', ' Data Berhasil Ditambahkan!');
            redirect('admin/c_penyakit/');
        } else {
            $this->session->set_flashdata('error', ' Data gagal ditambahkan!');
            redirect('admin/c_penyakit/');
        }
    }

    public function ac_update_penyakit()
    {
        $id = $this->input->post('id');
        $kd = $this->input->post('kd');
        $np = $this->input->post('nama_penyakit');

        $data = array(
            'kode_penyakit' => $kd,
            'nama_penyakit' => $np
        );
        $where = "id_penyakit='" . $id . "'";
        $query = $this->M_penyakit->update($where, $data, 'tbl_penyakit');
        if ($query) {
            $this->session->set_flashdata('success', ' Data Berhasil Diperbaharui!');
            redirect('admin/c_penyakit/');
        } else {
            $this->session->set_flashdata('error', ' Data gagal diperbaharui!');
            redirect('admin/c_penyakit/');
        }
    }

    public function ac_del_penyakit($id)
    {
        $where = "id_penyakit='" . $id . "'";
        $query = $this->M_penyakit->delete($where, 'tbl_penyakit');
        if ($query) {
            $this->session->set_flashdata('success', ' Data Berhasil Dihapus!');
            redirect('admin/c_penyakit/');
        } else {
            $this->session->set_flashdata('error', ' Data gagal dihapus!');
            redirect('admin/c_penyakit/');
        }
    }
}
