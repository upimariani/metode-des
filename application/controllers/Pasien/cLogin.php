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

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('Pasien/Layout/header');
			$this->load->view('Pasien/vLogin');
			$this->load->view('Pasien/Layout/footer');
		} else {
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$data = $this->mLogin->login_pasien($username, $password);
			if ($data) {
				$id_pasien = $data->id_pasien;
				$nama = $data->nama_pasien;


				$array = array(
					'id_pasien' => $id_pasien,
					'nama' => $nama
				);
				$this->session->set_userdata($array);

				redirect('Pasien/cHome');
			} else {
				$this->session->set_flashdata('error', 'Username dan Password Anda Salah!');

				redirect('Pasien/cLogin');
			}
		}
	}
	public function register()
	{
		$this->form_validation->set_rules('nama', 'Nama Pasien', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('no_hp', 'No Telepon', 'required');
		$this->form_validation->set_rules('ttl', 'Tempat, Tanggal Lahir', 'required');
		$this->form_validation->set_rules('bb', 'Berat Badan', 'required');
		$this->form_validation->set_rules('tinggi', 'Tinggi Badan', 'required');
		$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('Pasien/Layout/header');
			$this->load->view('Pasien/vRegistrasi');
			$this->load->view('Pasien/Layout/footer');
		} else {
			$data = array(
				'nama_pasien' => $this->input->post('nama'),
				'alamat' => $this->input->post('alamat'),
				'no_hp' => $this->input->post('no_hp'),
				'jk' => $this->input->post('jk'),
				'bb' => $this->input->post('bb'),
				'tinggi' => $this->input->post('tinggi'),
				'ttl' => $this->input->post('ttl'),
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password')
			);
			$this->mLogin->registrasi($data);
			$this->session->set_flashdata('success', 'Anda Berhasil Registrasi! Silahkan Melakukan Login');
			redirect('Pasien/cLogin');
		}
	}
	public function logout()
	{

		$this->session->unset_userdata('id_pasien');
		$this->session->unset_userdata('nama');
		$this->session->set_flashdata('success', 'Anda Berahasil Logout!');
		redirect('Pasien/cLogin');
	}
}

/* End of file cLogin.php */
