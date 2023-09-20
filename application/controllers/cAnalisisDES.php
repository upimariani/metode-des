<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cAnalisisDES extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mAnalisis');
	}
	public function index()
	{
		//cek prediksi terakhir
		$prediksi_sebelumnya = $this->mAnalisis->prediksi_sebelumnya();
		foreach ($prediksi_sebelumnya as $key => $value) {
			if ($value->st == '0') {
				$data = array(
					'prediksi' => $value->forecast,
					'thn_prediksi' => $value->thn_prediksi
				);
			}
		}
		$this->load->view('vDataRekamMedis', $data);
	}
	public function hitung()
	{
		$tahun = $this->input->post('tahun');
		$tahun_berikutnya = $this->input->post('tahun_berikutnya');
		$total = $this->input->post('jml_pengidap');

		//cek prediksi terakhir
		$prediksi_sebelumnya = $this->mAnalisis->prediksi_sebelumnya();
		foreach ($prediksi_sebelumnya as $key => $value) {
			if ($value->st != '0') {
				$sts = $value->st;
				$bts = $value->bt;
				$t = $value->t + 2;
			} else {
				$id_analisis = $value->id_analisis;
			}
		}



		//data rekam medis fakta
		$data_rekam_medis = array(
			'id_penyakit' => '1',
			'thn_periode' => $tahun,
			'jml_pengidap' => $total
		);
		$this->mAnalisis->insert_rekam_medis($data_rekam_medis);


		//menghitung st, bt, dan forecast tahun setelahnya
		$st = round((0.9 * $total) + (1 - 0.9) * ($sts + $bts), 1);
		$bt = round((0.2 * ($st - $bts)) + ((1 - 0.2) * $bts), 1);


		//data update perhitungan st, bt
		$data_update = array(
			'st' => $st,
			'bt' => $bt,
			'id_rekam_medis' => $id_analisis
		);
		$this->mAnalisis->update_data($id_analisis, $data_update);


		//data analisis metode des prediksi tahun berikutnya
		$ftm = $st + ($bt * 1);
		$data_analisis_berikutnya = array(
			'thn_prediksi' => $tahun_berikutnya,
			't' => $t,
			'st' => '0',
			'bt' => '0',
			'forecast' => $ftm
		);
		$this->mAnalisis->insert_analisis($data_analisis_berikutnya);

		redirect('cAnalisisDES');
	}
}

/* End of file cAnalisisDES.php */
