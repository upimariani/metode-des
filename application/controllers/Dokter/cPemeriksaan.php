<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cPemeriksaan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mPemeriksaan');
		$this->load->model('mPenyakit');
		$this->load->model('mObat');
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
			'saran' => $this->input->post('saran')
		);
		$this->mPemeriksaan->insert_diagnosa($data);

		$status = array(
			'stat_boking' => '2'
		);
		$this->mPemeriksaan->update_status($id, $status);
		$this->session->set_flashdata('success', 'Data Diagnosa Berhasil Disimpan!');
		redirect('Dokter/cPemeriksaan/resep_obat/' . $id);
	}

	//resep obat pasien------------------------------------------------------------
	public function resep_obat($id)
	{
		$data = array(
			'id_boking' => $id,
			'obat' => $this->mObat->select()
		);
		$this->load->view('Dokter/Layout/aside');
		$this->load->view('Dokter/Layout/header');
		$this->load->view('Dokter/Pemeriksaan/vResepObat', $data);
		$this->load->view('Dokter/Layout/footer');
	}
	public function add($id)
	{
		$data = array(
			'id' => $this->input->post('obat'),
			'name' => $this->input->post('nama'),
			'qty' => $this->input->post('jumlah'),
			'price' => $this->input->post('harga'),
			'aturan' => $this->input->post('aturan')
		);
		$this->cart->insert($data);
		$this->session->set_flashdata('success', 'Obat Berhasil Ditambahkan!');
		redirect('Dokter/cPemeriksaan/resep_obat/' . $id);
	}
	public function delete($rowid, $id)
	{
		$this->cart->remove($rowid);
		$this->session->set_flashdata('success', 'Obat Berhasil Dihapus!');
		redirect('Dokter/cPemeriksaan/resep_obat/' . $id);
	}
	public function selesai($id)
	{
		foreach ($this->cart->contents() as $key => $value) {
			$data = array(
				'id_obat' => $value['id'],
				'id_boking' => $id,
				'jml_obat' => $value['qty'],
				'aturan' => $value['aturan']
			);
			$this->db->insert('resep_obat', $data);
		}

		//data total pembayaran
		$total = array(
			'total_pembayaran' => $this->cart->total()
		);
		$this->db->where('id_boking', $id);
		$this->db->update('boking_jdwl', $total);
		$this->session->set_flashdata('success', 'Obat Berhasil Dikirim ke Apotek!');
		redirect('Dokter/cPemeriksaan');
	}
}

/* End of file cPemeriksaan.php */
