<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekap extends Auth_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_Rekap');
	}
	
	public function index() {

		$data['userdata'] 	= $this->userdata;

		$data['page'] 		= "Rekap";
		$data['judul'] 		= "Rekap Kunjungan";

		// $data['modal_tambah_rekap'] = show_my_modal('modals/modal_tambah_rekap', 'tambah-rekap', $data);

		$this->template->views('Rekap/rekap', $data);

	}

	public function cetak() {
		$data = $this->input->post();

		if($data['status'] == 'semua')
		{
			$status = '';
			//$model = ' RIGHT ';
		}
		else if($data['status'] == 'lengkap')
		{
			$status = ' WHERE ((tgl_kn1 is not null and tgl_kn2 is not null and tgl_kn3 is not null and tgl_kn4 is not null) and (tgl_kn1 <> "0000-00-00" and tgl_kn2 <> "0000-00-00" and tgl_kn3 <> "0000-00-00" and tgl_kn4 <> "0000-00-00"))';
			//$model = ' INNER ';
		}		
		elseif($data['status'] == 'tidak_lengkap')
		{
			$status = ' WHERE ((tgl_kn1 is null or tgl_kn2 is null or tgl_kn3 is null or tgl_kn4 is null) or (tgl_kn1 = "0000-00-00" and tgl_kn2 = "0000-00-00" and tgl_kn3 = "0000-00-00" and tgl_kn4 = "0000-00-00"))';
			//$model = ' INNER ';
		}

		if($data['wilayah'] == 'semua')
		{
			$wilayah = '';
		}
		elseif($data['wilayah'] == 'cpb')
		{
			$wilayah = ' AND wilayah = "cpb"';
		}
		elseif($data['wilayah'] == 'cpt')
		{
			$wilayah = ' AND wilayah = "cpt"';
		}
		elseif($data['wilayah'] == 'rws')
		{
			$wilayah = ' AND wilayah = "rws"';
		}
		elseif($data['wilayah'] == 'lw')
		{
			$wilayah = ' AND wilayah = "lw"';
		}

		$data['sql'] = ' SELECT
		tbl_ibu.id,
		tbl_ibu.nik,
		tbl_ibu.nama_ibu,
		tbl_ibu.alamat,
		tbl_ibu.no_rm,
		tbl_ibu.tpt_persalinan,
		tbl_ibu.wilayah,
		tbl_ibu.hp,
		tbl_ibu.tgl_persalinan,
		tbl_kunjungan.jd_kn1,
		tbl_kunjungan.tgl_kn1,
		tbl_kunjungan.jd_kn2,
		tbl_kunjungan.tgl_kn2,
		tbl_kunjungan.jd_kn3,
		tbl_kunjungan.tgl_kn3,
		tbl_kunjungan.jd_kn4,
		tbl_kunjungan.tgl_kn4
		FROM
		tbl_kunjungan
		RIGHT JOIN tbl_ibu ON tbl_kunjungan.nik = tbl_ibu.nik'
		.$status.$wilayah;
		//' AND (tbl_kunjungan.jd_kn1 BETWEEN "'.$data['dari'].'" and "'.$data['sampai'].'" OR tbl_kunjungan.jd_kn2 BETWEEN "'.$data['dari'].'" and "'.$data['sampai'].'" and tbl_kunjungan.jd_kn3 BETWEEN "'.$data['dari'].'" and "'.$data['sampai'].'" OR tbl_kunjungan.jd_kn4 BETWEEN "'.$data['dari'].'" and "'.$data['sampai'].'")';

		if(empty($data['excel'])){
			$this->load->view('Rekap/cetak_laporan', $data);
		}else{
			$isi = $this->db->query($data['sql']);

			error_reporting(E_ALL);

			include_once './assets/phpexcel/Classes/PHPExcel.php';
			$objPHPExcel = new PHPExcel();
			$objPHPExcel->setActiveSheetIndex(0);

			$rowCount = 1;
			$no = 1;
			$objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, "No");
			$objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, "NIK");
			$objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, "Nama");
			$objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, "No HP");
			$objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, "Jadwal KN1");
			$objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, "Kunjungan KN1");
			$objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, "Jadwal KN2");
			$objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, "Kunjungan KN2");
			$objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount, "Jadwal KN3");
			$objPHPExcel->getActiveSheet()->SetCellValue('J' . $rowCount, "Kunjungan KN3");
			$objPHPExcel->getActiveSheet()->SetCellValue('K' . $rowCount, "Jadwal KN4");
			$objPHPExcel->getActiveSheet()->SetCellValue('L' . $rowCount, "Kunjungan KN4");

			$rowCount++;

			foreach ($isi->result() as $row) {
				$objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount,  $no);
				$objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount,  '\''.$row->nik, PHPExcel_Cell_DataType::TYPE_STRING);
				$objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount,  '\''.$row->nama_ibu, PHPExcel_Cell_DataType::TYPE_STRING);
				$objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount,  $row->jd_kn1);
				$objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount,  $row->tgl_kn1);
				$objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount,  $row->jd_kn2);
				$objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount,  $row->tgl_kn2);
				$objPHPExcel->getActiveSheet()->SetCellValue('L' . $rowCount,  $row->jd_kn3);
				$objPHPExcel->getActiveSheet()->SetCellValue('M' . $rowCount,  $row->tgl_kn3);
				$objPHPExcel->getActiveSheet()->SetCellValue('N' . $rowCount,  $row->jd_kn4);
				$objPHPExcel->getActiveSheet()->SetCellValue('O' . $rowCount,  $row->tgl_kn4);
				$rowCount++;
				$no++;
			}

			header("Content-Type:application/vnd.ms-excel");
			header("Content-Disposition:attachment;filename=Laporan_Kunjungan.xlsx");
			$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
			$objWriter->save('php://output');
			
		}
	}
}