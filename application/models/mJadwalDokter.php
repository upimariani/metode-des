<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mJadwalDokter extends CI_Model
{
	public function select()
	{
		$this->db->select('*');
		$this->db->from('jdwl_dokter');
		$this->db->join('dokter', 'jdwl_dokter.id_dokter = dokter.id_dokter', 'left');
		return $this->db->get()->result();
	}
	public function insert($data)
	{
		$this->db->insert('jdwl_dokter', $data);
	}
	public function get_data($id)
	{
		$this->db->select('*');
		$this->db->from('jdwl_dokter');
		$this->db->where('id_jadwal', $id);
		return $this->db->get()->row();
	}
	public function update($id, $data)
	{
		$this->db->where('id_jadwal', $id);
		$this->db->update('jdwl_dokter', $data);
	}
	public function delete($id)
	{
		$this->db->where('id_jadwal', $id);
		$this->db->delete('jdwl_dokter');
	}
}

/* End of file mJadwalDokter.php */
