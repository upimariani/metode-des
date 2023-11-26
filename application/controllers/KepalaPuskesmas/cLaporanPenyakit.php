<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cLaporanPenyakit extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mLaporan');
	}

	public function index()
	{
		$this->load->view('KepalaPuskesmas/Layout/aside');
		$this->load->view('KepalaPuskesmas/Layout/header');
		$this->load->view('KepalaPuskesmas/vLaporanPenyakit');
		$this->load->view('KepalaPuskesmas/Layout/footer');
	}
	public function cetak()
	{
		// memanggil library FPDF
		require('asset/fpdf/fpdf.php');

		// intance object dan memberikan pengaturan halaman PDF
		$pdf = new FPDF('P', 'mm', 'A4');
		$pdf->AddPage();

		$pdf->SetFont('Times', 'B', 14);

		$pdf->Cell(200, 40, 'LAPORAN HASIL PERAMALAN PER PENYAKIT', 0, 0, 'C');
		$pdf->SetLineWidth(0);
		$pdf->Cell(10, 30, '', 0, 1);
		$pdf->SetFont('Times', 'B', 9);
		$pdf->Cell(10, 7, 'No', 1, 0, 'C');
		$pdf->Cell(30, 7, 'Nama Penyakit', 1, 0, 'C');
		$pdf->Cell(30, 7, 'Tahun Analisis', 1, 0, 'C');
		$pdf->Cell(20, 7, 'Nilai st', 1, 0, 'C');
		$pdf->Cell(20, 7, 'Nilai bt', 1, 0, 'C');
		$pdf->Cell(30, 7, 'Jumlah Pengidap', 1, 0, 'C');
		$pdf->Cell(40, 7, 'Forecast', 1, 0, 'C');


		$pdf->Cell(10, 7, '', 0, 1);
		$pdf->SetFont('Times', '', 10);
		$no = 1;

		$id_penyakit = $this->input->post('penyakit');
		$data = $this->mLaporan->laporan_penyakit($id_penyakit);
		foreach ($data as $key => $value) {
			$pdf->Cell(10, 6, $no++, 1, 0, 'C');
			$pdf->Cell(30, 6, $value->nama_penyakit, 1, 0);
			$pdf->Cell(30, 6, $value->thn_prediksi, 1, 0);
			$pdf->Cell(20, 6, $value->st, 1, 0);
			$pdf->Cell(20, 6, $value->bt, 1, 0);
			$pdf->Cell(30, 6, $value->jml_pengidap, 1, 0);
			$pdf->Cell(40, 6, $value->forecast, 1, 1);
		}
		$pdf->Output();
	}
}

/* End of file cLaporan.php */
