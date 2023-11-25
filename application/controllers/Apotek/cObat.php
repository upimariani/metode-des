<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cObat extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mObat');
	}

	public function index()
	{
		$data = array(
			'obat' => $this->mObat->select()
		);
		$this->load->view('Apotek/Layout/aside');
		$this->load->view('Apotek/Layout/header');
		$this->load->view('Apotek/vObat', $data);
		$this->load->view('Apotek/Layout/footer');
	}
	public function create()
	{
		$data = array(
			'nama_obat' => $this->input->post('nama'),
			'harga_obat' => $this->input->post('harga')
		);
		$this->mObat->insert($data);
		$this->session->set_flashdata('success', 'Data Obat Berhasil Disimpan!');
		redirect('Apotek/cObat');
	}
	public function update($id)
	{
		$data = array(
			'nama_obat' => $this->input->post('nama'),
			'harga_obat' => $this->input->post('harga')
		);
		$this->mObat->update($id, $data);
		$this->session->set_flashdata('success', 'Data Obat Berhasil Diperbaharui!');
		redirect('Apotek/cObat');
	}
	public function delete($id)
	{
		$this->mObat->delete($id);
		$this->session->set_flashdata('success', 'Data Obat Berhasil Dihapus!');
		redirect('Apotek/cObat');
	}
}

/* End of file cObat.php */
