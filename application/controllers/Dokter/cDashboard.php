<?php

defined('BASEPATH') or exit('No direct script access allowed');

class cDashboard extends CI_Controller
{

	public function index()
	{
		$this->load->view('Dokter/Layout/aside');
		$this->load->view('Dokter/Layout/header');
		$this->load->view('Dokter/vDashboard');
		$this->load->view('Dokter/Layout/footer');
	}
}

/* End of file cDashboard.php */
