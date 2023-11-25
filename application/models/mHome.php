<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mHome extends CI_Model
{
	public function boking_pasien()
	{
		$this->db->select('*');
		$this->db->from('boking_jdwl');
		$this->db->join('jdwl_dokter', 'boking_jdwl.id_jadwal = jdwl_dokter.id_jadwal', 'left');
		$this->db->join('dokter', 'dokter.id_dokter = jdwl_dokter.id_dokter', 'left');
		$this->db->join('pasien', 'pasien.id_pasien = boking_jdwl.id_pasien', 'left');
		$this->db->where('pasien.id_pasien', $this->session->userdata('id_pasien'));
		$this->db->order_by('tgl_boking', 'desc');

		return $this->db->get()->result();
	}
}

/* End of file mHome.php */
