<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cAnalisisPerUmur extends CI_Controller
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

		);
		$this->load->view('RekamMedis/Layout/aside');
		$this->load->view('RekamMedis/Layout/header');
		$this->load->view('RekamMedis/AnalisisPerUmur/vAlamatPasien', $data);
		$this->load->view('RekamMedis/Layout/footer');
	}
	public function analisis($alamat, $umur_bawah, $umur_atas)
	{
		$id_penyakit = $this->session->userdata('id_penyakit');
		$data = array(
			'id_penyakit' => $id_penyakit,
			'alamat' => $alamat,
			'umur_bawah' => $umur_bawah,
			'umur_atas' => $umur_atas,
			'analisis' => $this->mAnalisis->analisis_umur($alamat, $id_penyakit, $umur_bawah, $umur_atas),
			'periode' => $this->mAnalisis->periode_perumur($id_penyakit, $alamat, $umur_bawah, $umur_atas)

		);
		$this->load->view('RekamMedis/Layout/aside');
		$this->load->view('RekamMedis/Layout/header');
		$this->load->view('RekamMedis/AnalisisPerUmur/vAnalisisPerUmur', $data);
		$this->load->view('RekamMedis/Layout/footer', $data);
	}
	public function hitung()
	{
		$tahun = $this->input->post('tahun');
		$total = $this->input->post('jml_pengidap');
		$umur_bawah = $this->input->post('umur_bawah');
		$umur_atas = $this->input->post('umur_atas');


		//cek prediksi terakhir
		$alamat = $this->input->post('alamat');
		$id_penyakit = $this->input->post('penyakit');
		$prediksi_sebelumnya = $this->mAnalisis->analisis_perumur_sebelumnya($id_penyakit, $alamat, $umur_bawah, $umur_atas);

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


		$nilai_t = $this->db->query("SELECT MAX(id_analisis_umur) as id, t+1 as t FROM `analisis_umur` WHERE id_penyakit='" . $id_penyakit . "' AND umur_bawah='" . $umur_bawah . "' AND umur_atas='" . $umur_atas . "'")->row();
		$data_analisis = array(
			'id_penyakit' => $this->input->post('penyakit'),
			'nama_desa' => $this->input->post('alamat'),
			'umur_bawah' => $umur_bawah,
			'umur_atas' => $umur_atas,
			'thn_periode' => $tahun,
			't' => $nilai_t->t,
			'st' => $st,
			'bt' => $bt,
			'forecast' => $forecast,
			'jml_pengidap' => $total
		);
		$this->mAnalisis->insert_analisisperumur($data_analisis);
		$this->session->set_flashdata('success', 'Analisis Berhasil Disimpan!');
		redirect('RekamMedis/cAnalisisPerUmur/analisis/' . $alamat . '/' . $umur_bawah . '/' . $umur_atas);
	}
}

/* End of file cAnalisisPerUmur.php */
