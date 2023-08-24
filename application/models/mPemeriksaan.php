<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mPemeriksaan extends CI_Model
{
	public function select()
	{
		$this->db->select('*');
		$this->db->from('boking_jdwl');
		$this->db->join('pasien', 'boking_jdwl.id_pasien = pasien.id_pasien', 'left');
		$this->db->join('jdwl_dokter', 'jdwl_dokter.id_jadwal = boking_jdwl.id_jadwal', 'left');
		$this->db->join('dokter', 'dokter.id_dokter = jdwl_dokter.id_dokter', 'left');
		$this->db->where('dokter.id_dokter', $this->session->userdata('id_dokter'));
		$this->db->where('stat_boking=1');
		return $this->db->get()->result();
	}
	public function insert_diagnosa($data)
	{
		$this->db->insert('diagnosa_dokter', $data);
	}
	public function update_status($id, $data)
	{
		$this->db->where('id_boking', $id);
		$this->db->update('boking_jdwl', $data);
	}
}

/* End of file mPemeriksaan.php */
