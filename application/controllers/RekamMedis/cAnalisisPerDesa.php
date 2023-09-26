<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cAnalisisPerDesa extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('mAnalisis');
	}
	public function index()
	{
		$data = array(
			'alamat' => $this->mAnalisis->alamat(),
			'periode' => $this->mAnalisis->jml_pengidap($this->session->userdata('id_penyakit')),
			// 'analisis' => $this->mAnalisis->select()
		);
		$this->load->view('RekamMedis/Layout/aside');
		$this->load->view('RekamMedis/Layout/header');
		$this->load->view('RekamMedis/AnalisisPerDesa/vAlamatPasien', $data);
		$this->load->view('RekamMedis/Layout/footer');
	}
	public function analisis($alamat)
	{
		$id_penyakit = $this->session->userdata('id_penyakit');
		$data = array(
			'id_penyakit' => $id_penyakit,
			'alamat' => $alamat,
			'analisis' => $this->mAnalisis->analisis_desa($alamat, $id_penyakit),
			'periode' => $this->mAnalisis->periode_perdesa($id_penyakit, $alamat)

		);
		$this->load->view('RekamMedis/Layout/aside');
		$this->load->view('RekamMedis/Layout/header');
		$this->load->view('RekamMedis/AnalisisPerDesa/vAnalisisPerDesa', $data);
		$this->load->view('RekamMedis/Layout/footer', $data);
	}
	public function hitung()
	{
		$tahun = $this->input->post('tahun');
		$total = $this->input->post('jml_pengidap');

		//cek prediksi terakhir
		$alamat = $this->input->post('alamat');
		$id_penyakit = $this->input->post('penyakit');
		$prediksi_sebelumnya = $this->mAnalisis->analisis_perdesa_sebelumnya($id_penyakit, $alamat);

		$st_sebelumnya = $prediksi_sebelumnya->st;
		$bt_sebelumnya = $prediksi_sebelumnya->bt;
		// echo $st_sebelumnya;
		// echo $bt_sebelumnya;


		//menghitung st, bt, dan forecast tahun setelahnya
		$st = round((0.9 * $total) + (1 - 0.9) * ($st_sebelumnya + $bt_sebelumnya), 1);
		$bt = round((0.2 * ($st - $bt_sebelumnya)) + ((1 - 0.2) * $bt_sebelumnya), 1);

		//menghitung forecast
		$forecast = $st_sebelumnya + $bt_sebelumnya;

		// echo $forecast;


		$nilai_t = $this->db->query("SELECT MAX(id_analisis_perdesa) as id, t+1 as t FROM `analisis_perdesa` WHERE id_penyakit='" . $id_penyakit . "' AND nama_desa='" . $alamat . "'")->row();
		$data_analisis = array(
			'id_penyakit' => $this->input->post('penyakit'),
			'nama_desa' => $this->input->post('alamat'),
			'thn_periode' => $tahun,
			't' => $nilai_t->t,
			'st' => $st,
			'bt' => $bt,
			'forecast' => $forecast,
			'jml_pengidap' => $total
		);
		$this->mAnalisis->insert_analisisperdesa($data_analisis);
		$this->session->set_flashdata('success', 'Analisis Berhasil Disimpan!');
		redirect('RekamMedis/cAnalisisPerDesa/analisis/' . $alamat);
	}
}

/* End of file cAnalisisPerDesa.php */
