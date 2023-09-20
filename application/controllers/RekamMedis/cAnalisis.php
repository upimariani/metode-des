<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cAnalisis extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('mAnalisis');
	}
	public function index()
	{
		$data = array(
			'periode' => $this->mAnalisis->jml_pengidap($this->session->userdata('id_penyakit')),
			'analisis' => $this->mAnalisis->select()
		);
		$this->load->view('RekamMedis/Layout/aside');
		$this->load->view('RekamMedis/Layout/header');
		$this->load->view('RekamMedis/Analisis/vAnalisis', $data);
		$this->load->view('RekamMedis/Layout/footer');
	}
	public function hitung()
	{
		$tahun = $this->input->post('tahun');
		$total = $this->input->post('jml_pengidap');

		//cek prediksi terakhir
		$prediksi_sebelumnya = $this->mAnalisis->prediksi_sebelumnya();
		foreach ($prediksi_sebelumnya as $key => $value) {
			$st_sebelumnya = $value->st;
			$bt_sebelumnya = $value->bt;
		}

		//menghitung st, bt, dan forecast tahun setelahnya
		$st = round((0.9 * $total) + (1 - 0.9) * ($st_sebelumnya + $bt_sebelumnya), 1);
		$bt = round((0.2 * ($st - $bt_sebelumnya)) + ((1 - 0.2) * $bt_sebelumnya), 1);

		//menghitung forecast
		$forecast = $st_sebelumnya + $bt_sebelumnya;

		//menyimpan data di tabel rekam_medis
		$data_rekam_medis = array(
			'id_penyakit' => $this->input->post('penyakit'),
			'thn_periode' => $tahun,
			'jml_pengidap' => $total
		);
		$this->mAnalisis->insert_rekam_medis($data_rekam_medis);


		$id_rekam_medis = $this->db->query("SELECT MAX(id_rekam_medis) as id FROM `rekam_medis`")->row();
		$nilai_t = $this->db->query("SELECT MAX(id_analisis) as id, t+1 as t FROM `analisis_des`")->row();
		$data_analisis = array(
			'id_rekam_medis' => $id_rekam_medis->id,
			'id_penyakit' => $this->input->post('penyakit'),
			'thn_prediksi' => $tahun,
			't' => $nilai_t->t,
			'st' => $st,
			'bt' => $bt,
			'forecast' => $forecast
		);
		$this->mAnalisis->insert_analisis($data_analisis);
		$this->session->set_flashdata('success', 'Analisis Berhasil Disimpan!');
		redirect('RekamMedis/cAnalisis');
	}
}

/* End of file cAnalisis.php */
