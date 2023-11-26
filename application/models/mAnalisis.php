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
	public function prediksi_sebelumnya($id_penyakit)
	{
		return $this->db->query("SELECT * FROM `analisis_des` WHERE id_penyakit='" . $id_penyakit . "' ORDER BY id_analisis DESC LIMIT 1")->result();
	}
	public function insert_rekam_medis($data)
	{
		$this->db->insert('rekam_medis', $data);
	}
	public function insert_analisis($data)
	{
		$this->db->insert('analisis_des', $data);
	}

	public function jml_pengidap($id_penyakit)
	{
		return $this->db->query("SELECT COUNT(id_pasien) as jml_pengidap, YEAR(tgl_periksa) as tahun, id_penyakit FROM `boking_jdwl` JOIN diagnosa_dokter ON boking_jdwl.id_boking=diagnosa_dokter.id_boking WHERE id_penyakit='" . $id_penyakit . "' GROUP BY YEAR(tgl_periksa)")->result();
	}

	//analisis per desa-------------------
	public function alamat()
	{
		return $this->db->query("SELECT * FROM `pasien` GROUP BY alamat ORDER BY alamat ASC")->result();
	}
	public function analisis_desa($alamat, $id_penyakit)
	{
		$this->db->select('*');
		$this->db->from('analisis_perdesa');
		$this->db->where('nama_desa', $alamat);
		$this->db->where('id_penyakit', $id_penyakit);
		return $this->db->get()->result();
	}
	public function periode_perdesa($id_penyakit, $alamat)
	{
		return $this->db->query("SELECT COUNT(boking_jdwl.id_pasien) as jml, alamat, YEAR(tgl_periksa) as tahun, id_penyakit FROM `boking_jdwl` JOIN diagnosa_dokter ON boking_jdwl.id_boking=diagnosa_dokter.id_boking JOIN pasien ON boking_jdwl.id_pasien=pasien.id_pasien WHERE id_penyakit='" . $id_penyakit . "' AND alamat='" . $alamat . "' GROUP BY  alamat, YEAR(tgl_periksa)")->result();
	}
	public function analisis_perdesa_sebelumnya($id_penyakit, $alamat)
	{
		return $this->db->query("SELECT * FROM `analisis_perdesa` WHERE id_penyakit='" . $id_penyakit . "' AND nama_desa='" . $alamat . "' ORDER BY thn_periode DESC LIMIT 1")->row();
	}
	public function insert_analisisperdesa($data)
	{
		$this->db->insert('analisis_perdesa', $data);
	}

	//analisis per jenis kelamin
	public function analisis_jk($alamat, $id_penyakit, $jk)
	{
		$this->db->select('*');
		$this->db->from('analisis_jk');
		$this->db->where('nama_desa', $alamat);
		$this->db->where('jk', $jk);

		$this->db->where('id_penyakit', $id_penyakit);
		return $this->db->get()->result();
	}
	public function periode_perjk($id_penyakit, $alamat, $jk)
	{
		return $this->db->query("SELECT COUNT(boking_jdwl.id_pasien) as jml, alamat, YEAR(tgl_periksa) as tahun, jk, id_penyakit FROM `boking_jdwl` JOIN diagnosa_dokter ON boking_jdwl.id_boking=diagnosa_dokter.id_boking JOIN pasien ON boking_jdwl.id_pasien=pasien.id_pasien WHERE id_penyakit='" . $id_penyakit . "' AND alamat='" . $alamat . "' AND jk='" . $jk . "' GROUP BY  alamat, YEAR(tgl_periksa), jk")->result();
	}
	public function analisis_perjk_sebelumnya($id_penyakit, $alamat, $jk)
	{
		return $this->db->query("SELECT * FROM `analisis_jk` WHERE id_penyakit='" . $id_penyakit . "' AND nama_desa='" . $alamat . "' AND jk='" . $jk . "' ORDER BY thn_periode DESC LIMIT 1")->row();
	}
	public function insert_analisisperjk($data)
	{
		$this->db->insert('analisis_jk', $data);
	}


	//analisis per umur
	public function analisis_umur($alamat, $id_penyakit, $umur_bawah, $umur_atas)
	{
		$this->db->select('*');
		$this->db->from('analisis_umur');
		$this->db->where('nama_desa', $alamat);
		$this->db->where('umur_bawah', $umur_bawah);
		$this->db->where('umur_atas', $umur_atas);

		$this->db->where('id_penyakit', $id_penyakit);
		return $this->db->get()->result();
	}
	public function periode_perumur($id_penyakit, $alamat, $umur_bawah, $umur_atas)
	{
		return $this->db->query("SELECT COUNT(boking_jdwl.id_pasien) as jml, alamat, YEAR(tgl_periksa) as tahun, id_penyakit,(YEAR(CURDATE()) - YEAR(tanggal_lahir)) AS umur FROM `boking_jdwl` JOIN diagnosa_dokter ON boking_jdwl.id_boking=diagnosa_dokter.id_boking JOIN pasien ON boking_jdwl.id_pasien=pasien.id_pasien WHERE id_penyakit='" . $id_penyakit . "' AND alamat='" . $alamat . "' AND YEAR(tanggal_lahir) >= '" . $umur_bawah . "' AND YEAR(tanggal_lahir) <= '" . $umur_atas . "' GROUP BY  alamat, YEAR(tgl_periksa)")->result();
	}
	public function analisis_perumur_sebelumnya($id_penyakit, $alamat, $umur_bawah, $umur_atas)
	{
		return $this->db->query("SELECT * FROM `analisis_umur` WHERE id_penyakit='" . $id_penyakit . "' AND nama_desa='" . $alamat . "' AND umur_bawah='" . $umur_bawah . "' AND umur_atas='" . $umur_atas . "' ORDER BY thn_periode DESC LIMIT 1")->row();
	}
	public function insert_analisisperumur($data)
	{
		$this->db->insert('analisis_umur', $data);
	}
}

/* End of file mAnalisis.php */
