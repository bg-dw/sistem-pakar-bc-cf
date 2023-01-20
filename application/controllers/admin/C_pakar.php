<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_pakar extends CI_Controller
{
    function __construct()
    {
        //akan berjalan ketika controller Beranda di jalankan
        parent::__construct();

        $this->load->model('admin/M_pakar');
        $this->load->model('admin/M_gejala');
        $this->load->model('admin/M_penyakit');

        if ($this->session->userdata('login') == FALSE) {
            redirect(base_url('c_login/')); //mengarahkan ke halaman login
        }
    }
    public function index()
    {
        $data['content'] = 'admin/pakar/V_pakar';
        $data['gejala'] = $this->M_gejala->get('tbl_gejala')->result();
        $data['penyakit'] = $this->M_penyakit->get('tbl_penyakit')->result();
        $data['nilai'] = $this->M_pakar->get_detail_penyakit()->result();
        $this->load->view('admin/Main', $data);
    }

    //tambah data nilai
    public function ac_add_nilai()
    {
        $id_p = $this->input->post('penyakit');
        $id_g = $this->input->post('gejala');
        $nilai = $this->input->post('nilai');

        $data = array(
            'id_penyakit' => $id_p,
            'id_gejala' => $id_g,
            'nilai' => $nilai
        );

        $query = $this->M_pakar->input($data, 'tbl_detail_penyakit');
        if ($query) {
            $this->session->set_flashdata('success', ' Data Berhasil Ditambahkan!');
            redirect('admin/c_pakar/');
        } else {
            $this->session->set_flashdata('error', ' Data gagal ditambahkan!');
            redirect('admin/c_pakar/');
        }
    }

    //update data nilai
    public function ac_update_nilai()
    {
        $id = $this->input->post('id');
        $id_p = $this->input->post('penyakit');
        $id_g = $this->input->post('gejala');
        $nilai = $this->input->post('nilai');

        $where = array(
            'id_detail' => $id
        );
        $data = array(
            'id_penyakit' => $id_p,
            'id_gejala' => $id_g,
            'nilai' => $nilai
        );

        $query = $this->M_pakar->update($where, $data, 'tbl_detail_penyakit');
        if ($query) {
            $this->session->set_flashdata('success', ' Data Berhasil Diperbaharui!');
            redirect('admin/c_pakar/');
        } else {
            $this->session->set_flashdata('error', ' Data gagal Diperbaharui!');
            redirect('admin/c_pakar/');
        }
    }

    //hapus data nilai
    public function ac_del_nilai($id)
    {
        $where = "id_detail='" . $id . "'";
        $query = $this->M_pakar->delete($where, 'tbl_detail_penyakit');
        if ($query) {
            $this->session->set_flashdata('success', ' Data Berhasil Dihapus!');
            redirect('admin/c_pakar/');
        } else {
            $this->session->set_flashdata('error', ' Data gagal dihapus!');
            redirect('admin/c_pakar/');
        }
    }
}
