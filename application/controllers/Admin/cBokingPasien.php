<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cBokingPasien extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mBoking');
		$this->load->model('mDokter');
	}

	public function index()
	{
		$data = array(
			'boking' => $this->mBoking->select(),
			'dokter' => $this->mDokter->select()
		);
		$this->load->view('Admin/Layout/aside');
		$this->load->view('Admin/Layout/header');
		$this->load->view('Admin/BokingPasien/vBokingPasien', $data);
		$this->load->view('Admin/Layout/footer');
	}
	public function pemeriksaan_dokter($id)
	{
		$data = array(
			'stat_boking' => '1'
		);
		$this->mBoking->update_status($id, $data);
		$this->session->set_flashdata('success', 'Pasien Silahkan menunggu pemeriksaan dokter!');
		redirect('Admin/cBokingPasien');
	}
}

/* End of file cBokingPasien.php */
