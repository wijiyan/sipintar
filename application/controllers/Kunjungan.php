<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kunjungan extends Auth_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_Kunjungan');
	}
	
	public function index() {

		$data['userdata'] 	= $this->userdata;

		$data['page'] 		= "Kunjungan";
		$data['judul'] 		= "Data Kunjungan";

		$data['modal_tambah_kunjungan'] = show_my_modal('modals/modal_tambah_kunjungan', 'tambah-kunjungan', $data);

		$this->template->views('Kunjungan/kunjungan', $data);

	}

	public function tampil() {
		$data['Kunjungan'] = $this->M_Kunjungan->select_all();
		
		$this->load->view('Kunjungan/list_data', $data);
	}

	public function delete() {
		$id = $_POST['id'];
		$this->db->where('id', $id);
		$isi = $this->db->get('tbl_ibu');
		foreach ($isi->result() as $row) {
			$this->db->delete('admin', array('username' => $row->nik));
		}
		$result = $this->M_Kunjungan->delete($id);

		if ($result > 0) {
			echo show_succ_msg('Data Ibu Berhasil dihapus');
		} else {
			echo show_err_msg('Data Ibu Gagal dihapus'); 
		}
	}

	public function simpan() {
		$data = $this->input->post();

		$nik = $data['nik'];
		$cek_nik = $this->M_Kunjungan->cek_nik($nik);


		if(!empty($cek_nik))
		{
			$out['status'] = 'form';
			$out['msg'] = show_err_msg('Nomor identitas sudah ada');
		}
		else
		{
			$result = $this->M_Kunjungan->insert($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Ibu Berhasil ditambahkan');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Data Ibu Gagal ditambahkan');
			}
		}
		
		echo json_encode($out);
	}

	public function update() {
		$id = trim($_POST['id']);
		$data['Kunjungan'] = $this->M_Kunjungan->select_by_id($id);

		//print_r($data);
		echo show_my_modal('modals/modal_update_kunjungan', 'update-kunjungan', $data);
	}

	public function prosesUpdate() {
		$this->form_validation->set_rules('nama', 'Nama Ibu', 'trim|required');

		$data = $this->input->post();
		if ($this->form_validation->run() == TRUE) {

			$result = $this->M_Kunjungan->update($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Ibu Berhasil dirubah');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Data Ibu Gagal dirubah');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_val(validation_errors());
		}
		echo json_encode($out);
	}

	public function cari(){
		$nik=$_GET['nik'];
		$cari =$this->M_autocomplete->cari($nik)->result();
		echo json_encode($cari);
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