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
	public function hitung_perdesa()
	{
		$variabel = $this->db->query("SELECT COUNT(boking_jdwl.id_pasien) as jml, alamat, YEAR(tgl_periksa) as tahun, id_penyakit FROM `boking_jdwl` JOIN diagnosa_dokter ON boking_jdwl.id_boking=diagnosa_dokter.id_boking JOIN pasien ON boking_jdwl.id_pasien=pasien.id_pasien WHERE YEAR(tgl_periksa) = '2018' GROUP BY id_penyakit, alamat")->result();
		foreach ($variabel as $key => $value) {
			$where = $this->db->query("SELECT COUNT(boking_jdwl.id_pasien) as jml, alamat, YEAR(tgl_periksa) as tahun, id_penyakit FROM `boking_jdwl` JOIN diagnosa_dokter ON boking_jdwl.id_boking=diagnosa_dokter.id_boking JOIN pasien ON boking_jdwl.id_pasien=pasien.id_pasien WHERE id_penyakit='" . $value->id_penyakit . "' AND alamat='" . $value->alamat . "' GROUP BY id_penyakit, alamat, YEAR(tgl_periksa)")->result();
			foreach ($where as $key => $item) {
				echo $item->jml;
				echo $item->alamat;
				echo $item->tahun;
				echo $item->id_penyakit;
				echo '<br>';
				if ($item->tahun == '2018') {
					$thn_pertama = $item->jml;
				} else if ($item->tahun == '2019') {
					$thn_kedua = $item->jml;
				} else if ($item->tahun == '2020') {
					$thn_ketiga = $item->jml;
				} else if ($item->tahun == '2021') {
					$thn_keempat = $item->jml;
				}
				echo '<br>';
			}
			// untuk t1
			$b1 = (($thn_kedua - $thn_pertama) + ($thn_keempat - $thn_ketiga)) / 2;
			echo $b1;
			echo $value->alamat;
			echo $value->id_penyakit;
			// echo $b1;
			echo '<br>';

			$data = array(
				'id_penyakit' => $value->id_penyakit,
				'nama_desa' => $value->alamat,
				'thn_periode' => $value->tahun,
				't' => '1',
				'st' => $value->jml,
				'bt' => $b1,
				'forecast' => '0',
				'jml_pengidap' => $value->jml
			);
			// $this->db->insert('analisis_perdesa', $data);
		}
	}
	public function hitung_perjk()
	{
		$variabel = $this->db->query("SELECT COUNT(boking_jdwl.id_pasien) as jml, jk, alamat, YEAR(tgl_periksa) as tahun, id_penyakit FROM `boking_jdwl` JOIN diagnosa_dokter ON boking_jdwl.id_boking=diagnosa_dokter.id_boking JOIN pasien ON boking_jdwl.id_pasien=pasien.id_pasien WHERE YEAR(tgl_periksa) = '2018' AND jk='P' GROUP BY id_penyakit, alamat, jk")->result();
		foreach ($variabel as $key => $value) {
			$where = $this->db->query("SELECT COUNT(boking_jdwl.id_pasien) as jml, jk, alamat, YEAR(tgl_periksa) as tahun, id_penyakit FROM `boking_jdwl` JOIN diagnosa_dokter ON boking_jdwl.id_boking=diagnosa_dokter.id_boking JOIN pasien ON boking_jdwl.id_pasien=pasien.id_pasien WHERE id_penyakit='" . $value->id_penyakit . "' AND alamat='" . $value->alamat . "' AND jk='P' GROUP BY id_penyakit, alamat, YEAR(tgl_periksa), jk")->result();
			foreach ($where as $key => $item) {
				echo $item->jml;
				echo $item->alamat;
				echo $item->tahun;
				echo $item->id_penyakit;
				echo '<br>';
				if ($item->tahun == '2018') {
					$thn_pertama = $item->jml;
				} else if ($item->tahun == '2019') {
					$thn_kedua = $item->jml;
				} else if ($item->tahun == '2020') {
					$thn_ketiga = $item->jml;
				} else if ($item->tahun == '2021') {
					$thn_keempat = $item->jml;
				}
			}
			// untuk t1
			$b1 = (($thn_kedua - $thn_pertama) + ($thn_keempat - $thn_ketiga)) / 2;
			echo $b1;
			echo $value->alamat;
			echo $value->id_penyakit;
			echo $value->jk;
			echo '<br>';
			echo '<br>';
			echo '<br>';

			$data = array(
				'id_penyakit' => $value->id_penyakit,
				'nama_desa' => $value->alamat,
				'jk' => $value->jk,
				'thn_periode' => $value->tahun,
				't' => '1',
				'st' => $value->jml,
				'bt' => $b1,
				'forecast' => '0',
				'jml_pengidap' => $value->jml
			);
			$this->db->insert('analisis_jk', $data);
		}
	}
	public function hitung_perumur()
	{
		$variabel = $this->db->query("SELECT COUNT(boking_jdwl.id_pasien) as jml, alamat, (YEAR(CURDATE()) - YEAR(tanggal_lahir)) AS umur, YEAR(tgl_periksa) as tahun, id_penyakit FROM `boking_jdwl` JOIN diagnosa_dokter ON boking_jdwl.id_boking=diagnosa_dokter.id_boking JOIN pasien ON boking_jdwl.id_pasien=pasien.id_pasien WHERE YEAR(tgl_periksa) = '2018' AND (YEAR(CURDATE()) - YEAR(tanggal_lahir)) >= '21' && (YEAR(CURDATE()) - YEAR(tanggal_lahir)) <= '26' GROUP BY id_penyakit, alamat")->result();
		foreach ($variabel as $key => $value) {
			$where = $this->db->query("SELECT COUNT(boking_jdwl.id_pasien) as jml, (YEAR(CURDATE()) - YEAR(tanggal_lahir)) AS umur, alamat, YEAR(tgl_periksa) as tahun, id_penyakit FROM `boking_jdwl` JOIN diagnosa_dokter ON boking_jdwl.id_boking=diagnosa_dokter.id_boking JOIN pasien ON boking_jdwl.id_pasien=pasien.id_pasien WHERE id_penyakit='" . $value->id_penyakit . "' AND alamat='" . $value->alamat . "' AND (YEAR(CURDATE()) - YEAR(tanggal_lahir)) >= '21' && (YEAR(CURDATE()) - YEAR(tanggal_lahir)) <= '26' GROUP BY id_penyakit, alamat, YEAR(tgl_periksa)")->result();
			foreach ($where as $key => $item) {
				echo $item->jml;
				echo $item->alamat;
				echo $item->tahun;
				echo $item->id_penyakit;
				echo '<br>';
				if ($item->tahun == '2018') {
					$thn_pertama = $item->jml;
				} else if ($item->tahun == '2019') {
					$thn_kedua = $item->jml;
				} else if ($item->tahun == '2020') {
					$thn_ketiga = $item->jml;
				} else if ($item->tahun == '2021') {
					$thn_keempat = $item->jml;
				}
			}
			// untuk t1
			$b1 = (($thn_kedua - $thn_pertama) + ($thn_keempat - $thn_ketiga)) / 2;
			echo $b1;
			echo $value->alamat;
			echo $value->id_penyakit;
			// echo $value->jk;
			echo '<br>';
			echo '<br>';
			echo '<br>';

			$data = array(
				'id_penyakit' => $value->id_penyakit,
				'nama_desa' => $value->alamat,
				'umur_bawah' => '21',
				'umur_atas' => '26',
				'thn_periode' => $value->tahun,
				't' => '1',
				'st' => $value->jml,
				'bt' => $b1,
				'forecast' => '0',
				'jml_pengidap' => $value->jml
			);
			$this->db->insert('analisis_umur', $data);
		}
	}
}

/* End of file cAnalisisDES.php */
