<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cPemeriksaan extends CI_Controller
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
			'pemeriksaan' => $this->mPemeriksaan->select(),
			'penyakit' => $this->mPenyakit->select()
		);
		$this->load->view('Dokter/Layout/aside');
		$this->load->view('Dokter/Layout/header');
		$this->load->view('Dokter/Pemeriksaan/vPemeriksaan', $data);
		$this->load->view('Dokter/Layout/footer');
	}
	public function diagnosa($id)
	{
		$data = array(
			'id_penyakit' => $this->input->post('penyakit'),
			'id_boking' => $id,
			'detail_penyakit' => $this->input->post('detail_penyakit'),
			'saran' => $this->input->post('saran'),
			'resep_dokter' => $this->input->post('resep')
		);
		$this->mPemeriksaan->insert_diagnosa($data);

		$status = array(
			'stat_boking' => '2'
		);
		$this->mPemeriksaan->update_status($id, $status);
		$this->session->set_flashdata('success', 'Data Diagnosa Berhasil Disimpan!');
		redirect('Dokter/cPemeriksaan');
	}
}

/* End of file cPemeriksaan.php */
