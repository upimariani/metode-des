<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cLogin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('mLogin');
	}
	public function index()
	{
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('level', 'Level User', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('vLogin');
		} else {
			$level = $this->input->post('level');
			if ($level == '1') {
				$username = $this->input->post('username');
				$password = $this->input->post('password');
				$data = $this->mLogin->login($username, $password);

				if ($data) {
					$id = $data->id_user;
					$level = $data->level_user;
					$id_penyakit = $data->id_penyakit;
					$this->session->set_userdata('id', $id);
					$this->session->set_userdata('level', $level);
					$this->session->set_userdata('id_penyakit', $id_penyakit);

					if ($data->level_user == '1') {
						$this->session->set_flashdata('success', 'Selamat Datang Admin!');
						redirect('Admin/cDashboard');
					} else {
						$this->session->set_flashdata('success', 'Selamat Datang Rekam Medis!');
						redirect('RekamMedis/cDashboard');
					}
				} else {
					$this->session->set_flashdata('error', 'Username dan Password Salah!');
					redirect('cLogin');
				}
			} else {
				$username = $this->input->post('username');
				$password = $this->input->post('password');
				$data = $this->mLogin->login_dokter($username, $password);

				if ($data) {
					$id = $data->id_dokter;
					$this->session->set_userdata('id_dokter', $id);
					redirect('Dokter/cDashboard');
				} else {
					$this->session->set_flashdata('error', 'Username dan Password Salah!');
					redirect('cLogin');
				}
			}
		}
	}
	public function logout()
	{
		$this->session->unset_userdata('id');
		$this->session->unset_userdata('level');
		$this->session->unset_userdata('id_dokter');
		$this->session->unset_userdata('id_penyakit');
		$this->session->set_flashdata('success', 'Anda Berhasil Logout!');
		redirect('cLogin');
	}
}

/* End of file cLogin.php */
