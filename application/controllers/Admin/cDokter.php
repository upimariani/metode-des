<?php

defined('BASEPATH') or exit('No direct script access allowed');

class cDokter extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('mDokter');
	}
	public function index()
	{
		$data = array(
			'dokter' => $this->mDokter->select()
		);
		$this->load->view('Admin/Layout/aside');
		$this->load->view('Admin/Layout/header');
		$this->load->view('Admin/Dokter/vDokter', $data);
		$this->load->view('Admin/Layout/footer');
	}
	public function create()
	{
		$this->form_validation->set_rules('nama', 'Nama Dokter', 'required');
		$this->form_validation->set_rules('ahli', 'Ahli Dokter', 'required');
		$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('no_hp', 'No Telepon', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('Admin/Layout/aside');
			$this->load->view('Admin/Layout/header');
			$this->load->view('Admin/Dokter/vCreateDokter');
			$this->load->view('Admin/Layout/footer');
		} else {
			$config['upload_path']          = './asset/foto-dokter';
			$config['allowed_types']        = 'gif|jpg|png|jpeg';
			$config['max_size']             = 500000;

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('gambar')) {
				$data = array(
					'error' => $this->upload->display_errors()
				);
				$this->load->view('Admin/Layout/aside');
				$this->load->view('Admin/Layout/header');
				$this->load->view('Admin/Dokter/vCreateDokter', $data);
				$this->load->view('Admin/Layout/footer');
			} else {
				$upload_data = $this->upload->data();
				$data = array(
					'nama_dokter' => $this->input->post('nama'),
					'ahli_dokter' => $this->input->post('ahli'),
					'jk' => $this->input->post('jk'),
					'alamat' => $this->input->post('alamat'),
					'no_telp' => $this->input->post('no_hp'),
					'foto' => $upload_data['file_name'],
					'username' => $this->input->post('username'),
					'password' => $this->input->post('password'),
				);
				$this->mDokter->insert($data);
				$this->session->set_flashdata('success', 'Data Dokter Berhasil Ditambahkan!');
				redirect('Admin/cDokter');
			}
		}
	}
	public function update($id)
	{
		$this->form_validation->set_rules('nama', 'Nama Dokter', 'required');
		$this->form_validation->set_rules('ahli', 'Ahli Dokter', 'required');
		$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('no_hp', 'No Telepon', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == TRUE) {
			$config['upload_path']          = './asset/foto-dokter';
			$config['allowed_types']        = 'gif|jpg|png|jpeg';
			$config['max_size']             = 500000;

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('gambar')) {
				$data = array(
					'dokter' => $this->mDokter->get_data($id),
					'error' => $this->upload->display_errors()
				);
				$this->load->view('Admin/Layout/aside');
				$this->load->view('Admin/Layout/header');
				$this->load->view('Admin/Dokter/vUpdateDokter', $data);
				$this->load->view('Admin/Layout/footer');
			} else {

				$upload_data =  $this->upload->data();
				$data = array(
					'nama_dokter' => $this->input->post('nama'),
					'ahli_dokter' => $this->input->post('ahli'),
					'jk' => $this->input->post('jk'),
					'alamat' => $this->input->post('alamat'),
					'no_telp' => $this->input->post('no_hp'),
					'foto' => $upload_data['file_name'],
					'username' => $this->input->post('username'),
					'password' => $this->input->post('password'),
				);
				$this->mDokter->update($id, $data);
				$this->session->set_flashdata('success', 'Data Dokter Berhasil Diperbaharui !!!');
				redirect('Admin/cDokter');
			} //tanpa ganti gambar
			$data = array(
				'nama_dokter' => $this->input->post('nama'),
				'ahli_dokter' => $this->input->post('ahli'),
				'jk' => $this->input->post('jk'),
				'alamat' => $this->input->post('alamat'),
				'no_telp' => $this->input->post('no_hp'),
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
			);
			$this->mDokter->update($id, $data);
			$this->session->set_flashdata('success', 'Data Dokter Berhasil Diperbaharui !!!');
			redirect('Admin/cDokter');
		}
		$data = array(
			'dokter' => $this->mDokter->get_data($id)
		);
		$this->load->view('Admin/Layout/aside');
		$this->load->view('Admin/Layout/header');
		$this->load->view('Admin/Dokter/vUpdateDokter', $data);
		$this->load->view('Admin/Layout/footer');
	}
	public function delete($id)
	{
		$this->mDokter->delete($id);
		$this->session->set_flashdata('success', 'Data Dokter Berhasil Dihapus!');
		redirect('Admin/cDokter', 'refresh');
	}
}

/* End of file cDokter.php */
