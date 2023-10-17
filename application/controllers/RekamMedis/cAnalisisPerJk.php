<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cAnalisisPerJk extends CI_Controller
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
		$this->load->view('RekamMedis/AnalisisPerJk/vAlamatPasien', $data);
		$this->load->view('RekamMedis/Layout/footer');
	}
	public function analisis($alamat, $jk)
	{
		$id_penyakit = $this->session->userdata('id_penyakit');
		$data = array(
			'id_penyakit' => $id_penyakit,
			'alamat' => $alamat,
			'jk' => $jk,
			'analisis' => $this->mAnalisis->analisis_jk($alamat, $id_penyakit, $jk),
			'periode' => $this->mAnalisis->periode_perjk($id_penyakit, $alamat, $jk)

		);
		$this->load->view('RekamMedis/Layout/aside');
		$this->load->view('RekamMedis/Layout/header');
		$this->load->view('RekamMedis/AnalisisPerJk/vAnalisisPerJk', $data);
		$this->load->view('RekamMedis/Layout/footer', $data);
	}
	public function hitung()
	{
		$tahun = $this->input->post('tahun');
		$total = $this->input->post('jml_pengidap');
		$jk = $this->input->post('jk');

		//cek prediksi terakhir
		$alamat = $this->input->post('alamat');
		$id_penyakit = $this->input->post('penyakit');
		$prediksi_sebelumnya = $this->mAnalisis->analisis_perjk_sebelumnya($id_penyakit, $alamat, $jk);

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


		$nilai_t = $this->db->query("SELECT MAX(id_analisis_jk) as id, t+1 as t FROM `analisis_jk` WHERE id_penyakit='" . $id_penyakit . "' AND nama_desa='" . $alamat . "' AND jk='" . $jk . "'")->row();
		$data_analisis = array(
			'id_penyakit' => $this->input->post('penyakit'),
			'nama_desa' => $this->input->post('alamat'),
			'jk' => $jk,
			'thn_periode' => $tahun,
			't' => $nilai_t->t,
			'st' => $st,
			'bt' => $bt,
			'forecast' => $forecast,
			'jml_pengidap' => $total
		);
		$this->mAnalisis->insert_analisisperjk($data_analisis);
		$this->session->set_flashdata('success', 'Analisis Berhasil Disimpan!');
		redirect('RekamMedis/cAnalisisPerJk/analisis/' . $alamat . '/' . $jk);
	}
}

/* End of file cAnalisisPerJk.php */
