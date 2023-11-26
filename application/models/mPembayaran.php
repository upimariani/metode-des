<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mPembayaran extends CI_Model
{
	public function pembayaran_kasir()
	{
		$this->db->select('*');
		$this->db->from('boking_jdwl');
		$this->db->join('pasien', 'boking_jdwl.id_pasien = pasien.id_pasien', 'left');
		$this->db->where('stat_boking=2');
		return $this->db->get()->result();
	}
	public function detail_pembayaran($id)
	{
		$data['pasien'] = $this->db->query("SELECT * FROM `boking_jdwl` JOIN diagnosa_dokter ON boking_jdwl.id_boking=diagnosa_dokter.id_diagnosa JOIN pasien ON pasien.id_pasien=boking_jdwl.id_pasien JOIN penyakit ON penyakit.id_penyakit=diagnosa_dokter.id_penyakit WHERE boking_jdwl.id_boking='" . $id . "'")->row();
		$data['obat'] = $this->db->query("SELECT * FROM `boking_jdwl` JOIN resep_obat ON boking_jdwl.id_boking=resep_obat.id_boking JOIN obat ON obat.id_obat=resep_obat.id_obat WHERE boking_jdwl.id_boking='" . $id . "'")->result();
		return $data;
	}

	//apotek
	public function resep_apotek()
	{
		$this->db->select('*');
		$this->db->from('boking_jdwl');
		$this->db->join('pasien', 'boking_jdwl.id_pasien = pasien.id_pasien', 'left');
		$this->db->where('stat_boking=3');
		return $this->db->get()->result();
	}
}

/* End of file mPembayaran.php */
