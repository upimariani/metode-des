
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cHistory extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mHistory');
	}

	public function index()
	{
		$data = array(
			'history' => $this->mHistory->history()
		);
		$this->load->view('RekamMedis/Layout/aside');
		$this->load->view('RekamMedis/Layout/header');
		$this->load->view('RekamMedis/HistoryPemeriksaan/vHistory', $data);
		$this->load->view('RekamMedis/Layout/footer');
	}
}

/* End of file cHistory.php */
