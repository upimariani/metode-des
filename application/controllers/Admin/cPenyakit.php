<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cPenyakit extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('mPenyakit');
	}
	public function index()
	{
		$data = array(
			'penyakit' => $this->mPenyakit->select()
		);
		$this->load->view('Admin/Layout/aside');
		$this->load->view('Admin/Layout/header');
		$this->load->view('Admin/Penyakit/vPenyakit', $data);
		$this->load->view('Admin/Layout/footer');
	}
	public function create()
	{
		$this->form_validation->set_rules('nama', 'Nama Dokter', 'required');
		$this->form_validation->set_rules('stat', 'Hari', 'required');
		$this->form_validation->set_rules('gejala', 'Jam', 'required');

		if ($this->form_validation->run() == FALSE) {

			$this->load->view('Admin/Layout/aside');
			$this->load->view('Admin/Layout/header');
			$this->load->view('Admin/Penyakit/vCreatePenyakit');
			$this->load->view('Admin/Layout/footer');
		} else {
			$data = array(
				'nama_penyakit' => $this->input->post('nama'),
				'stat_penyakit' => $this->input->post('stat'),
				'gejala' => $this->input->post('gejala')
			);
			$this->mPenyakit->insert($data);
			$this->session->set_flashdata('success', 'Data Penyakit Berhasil Disimpan!');
			redirect('Admin/cPenyakit', 'refresh');
		}
	}
	public function update($id)
	{
		$this->form_validation->set_rules('nama', 'Nama Dokter', 'required');
		$this->form_validation->set_rules('stat', 'Hari', 'required');
		$this->form_validation->set_rules('gejala', 'Jam', 'required');

		if ($this->form_validation->run() == FALSE) {
			$data = array(
				'penyakit' => $this->mPenyakit->get_data($id)
			);
			$this->load->view('Admin/Layout/aside');
			$this->load->view('Admin/Layout/header');
			$this->load->view('Admin/Penyakit/vUpdatePenyakit', $data);
			$this->load->view('Admin/Layout/footer');
		} else {
			$data = array(
				'nama_penyakit' => $this->input->post('nama'),
				'stat_penyakit' => $this->input->post('stat'),
				'gejala' => $this->input->post('gejala')
			);
			$this->mPenyakit->update($id, $data);
			$this->session->set_flashdata('success', 'Data Penyakit Berhasil Disimpan!');
			redirect('Admin/cPenyakit', 'refresh');
		}
	}
	public function delete($id)
	{
		$this->mPenyakit->delete($id);
		$this->session->set_flashdata('success', 'Data Penyakit Berhasil Dihapus!');
		redirect('Admin/cPenyakit', 'refresh');
	}
}

/* End of file cPenyakit.php */
