<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cHome extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mDokter');
		$this->load->model('mHome');
	}

	public function index()
	{
		$data = array(
			'dokter' => $this->mDokter->select(),
			'boking' => $this->mHome->boking_pasien()
		);
		$this->load->view('Pasien/Layout/header');
		$this->load->view('Pasien/vHome', $data);
		$this->load->view('Pasien/Layout/footer');
	}
	public function jadwal()
	{
		$id = $this->input->post('id', TRUE);
		$data = $this->db->query("SELECT * FROM `jdwl_dokter` WHERE id_dokter='" . $id . "'")->result();
		echo json_encode($data);
	}
	public function boking()
	{
		$id_jadwal = $this->input->post('jadwal');
		$tgl_periksa = $this->input->post('tgl_periksa');
		$no_antrian = $this->db->query("SELECT MAX(no_antrian) as antrian, id_jadwal, tgl_periksa FROM `boking_jdwl` WHERE  id_jadwal='" . $id_jadwal . "' AND tgl_periksa='" . $tgl_periksa . "' AND stat_boking='0'")->row();
		if ($no_antrian->antrian == null) {
			$antrian = '1';
		} else {
			$antrian = $no_antrian->antrian + 1;
		}
		$data = array(
			'id_pasien' => $this->session->userdata('id_pasien'),
			'id_jadwal' => $this->input->post('jadwal'),
			'tgl_boking' => date('Y-m-d'),
			'tgl_periksa' => $this->input->post('tgl_periksa'),
			'no_antrian' => $antrian,
			'keluhan_pasien' => $this->input->post('keluhan'),
			'stat_boking' => '0'
		);
		$this->db->insert('boking_jdwl', $data);
		$this->session->set_flashdata('success', 'Boking Jadwal Dokter berhasil disimpan!');
		redirect('Pasien/cHome');
	}
}

/* End of file cHome.php */
