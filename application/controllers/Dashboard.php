<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_admin');
		$this->load->model('M_Dashboard');
		// $this->load->model('M_Pelaporan');
	}
	
	public function index() {
		$data['userdata'] 				= $this->userdata;

		$data['page'] 					= "Dashboard";
		$data['judul'] 					= "Dashboard";
		$this->template->views('dashboard', $data);
	}

	public function sasaran() {
		$data['userdata'] 	= $this->userdata;

		$data['page'] 				= "Pelaporan";
		$data['judul'] 				= "Riwayat Pelaporan";

		$data['modal_tambah_pelaporan'] = show_my_modal('modals/modal_tambah_pelaporan', 'tambah-pelaporan', $data);

		$nik = $this->userdata->username;
		$swab = $this->db->query('SELECT * FROM tbl_pelaporan WHERE (((jadwal_swab != "0000-00-00" OR jadwal_swab <> "") OR jadwal_swab != NULL) AND hasil_swab = "") AND nik = '.$nik);
		$jadwal_swab = $swab->num_rows();
		foreach ($swab->result() as $row) {
		if($jadwal_swab > 0){
			$this->session->set_flashdata('msg', show_msg('Silakan Datang Ke Puskesmas Pada hari '.$this->M_Pelaporan->tgl_indo($row->jadwal_swab, true).'  Jam 08.00 - 10.00 WIB Untuk Melakukan Swab <br> TERIMA KASIH'));

		}
		}

		$this->template->views('Pelaporan/pelaporan', $data);
	}

	public function riwayat_swab() {
		$data['userdata'] 	= $this->userdata;
		$data['data'] = $this->M_Dashboard->riwayat_swab($this->userdata->username);

		$data['page'] 				= "Riwayat_swab";
		$data['judul'] 				= "Riwayat Swab";

		$data['modal_tambah_pelaporan'] = show_my_modal('modals/modal_tambah_pelaporan', 'tambah-pelaporan', $data);

		$this->template->views('Pelaporan/riwayat_swab', $data);
	}

	public function informasi() {
		$data['userdata'] 	= $this->userdata;

		$data['page'] 				= "Informasi";
		$data['judul'] 				= "Informasi Terkini";
		$this->template->views('Informasi/informasi', $data);
	}

}
