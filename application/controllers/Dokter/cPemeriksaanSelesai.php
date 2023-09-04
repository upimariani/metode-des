<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cPemeriksaanSelesai extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('mPemeriksaan');
		$this->load->model('mPenyakit');
	}
	public function index()
	{
		$data = array(
			'pemeriksaan' => $this->mPemeriksaan->select_selesai()
		);
		$this->load->view('Dokter/Layout/aside');
		$this->load->view('Dokter/Layout/header');
		$this->load->view('Dokter/Pemeriksaan/vPemeriksaanSelesai', $data);
		$this->load->view('Dokter/Layout/footer');
	}
}

/* End of file cPemeriksaanSelesai.php */
