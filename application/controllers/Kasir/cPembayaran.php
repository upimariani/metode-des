<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cPembayaran extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mPembayaran');
		$this->load->model('mHome');
		$this->load->model('mDokter');
	}

	public function index()
	{
		$data = array(
			'pembayaran' => $this->mPembayaran->pembayaran_kasir()
		);
		$this->load->view('Kasir/Layout/aside');
		$this->load->view('Kasir/Layout/header');
		$this->load->view('Kasir/vPembayaran', $data);
		$this->load->view('Kasir/Layout/footer');
	}
	public function detail_pembayaran($id)
	{
		$data = array(
			'pembayaran' => $this->mPembayaran->pembayaran_kasir(),
			'detail' => $this->mPembayaran->detail_pembayaran($id)
		);
		$this->load->view('Kasir/Layout/aside');
		$this->load->view('Kasir/Layout/header');
		$this->load->view('Kasir/vDetailPembayaran', $data);
		$this->load->view('Kasir/Layout/footer');
	}
	public function metode_pembayaran($id)
	{
		$metode = $this->input->post('pembayaran');
		if ($metode == '1') {
			$data = array(
				'pembayaran' => $this->input->post('pembayaran'),
				'stat_boking' => '3'
			);
			$this->db->where('id_boking', $id);
			$this->db->update('boking_jdwl', $data);
			$this->session->set_flashdata('success', 'Pemabayaran Berhasil Dibayar!');
			redirect('Kasir/cPembayaran');
		} else {
			$data = array(
				'pembayaran' => $this->input->post('pembayaran'),
			);
			$this->db->where('id_boking', $id);
			$this->db->update('boking_jdwl', $data);
			$this->session->set_flashdata('success', 'Pemabayaran Menunggu Upload Bukti Pembayaran!');
			redirect('Kasir/cPembayaran/detail_pembayaran/' . $id);
		}
	}
	public function konfirmasi_pembayaran($id)
	{
		$data = array(
			'stat_boking' => '3'
		);
		$this->db->where('id_boking', $id);
		$this->db->update('boking_jdwl', $data);
		$this->session->set_flashdata('success', 'Obat Berhasil Diterima Pasien!');
		redirect('Kasir/cPembayaran/detail_pembayaran/' . $id);
	}

	//pasien
	public function bayar($id)
	{
		$config['upload_path']          = './asset/pembayaran';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 500000;

		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('gambar')) {

			$data = array(
				'dokter' => $this->mDokter->select(),
				'boking' => $this->mHome->boking_pasien()
			);
			$this->load->view('Pasien/Layout/header');
			$this->load->view('Pasien/vHome', $data);
			$this->load->view('Pasien/Layout/footer');
		} else {
			$upload_data = $this->upload->data();
			$data = array(
				'pembayaran' => $upload_data['file_name']
			);
			$this->db->where('id_boking', $id);
			$this->db->update('boking_jdwl', $data);
			$this->session->set_flashdata('success', 'Anda berhasil melakukan pembayaran!!!');
			redirect('Pasien/cHome', 'refresh');
		}
	}
}

/* End of file cPemabayaran.php */
