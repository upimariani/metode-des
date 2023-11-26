<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cResepObat extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('mPembayaran');
	}
	public function index()
	{
		$data = array(
			'pembayaran' => $this->mPembayaran->resep_apotek()
		);
		$this->load->view('Apotek/Layout/aside');
		$this->load->view('Apotek/Layout/header');
		$this->load->view('Apotek/vResepObat', $data);
		$this->load->view('Apotek/Layout/footer');
	}
	public function detail_obat($id)
	{
		$data = array(
			'pembayaran' => $this->mPembayaran->pembayaran_kasir(),
			'detail' => $this->mPembayaran->detail_pembayaran($id)
		);
		$this->load->view('Apotek/Layout/aside');
		$this->load->view('Apotek/Layout/header');
		$this->load->view('Apotek/vDetailResep', $data);
		$this->load->view('Apotek/Layout/footer');
	}
	public function selesai($id)
	{
		$data = array(
			'stat_boking' => '4'
		);
		$this->db->where('id_boking', $id);
		$this->db->update('boking_jdwl', $data);
		$this->session->set_flashdata('success', 'Obat Berhasil Diterima Pasien!');
		redirect('Apotek/cResepObat');
	}
}

/* End of file cResepObat.php */
