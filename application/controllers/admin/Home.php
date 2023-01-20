<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	function __construct()
	{
		//akan berjalan ketika controller Beranda di jalankan
		parent::__construct();
		$this->load->model('admin/M_penyakit');
		$this->load->model('admin/M_gejala');

		if ($this->session->userdata('login') == FALSE) {
			redirect(base_url('c_login/')); //mengarahkan ke halaman login
		}
	}
	public function index()
	{
		$data['content'] = 'admin/V_home';
		$data['penyakit'] = $this->M_penyakit->get('tbl_penyakit')->result();
		$data['gejala'] = $this->M_gejala->get('tbl_gejala')->result();
		$this->load->view('admin/Main', $data);
	}
}
