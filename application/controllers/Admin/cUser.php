<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cUser extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mUser');
		$this->load->model('mPenyakit');
	}

	public function index()
	{
		$data = array(
			'user' => $this->mUser->select()
		);
		$this->load->view('Admin/Layout/aside');
		$this->load->view('Admin/Layout/header');
		$this->load->view('Admin/User/vUser', $data);
		$this->load->view('Admin/Layout/footer');
	}
	public function create()
	{
		$this->form_validation->set_rules('nama', 'Nama User', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('no_hp', 'No Telepon', 'required|min_length[11]|max_length[13]');
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('level', 'Level User', 'required');
		$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required');

		if ($this->form_validation->run() == FALSE) {
			$data = array(
				'penyakit' => $this->mPenyakit->select()
			);
			$this->load->view('Admin/Layout/aside');
			$this->load->view('Admin/Layout/header');
			$this->load->view('Admin/User/vCreateUser', $data);
			$this->load->view('Admin/Layout/footer');
		} else {
			$data = array(
				'id_penyakit' => $this->input->post('rekam'),
				'nama_user' => $this->input->post('nama'),
				'alamat' => $this->input->post('alamat'),
				'no_telp' => $this->input->post('no_hp'),
				'jk' => $this->input->post('jk'),
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
				'level_user' => $this->input->post('level')
			);
			$this->mUser->insert($data);
			$this->session->set_flashdata('success', 'Data User Berhasil Disimpan!');
			redirect('Admin/cUser', 'refresh');
		}
	}
	public function update($id)
	{
		$this->form_validation->set_rules('nama', 'Nama User', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('no_hp', 'No Telepon', 'required|min_length[11]|max_length[13]');
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('level', 'Level User', 'required');
		$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required');

		if ($this->form_validation->run() == FALSE) {
			$data = array(
				'user' => $this->mUser->get_data($id),
				'penyakit' => $this->mPenyakit->select()
			);
			$this->load->view('Admin/Layout/aside');
			$this->load->view('Admin/Layout/header');
			$this->load->view('Admin/User/vUpdateUser', $data);
			$this->load->view('Admin/Layout/footer');
		} else {
			$data = array(
				'id_penyakit' => $this->input->post('rekam'),
				'nama_user' => $this->input->post('nama'),
				'alamat' => $this->input->post('alamat'),
				'no_telp' => $this->input->post('no_hp'),
				'jk' => $this->input->post('jk'),
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
				'level_user' => $this->input->post('level')
			);
			$this->mUser->update($id, $data);
			$this->session->set_flashdata('success', 'Data User Berhasil Diperbaharui!');
			redirect('Admin/cUser', 'refresh');
		}
	}
	public function delete($id)
	{
		$this->mUser->delete($id);
		$this->session->set_flashdata('success', 'Data User Berhasil Dihapus!');
		redirect('Admin/cUser', 'refresh');
	}
}

/* End of file cUser.php */
