<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mHistory extends CI_Model
{
	public function history()
	{
		$this->db->select('*');
		$this->db->from('diagnosa_dokter');
		$this->db->join('penyakit', 'diagnosa_dokter.id_penyakit = penyakit.id_penyakit', 'left');
		$this->db->join('boking_jdwl', 'boking_jdwl.id_boking = diagnosa_dokter.id_boking', 'left');
		$this->db->join('pasien', 'pasien.id_pasien = boking_jdwl.id_pasien', 'left');

		$this->db->where('diagnosa_dokter.id_penyakit=1');
		return $this->db->get()->result();
	}
}

/* End of file mHistory.php */
