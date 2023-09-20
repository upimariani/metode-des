<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mBoking extends CI_Model
{
	public function select()
	{
		$this->db->select('*');
		$this->db->from('boking_jdwl');
		$this->db->join('pasien', 'boking_jdwl.id_pasien = pasien.id_pasien', 'left');
		$this->db->join('jdwl_dokter', 'jdwl_dokter.id_jadwal = boking_jdwl.id_jadwal', 'left');
		$this->db->join('dokter', 'jdwl_dokter.id_dokter = dokter.id_dokter', 'left');
		$this->db->order_by('stat_boking', 'asc');
		return $this->db->get()->result();
	}
	public function update_status($id, $data)
	{
		$this->db->where('id_boking', $id);
		$this->db->update('boking_jdwl', $data);
	}
}

/* End of file mBoking.php */
