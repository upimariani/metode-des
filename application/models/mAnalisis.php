<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mAnalisis extends CI_Model
{
	public function select()
	{
		$this->db->select('*');
		$this->db->from('analisis_des');
		return $this->db->get()->result();
	}
	public function prediksi_sebelumnya()
	{
		return $this->db->query("SELECT * FROM `analisis_des` ORDER BY id_analisis DESC LIMIT 2;")->result();
	}
	public function insert_rekam_medis($data)
	{
		$this->db->insert('rekam_medis', $data);
	}
	public function insert_analisis($data)
	{
		$this->db->insert('analisis_des', $data);
	}
	public function update_data($id, $data)
	{
		$this->db->where('id_analisis', $id);
		$this->db->update('analisis_des', $data);
	}
}

/* End of file mAnalisis.php */
