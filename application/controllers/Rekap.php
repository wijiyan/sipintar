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
		sipintar.tbl_kunjungan.jd_kn1,
		sipintar.tbl_kunjungan.tgl_kn1,
		sipintar.tbl_kunjungan.jd_kn2,
		sipintar.tbl_kunjungan.tgl_kn2,
		sipintar.tbl_kunjungan.jd_kn3,
		sipintar.tbl_kunjungan.tgl_kn3,
		sipintar.tbl_kunjungan.jd_kn4,
		sipintar.tbl_kunjungan.tgl_kn4,
		sipintar.tbl_ibu.id,
		sipintar.tbl_ibu.nik,
		sipintar.tbl_ibu.nama_ibu,
		sipintar.tbl_ibu.alamat,
		sipintar.tbl_ibu.no_rm,
		sipintar.tbl_ibu.tpt_persalinan,
		sipintar.tbl_ibu.wilayah,
		sipintar.tbl_ibu.hp,
		sipintar.tbl_ibu.tgl_persalinan
		FROM
		sipintar.tbl_kunjungan
		RIGHT JOIN sipintar.tbl_ibu ON sipintar.tbl_kunjungan.nik = sipintar.tbl_ibu.nik'
		.$status.$wilayah;
		//' AND (tbl_kunjungan.jd_kn1 BETWEEN "'.$data['dari'].'" and "'.$data['sampai'].'" OR tbl_kunjungan.jd_kn2 BETWEEN "'.$data['dari'].'" and "'.$data['sampai'].'" and tbl_kunjungan.jd_kn3 BETWEEN "'.$data['dari'].'" and "'.$data['sampai'].'" OR tbl_kunjungan.jd_kn4 BETWEEN "'.$data['dari'].'" and "'.$data['sampai'].'")';

		$this->load->view('Rekap/cetak_laporan', $data);


	}

	public function cetak1() {
		$data = $this->input->post();

		$data['userdata'] 	= $this->userdata;

		$data['page'] 		= "Rekap";
		$data['judul'] 		= "Rekap Kunjungan";
		if($data['wilayah'] == 'semua')
		{
			$this->db->select('*');
			$this->db->from('tbl_kunjungan');
			$this->db->join('tbl_ibu', 'tbl_kunjungan.nik = tbl_ibu.nik', 'right');
			$this->db->order_by('tbl_ibu.id','DESC');
		}
		elseif($data['wilayah'] == 'cpb')
		{
			$this->db->select('*');
			$this->db->from('tbl_kunjungan');
			$this->db->join('tbl_ibu', 'tbl_kunjungan.nik = tbl_ibu.nik', 'right');
			$this->db->where('wilayah', 'cpb');
			$this->db->order_by('tbl_ibu.id','DESC');
		}
		elseif($data['wilayah'] == 'cpt')
		{
			$this->db->select('*');
			$this->db->from('tbl_kunjungan');
			$this->db->join('tbl_ibu', 'tbl_kunjungan.nik = tbl_ibu.nik', 'right');
			$this->db->where('wilayah', 'cpt');
			$this->db->order_by('tbl_ibu.id','DESC');
		}
		elseif($data['wilayah'] == 'rws')
		{
			$this->db->select('*');
			$this->db->from('tbl_kunjungan');
			$this->db->join('tbl_ibu', 'tbl_kunjungan.nik = tbl_ibu.nik', 'right');
			$this->db->where('wilayah', 'rws');
			$this->db->order_by('tbl_ibu.id','DESC');
		}
		elseif($data['wilayah'] == 'lw')
		{
			$this->db->select('*');
			$this->db->from('tbl_kunjungan');
			$this->db->join('tbl_ibu', 'tbl_kunjungan.nik = tbl_ibu.nik', 'right');
			$this->db->where('wilayah', 'lw');
			$this->db->order_by('tbl_ibu.id','DESC');
		}


		$data['isi'] = $this->db->get();

		$this->load->view('Rekap/cetak_laporan', $data);

	}

	public function cetak_excel(){
		$data = $this->input->post();
		$this->db->where('tgl_kunjungan', $data['tgl_kunjungan']);
		$data['isi'] = $this->db->get('tbl_Ibu');

		error_reporting(E_ALL);

		include_once './assets/phpexcel/Classes/PHPExcel.php';
		$objPHPExcel = new PHPExcel();
		$objPHPExcel->setActiveSheetIndex(0);

		$rowCount = 1;
		$no = 1;
		$objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, "No");
		$objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, "NIK");
		$objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, "BPJS");
		$objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, "Nama Lengkap");
		$objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, "Tanggal Lahir");
		$objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, "Nama Kepala Keluarga");
		$objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, "Agama");
		$objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, "Jenis Kelamin");
		$objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount, "HP");
		$objPHPExcel->getActiveSheet()->SetCellValue('J' . $rowCount, "No Darurat");
		$objPHPExcel->getActiveSheet()->SetCellValue('K' . $rowCount, "Alamat");
		$objPHPExcel->getActiveSheet()->SetCellValue('L' . $rowCount, "RW");
		$objPHPExcel->getActiveSheet()->SetCellValue('M' . $rowCount, "RT");
		$objPHPExcel->getActiveSheet()->SetCellValue('N' . $rowCount, "Batuk");
		$objPHPExcel->getActiveSheet()->SetCellValue('O' . $rowCount, "Demam");
		$objPHPExcel->getActiveSheet()->SetCellValue('P' . $rowCount, "Pilek");
		$objPHPExcel->getActiveSheet()->SetCellValue('Q' . $rowCount, "Sesak Nafas");
		$objPHPExcel->getActiveSheet()->SetCellValue('R' . $rowCount, "Keluar Kota");
		$objPHPExcel->getActiveSheet()->SetCellValue('S' . $rowCount, "Kontak Suspek");
		$objPHPExcel->getActiveSheet()->SetCellValue('T' . $rowCount, "Jenis Keluhan");
		$objPHPExcel->getActiveSheet()->SetCellValue('U' . $rowCount, "Tanggal Kunjungan");
		$objPHPExcel->getActiveSheet()->SetCellValue('V' . $rowCount, "Sesi");
		$objPHPExcel->getActiveSheet()->SetCellValue('W' . $rowCount, "Setuju");
		$objPHPExcel->getActiveSheet()->SetCellValue('X' . $rowCount, "Antrian");

		$rowCount++;

		foreach ($data['isi']->result() as $row) {
			$objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount,  $no);
			$objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount,  '\''.$row->nik, PHPExcel_Cell_DataType::TYPE_STRING);
			$objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount,  '\''.$row->bpjs, PHPExcel_Cell_DataType::TYPE_STRING);
			$objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount,  $row->nama);
			$objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount,  $row->tgl_lahir);
			$objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount,  $row->kk);
			$objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount,  $row->agama);
			$objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount,  $row->jenkel);
			$objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount,  '\''.$row->hp, PHPExcel_Cell_DataType::TYPE_STRING);
			$objPHPExcel->getActiveSheet()->SetCellValue('J' . $rowCount,  '\''.$row->hp_darurat, PHPExcel_Cell_DataType::TYPE_STRING);
			$objPHPExcel->getActiveSheet()->SetCellValue('K' . $rowCount,  $row->alamat);
			$objPHPExcel->getActiveSheet()->SetCellValue('L' . $rowCount,  $row->rt);
			$objPHPExcel->getActiveSheet()->SetCellValue('M' . $rowCount,  $row->rw);
			$objPHPExcel->getActiveSheet()->SetCellValue('N' . $rowCount,  $row->batuk);
			$objPHPExcel->getActiveSheet()->SetCellValue('O' . $rowCount,  $row->demam);
			$objPHPExcel->getActiveSheet()->SetCellValue('P' . $rowCount,  $row->pilek);
			$objPHPExcel->getActiveSheet()->SetCellValue('Q' . $rowCount,  $row->sesak_nafas);
			$objPHPExcel->getActiveSheet()->SetCellValue('R' . $rowCount,  $row->keluar_kota);
			$objPHPExcel->getActiveSheet()->SetCellValue('S' . $rowCount,  $row->kontak_suspek);
			$objPHPExcel->getActiveSheet()->SetCellValue('T' . $rowCount,  $row->jenis_keluhan);
			$objPHPExcel->getActiveSheet()->SetCellValue('U' . $rowCount,  $row->tgl_kunjungan);
			$objPHPExcel->getActiveSheet()->SetCellValue('V' . $rowCount,  $row->sesi);
			$objPHPExcel->getActiveSheet()->SetCellValue('W' . $rowCount,  $row->setuju);
			$objPHPExcel->getActiveSheet()->SetCellValue('X' . $rowCount,  $row->antrian);

			$rowCount++;
			$no++;
		}

		header("Content-Type:application/vnd.ms-excel");
		header("Content-Disposition:attachment;filename=Laporan_Kunjungan.xlsx");
		$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
		$objWriter->save('php://output');
	}


}