<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Daftar');
		$this->load->model('M_auth');
		$this->load->model('M_Pelaporan');
		$this->load->model('M_Skrining');
	}

	public function index()
	{
		$data['page'] 	  = "Home";
		$data['judul'] 	  = "Home";

		//data['modal_tambah_anc'] = show_my_modal('modals/modal_tambah_anc', 'tambah-anc', $data);

		$this->load->view('home', $data);
	}

	public function lupa_password()
	{
		$this->load->view('lupa_password');
	}

	public function simpan()
	{
		$data = $this->input->post();
		$captcha = $data['g-recaptcha'];
		//$captcha = '1'; //BYPASS CHAPCHA LOCALHOST
		$isi = array (
			'nik' => $data['nik'],
			'password'  => $data['password'],
			'bpjs' => $data['bpjs'],
			'nama' => $data['nama'],
			'tgl_lahir' => $data['tgl_lahir'],
			'umur' => $data['umur'],
			'agama' => $data['agama'],
			'jenkel' => $data['jenkel'],
			'status_menikah' => $data['status_menikah'],
			'hp' => $data['hp'],
			'alamat' => $data['alamat'],
			'pekerjaan' => $data['pekerjaan'],
			'instansi' => $data['instansi'],
			'nama_kk' => $data['nama_kk'],
			'prov_domisili' => $this->M_Pelaporan->nama_daerah('provinsi', $data['prov_domisili']),
			'kota_domisili' => $this->M_Pelaporan->nama_daerah('kabupaten', $data['kota_domisili']),
			'kec_domisili' => $this->M_Pelaporan->nama_daerah('kecamatan', $data['kec_domisili']),
			'kel_domisili' => $this->M_Pelaporan->nama_daerah('kelurahan', $data['kel_domisili']),
			'rt_domisili' => $data['rt_domisili'],
			'rw_domisili' => $data['rw_domisili'],
			'alamat_domisili' => $data['alamat_domisili']
		);

		$cek_nik = $this->M_Daftar->cek_nik($data['nik']);
		if($captcha == '1'){
			if ($data == false) {
				$this->session->set_flashdata('msg', show_err_msg('Username / Password Salah'));
				redirect('Auth');
			}

			if($cek_nik < 1)
			{
				$result = $this->M_Daftar->insert($isi);
				$result2 = $this->M_Daftar->insert_admin($data);
				if ($result > 0) {
					$this->session->set_flashdata('msg', show_succ_msg('Silakan Isi Pelaporan'));
					$data = $this->M_auth->login($data['nik'], $data['password']);
					$session = [
						'userdata' => $data,
						'status' => "Loged in"
					];
					$this->session->set_userdata($session);
					redirect('Dashboard/sasaran');

				} else {
					$this->session->set_flashdata('msg', show_error_msg('Gagal Tersimpan Periksa Kembali Data Anda'));
					redirect('Home/register');
				}
			} else {
				$this->session->set_flashdata('msg', show_err_msg('Anda Sudah Terdaftar Silakan Login Disini Menggunakan Nik Anda'));
				redirect('Home/login');
			}
		}  else {
			$this->session->set_flashdata('msg', show_err_msg('Chaptcha Error'));

			redirect('Home/register');
		}
	}

	public function simpan_pelaporan(){
		$data = $this->input->post();

		$isi = Array
		(
			'tgl_pelaporan' => $data['tgl_pelaporan'],
			'nik' => $data['nik'],
			'password' => md5('123456'),
			'bpjs' => $data['bpjs'],
			'nama' => $data['nama'],
			'tgl_lahir' => $data['tgl_lahir'],
			'umur' => $data['umur'],
			'agama' => $data['agama'],
			'jenkel' => $data['jenkel'],
			'status_menikah' => $data['status_menikah'],
			'hp' => $data['hp'],
			'email' => $data['email'],
			'nama_kk' => $data['nama_kk'],
			'pekerjaan' => $data['pekerjaan'],
			'instansi' => $data['instansi'],
			'alamat' => $data['alamat'],
			'prov_domisili' => $data['prov_domisili'],
			'kota_domisili' => $data['kota_domisili'],
			'kec_domisili' => $data['kec_domisili'],
			'kel_domisili' => $data['kel_domisili'],
			'rt_domisili' => $data['rt_domisili'],
			'rw_domisili' => $data['rw_domisili'],
			'alamat_domisili' => $data['alamat_domisili'],
			'jenis_kasus' => $data['jenis_kasus'],
			'pemeriksaan_tambahan' => $data['pemeriksaan_tambahan'],
			'kasus_primer' =>$data['kasus_primer'],
			'status_pengantar_lab' =>$data['status_pengantar_lab'],
			'tgl_rapid' => $data['tgl_rapid'],
			'hasil_rapid' => $data['hasil_rapid'],
			'lab_pemeriksa' => $data['lab_pemeriksa'],
			'tgl_swab' => $data['tgl_swab'],
			'hasil_swab' => $data['hasil_swab'],
			'tgl_keluar_hasil' => $data['tgl_keluar_hasil'],
			'tgl_mulai_gejala' => $data['tgl_mulai_gejala'],
			'gejala' => $data['gejala'],
			'gejala_lainya' => $data['gejala_lainya'],
			'komorbid' => $data['komorbid'],
			'komorbid_lainya' => $data['komorbid_lainya'],
			'status_pasien' => $data['status_pasien'],
			'keterangan' => $data['keterangan']
		);

		$result = $this->M_Pelaporan->insert($data);

		if ($result > 0) {
			$out['status'] = '';
			$out['msg'] = show_succ_msg('Data Pelaporan Berhasil ditambahkan');
		} else {
			$out['status'] = '';
			$out['msg'] = show_err_msg('Data Pelaporan Gagal ditambahkan');
		}
		echo json_encode($out);
	}


	public function skrining()
	{
		$this->load->view('skrining');
	}

	public function cek_tiket() {
		$isi = $this->input->post();
		$nik = $isi['nik'];
		$this->db->where('nik', $nik);
		$this->db->order_by('tgl_kunjungan', 'DESC');
		$this->db->limit(1);
		$data = $this->db->get('tbl_pasien');
		foreach ($data->result() as $row) {
			$data2 = array(
				'nama' => $row->nama,
				'nik' => $row->nik,
				'bpjs' => $row->bpjs,
				'alamat' => $row->alamat,
				'tgl_kunjungan' => $row->tgl_kunjungan,
				'sesi' => $row->sesi,
				'antrian' => $row->antrian,
			);
		}
		$this->load->view('cek_tiket', $data2);
	}

	public function getsesi($tgl)
	{
		$libur = $this->M_Daftar->getlibur($tgl);
		if(!empty($libur)){
			echo "<option>LIBUR</option>";
		} else {
			$sesion=$this->db->get('tbl_sesi');
			foreach($sesion->result() as $row){
				echo "<option value='{$row->sesi}'>{$row->sesi} sisa ".$this->M_Daftar->terisi($tgl, $row->sesi)."</option>";
			}
		}
	}

	public function register()
	{
		$this->load->model('M_Daerah'); 
		$data['provinsi'] = $this->M_Daerah->getProv();
		$this->load->library('recaptcha');
		$attr = array(
			'data-callback' => 'recallback'
		);
		$data['recaptcha'] = $this->recaptcha->create_box($attr);

		$this->load->view('register', $data);
	}

	public function login()
	{
		$this->load->library('recaptcha');
		$recaptcha = $this->recaptcha->create_box();

		// Check if the form is submitted
		if($this->input->post('action') === 'submit')
		{
			$is_valid = $this->recaptcha->is_valid();

			if($is_valid['success'])
			{
				echo "reCAPTCHA solved";
			}
			else
			{
				echo "reCAPTCHA not solved/an error occured";
			}
		}
		$this->load->view('login', ['recaptcha' => $recaptcha]);
	}

	public function skriningsasaran($nik=''){
		$data['isi'] = $nik;
		$this->load->view('skriningsasaran', $data);
	}


	public function SimpanSkrining(){
		$data = $this->input->post();

		$nik = $data['nik'];
		$cek_ada = $this->M_Skrining->ada($nik);
		$cek_nik = $this->M_Skrining->cek_nik($nik);

		if(!empty($cek_ada))
		{

			if(!empty($cek_nik))
			{
				$this->session->set_flashdata('msg', show_succ_msg('Hari Ini Anda Sudah Mengisi Data Pemantauan'));
				if(empty($this->userdata->username)){
					redirect('Dashboard/sasaran');
				}
				redirect('Home/skriningsasaran');
			}
			else {
				$result = $this->M_Skrining->insert($data);

				if ($result > 0) {
					$this->session->set_flashdata('msg', show_succ_msg('Terima Kasih Sudah Mengisi Data Pemantauan'));
					if(empty($this->userdata->username)){
						redirect('Dashboard/sasaran');
					}
				} else {
					$this->session->set_flashdata('msg', show_succ_msg('Coba Kembali'));
				}
			}
		}  else {
			$this->session->set_flashdata('msg', show_succ_msg('Anda Belum Terdaftar Sebagai Pasien Pemantauan'));
			redirect('Home/skriningsasaran');
		}
		redirect('Home/skriningsasaran');
	}



}
