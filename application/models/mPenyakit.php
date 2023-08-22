<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mPenyakit extends CI_Model
{
	public function select()
	{
		$this->db->select('*');
		$this->db->from('penyakit');
		return $this->db->get()->result();
	}
	public function insert($data)
	{
		$this->db->insert('penyakit', $data);
	}
	public function get_data($id)
	{
		$this->db->select('*');
		$this->db->from('penyakit');
		$this->db->where('id_penyakit', $id);
		return $this->db->get()->row();
	}
	public function update($id, $data)
	{
		$this->db->where('id_penyakit', $id);
		$this->db->update('penyakit', $data);
	}
	public function delete($id)
	{
		$this->db->where('id_penyakit', $id);
		$this->db->delete('penyakit');
	}
}

/* End of file mPenyakit.php */
