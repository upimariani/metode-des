<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cJadwalDokter extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('mJadwalDokter');
		$this->load->model('mDokter');
	}
	public function index()
	{
		$data = array(
			'jdwal_dokter' => $this->mJadwalDokter->select()
		);
		$this->load->view('Admin/Layout/aside');
		$this->load->view('Admin/Layout/header');
		$this->load->view('Admin/JadwalDokter/vJadwalDokter', $data);
		$this->load->view('Admin/Layout/footer');
	}
	public function create()
	{
		$this->form_validation->set_rules('nama', 'Nama Dokter', 'required');
		$this->form_validation->set_rules('hari', 'Hari', 'required');
		$this->form_validation->set_rules('jam', 'Jam', 'required');

		if ($this->form_validation->run() == FALSE) {
			$data = array(
				'dokter' => $this->mDokter->select()
			);
			$this->load->view('Admin/Layout/aside');
			$this->load->view('Admin/Layout/header');
			$this->load->view('Admin/JadwalDokter/vCreateJadwalDokter', $data);
			$this->load->view('Admin/Layout/footer');
		} else {
			$data = array(
				'id_dokter' => $this->input->post('nama'),
				'hari' => $this->input->post('hari'),
				'jam' => $this->input->post('jam')
			);
			$this->mJadwalDokter->insert($data);
			$this->session->set_flashdata('success', 'Data Jadwal Dokter Berhasil Disimpan!');
			redirect('Admin/cJadwalDokter', 'refresh');
		}
	}
	public function update($id)
	{
		$this->form_validation->set_rules('nama', 'Nama Dokter', 'required');
		$this->form_validation->set_rules('hari', 'Hari', 'required');
		$this->form_validation->set_rules('jam', 'Jam', 'required');

		if ($this->form_validation->run() == FALSE) {
			$data = array(
				'dokter' => $this->mDokter->select(),
				'jdwal_dokter' => $this->mJadwalDokter->get_data($id)
			);
			$this->load->view('Admin/Layout/aside');
			$this->load->view('Admin/Layout/header');
			$this->load->view('Admin/JadwalDokter/vUpdateJadwalDokter', $data);
			$this->load->view('Admin/Layout/footer');
		} else {
			$data = array(
				'id_dokter' => $this->input->post('nama'),
				'hari' => $this->input->post('hari'),
				'jam' => $this->input->post('jam')
			);
			$this->mJadwalDokter->update($id, $data);
			$this->session->set_flashdata('success', 'Data Jadwal Dokter Berhasil Disimpan!');
			redirect('Admin/cJadwalDokter', 'refresh');
		}
	}
	public function delete($id)
	{
		$this->mJadwalDokter->delete($id);
		$this->session->set_flashdata('success', 'Data Jadwal Dokter Berhasil Dihapus!');
		redirect('Admin/cJadwalDokter', 'refresh');
	}
}

/* End of file cJadwalDokter.php */
