<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mAnalisis extends CI_Model
{
	public function select()
	{
		$this->db->select('*');
		$this->db->from('analisis_des');
		$this->db->where('id_penyakit', $this->session->userdata('id_penyakit'));
		return $this->db->get()->result();
	}
	public function prediksi_sebelumnya()
	{
		return $this->db->query("SELECT * FROM `analisis_des` ORDER BY id_analisis DESC LIMIT 1;")->result();
	}
	public function insert_rekam_medis($data)
	{
		$this->db->insert('rekam_medis', $data);
	}
	public function insert_analisis($data)
	{
		$this->db->insert('analisis_des', $data);
	}


	//perhitungan otomatis
	public function jml_pengidap($id_penyakit)
	{
		return $this->db->query("SELECT COUNT(id_pasien) as jml_pengidap, YEAR(tgl_periksa) as tahun, id_penyakit FROM `boking_jdwl` JOIN diagnosa_dokter ON boking_jdwl.id_boking=diagnosa_dokter.id_boking WHERE id_penyakit='" . $id_penyakit . "' GROUP BY YEAR(tgl_periksa)")->result();
	}
}

/* End of file mAnalisis.php */
