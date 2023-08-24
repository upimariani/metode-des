<?php

defined('BASEPATH') or exit('No direct script access allowed');

class cDashboard extends CI_Controller
{

	public function index()
	{
		$this->load->view('RekamMedis/Layout/aside');
		$this->load->view('RekamMedis/Layout/header');
		$this->load->view('RekamMedis/vDashboard');
		$this->load->view('RekamMedis/Layout/footer');
	}
}

/* End of file cDashboard.php */
