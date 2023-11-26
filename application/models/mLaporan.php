<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mLaporan extends CI_Model
{
	public function laporan_penyakit($id_penyakit)
	{
		$this->db->select('*');
		$this->db->from('analisis_des');
		$this->db->join('penyakit', 'penyakit.id_penyakit = analisis_des.id_penyakit', 'left');
		$this->db->join('rekam_medis', 'analisis_des.id_rekam_medis = rekam_medis.id_rekam_medis', 'left');
		$this->db->where('analisis_des.id_penyakit', $id_penyakit);
		return $this->db->get()->result();
	}
	public function laporan_desa($penyakit, $desa)
	{
		$this->db->select('*');
		$this->db->from('analisis_perdesa');
		$this->db->join('penyakit', 'analisis_perdesa.id_penyakit = penyakit.id_penyakit', 'left');
		$this->db->where('nama_desa', $desa);
		$this->db->where('analisis_perdesa.id_penyakit', $penyakit);
		return $this->db->get()->result();
	}
	public function laporan_jk($penyakit, $desa, $jk)
	{
		$this->db->select('*');
		$this->db->from('analisis_jk');
		$this->db->join('penyakit', 'analisis_jk.id_penyakit = penyakit.id_penyakit', 'left');
		$this->db->where('analisis_jk.id_penyakit', $penyakit);
		$this->db->where('nama_desa', $desa);
		$this->db->where('jk', $jk);
		return $this->db->get()->result();
	}
	public function laporan_umur($penyakit, $desa, $umur)
	{
		$this->db->select('*');
		$this->db->from('analisis_umur');
		$this->db->join('penyakit', 'analisis_umur.id_penyakit = penyakit.id_penyakit', 'left');
		$this->db->where('analisis_umur.id_penyakit', $penyakit);
		$this->db->where('nama_desa', $desa);
		$this->db->where('umur_bawah', $umur);
		return $this->db->get()->result();
	}
}

/* End of file mLaporan.php */
