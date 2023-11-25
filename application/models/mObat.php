<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mObat extends CI_Model
{
	public function select()
	{
		$this->db->select('*');
		$this->db->from('obat');
		return $this->db->get()->result();
	}
	public function insert($data)
	{
		$this->db->insert('obat', $data);
	}
	public function get_data($id)
	{
		$this->db->select('*');
		$this->db->from('obat');
		$this->db->where('id_obat', $id);
		return $this->db->get()->row();
	}
	public function update($id, $data)
	{
		$this->db->where('id_obat', $id);
		$this->db->update('obat', $data);
	}
	public function delete($id)
	{
		$this->db->where('id_obat', $id);
		$this->db->delete('obat');
	}
}

/* End of file mObat.php */
