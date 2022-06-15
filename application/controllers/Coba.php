<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Coba extends Auth_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_coba');
	}
	
	public function index() {

		$data['userdata'] 	= $this->userdata;

		$data['page'] 		= "Coba";
		$data['judul'] 		= "Data Sasaran";

		//$data['modal_tambah_sasaran'] = show_my_modal('modals/modal_tambah_sasaran', 'tambah-sasaran', $data);

		$this->template->views('Coba/coba', $data);

	}

	public function tanggal(){
		$data = $this->db->query('SELECT count(id), tgl_pelaporan FROM tbl_pelaporan GROUP BY tgl_pelaporan ORDER BY id DESC');
		$hasil = $data->result();
		echo "<pre>";
		print_r($data);
		echo "</pre>";
	}

	public function tampil($dari = '2021-01-01', $sampai = '2030-12-31') {
		//$data['dataSasaran'] = $this->M_Sasaran->select_all();
		$data['dataSasaran'] = $this->M_coba->select_all($dari, $sampai);
		$this->load->view('Coba/list_data', $data);
	}

	public function delete() {
		$id = $_POST['id'];
		$this->db->where('id', $id);
		$isi = $this->db->get('tbl_sasaran');
		foreach ($isi->result() as $row) {
			$this->db->delete('admin', array('username' => $row->nik));
		}
		$result = $this->M_Sasaran->delete($id);

		if ($result > 0) {
			echo show_succ_msg('Data Sasaran Berhasil dihapus');
		} else {
			echo show_err_msg('Data Sasaran Gagal dihapus'); 
		}
	}

	public function simpan() {
		//$this->form_validation->set_rules('nik', 'NIK', 'trim|required');
		//$this->form_validation->set_rules('nama', 'Nama Sasaran', 'trim|required');

		$data = $this->input->post();

		$nik = $data['nik'];
		$cek_nik = $this->M_Sasaran->cek_nik($nik);


		if(!empty($cek_nik))
		{
			$out['status'] = 'form';
			$out['msg'] = show_err_msg('Nomor identitas sudah ada');
		}
		else
		{
			if ($this->form_validation->run() == TRUE) {

				$result = $this->M_Sasaran->insert($data);

				if ($result > 0) {
					$out['status'] = '';
					$out['msg'] = show_succ_msg('Data Sasaran Berhasil ditambahkan');
				} else {
					$out['status'] = '';
					$out['msg'] = show_err_msg('Data Sasaran Gagal ditambahkan');
				}
			} else {
				$out['status'] = 'form';
				$out['msg'] = show_err_val(validation_errors());
			}
		}
		echo json_encode($out);
	}

	public function update() {
		$id = trim($_POST['id']);
		$data['dataSasaran'] = $this->M_Sasaran->select_by_id($id);

		//print_r($data);
		echo show_my_modal('modals/modal_update_sasaran', 'update-sasaran', $data);
	}

	public function updatenik() {
		$id = trim($_POST['id']);
		$data['dataSasaran'] = $this->M_Sasaran->select_by_nik($id);

		//print_r($data);
		echo show_my_modal('modals/modal_update_sasaran', 'update-sasaran', $data);
	}

	public function prosesUpdate() {
		$this->form_validation->set_rules('nama', 'Nama Sasaran', 'trim|required');

		$data = $this->input->post();
		if ($this->form_validation->run() == TRUE) {

			$result = $this->M_Sasaran->update($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Sasaran Berhasil dirubah');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Data Sasaran Gagal dirubah');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_val(validation_errors());
		}
		echo json_encode($out);
	}

	public function prosesUpdateS() {
		$this->form_validation->set_rules('nama', 'Nama Sasaran', 'trim|required');

		$data = $this->input->post();
		if ($this->form_validation->run() == TRUE) {

			$result = $this->M_Sasaran->update($data);

			if ($result > 0) {
				$this->session->set_flashdata('msg', show_succ_msg('Sukses'));
			} else {
				$this->session->set_flashdata('msg', show_err_msg('Gagal Periksa Kembali'));
			}
		} else {
			$this->session->set_flashdata('msg', show_err_msg('Data Belum Lengkap'));
		}
		redirect('Profile');
	}

	public function cari(){
		$nik=$_GET['nik'];
		$cari =$this->M_autocomplete->cari($nik)->result();
		echo json_encode($cari);
	} 

	public function cetak_excel(){
		$data = $this->input->post();
		$this->db->where('tgl_kunjungan', $data['tgl_kunjungan']);
		$data['isi'] = $this->db->get('tbl_sasaran');

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