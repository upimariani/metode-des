<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cResepObat extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('mObat');
	}
	public function index()
	{
		$data = array(
			'obat' => $this->mObat->select()
		);
		$this->load->view('Apotek/Layout/aside');
		$this->load->view('Apotek/Layout/header');
		$this->load->view('Apotek/vResepObat', $data);
		$this->load->view('Apotek/Layout/footer');
	}
}

/* End of file cResepObat.php */
