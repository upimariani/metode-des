<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mDokter extends CI_Model
{
	public function select()
	{
		$this->db->select('*');
		$this->db->from('dokter');
		return $this->db->get()->result();
	}
	public function insert($data)
	{
		$this->db->insert('dokter', $data);
	}
	public function get_data($id)
	{
		$this->db->select('*');
		$this->db->from('dokter');
		$this->db->where('id_dokter', $id);
		return $this->db->get()->row();
	}
	public function update($id, $data)
	{
		$this->db->where('id_dokter', $id);
		$this->db->update('dokter', $data);
	}
	public function delete($id)
	{
		$this->db->where('id_dokter', $id);
		$this->db->delete('dokter');
	}
}

/* End of file mDokter.php */
