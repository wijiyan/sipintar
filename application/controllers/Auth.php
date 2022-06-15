<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_auth');
	}
	
	public function index() {
		$session = $this->session->userdata('status');

		if ($session == '') {
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
		} else {
			redirect('Dashboard');
		}
	}

	public function login() {
		
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[4]|max_length[90]');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == TRUE) {
			$username = trim($_POST['username']);
			$password = trim($_POST['password']);
			$captcha = trim($_POST['g-recaptcha-response']);

			$captcha = '1'; //BYPASS CHAPCHA LOCALHOST

			$data = $this->M_auth->login($username, $password);

			if(!empty($captcha)){
				if ($data == false) {
					$this->session->set_flashdata('msg', show_err_msg('Username / Password Salah'));
					redirect('Auth');
				} else {
					$session = [
						'userdata' => $data,
						'status' => "Loged in"
					];
					$this->session->set_userdata($session);
					if($data->level == 'sasaran'){
						redirect('Dashboard/sasaran');
					}else if($data->level == 'admin'){
						redirect('Dashboard');
					}else if($data->level == 'pemantau'){
						redirect('Pemantauan');
					}else{
						$this->session->sess_destroy();
					}
					
				}
			} else {
				$this->session->set_flashdata('msg', show_err_msg('Chaptcha Error'));
				
				redirect('Auth');
				
			}
			$this->session->set_flashdata('msg', show_err_msg('Username dan Password Harap Di Isi'));
			
			redirect('Auth');
		}
	}
	
	public function login2() {
		$data = $this->input->post();
		print_r($data);
	}

	public function logout() {
		$this->session->sess_destroy();
		redirect('Auth');
	}

	//Start: method tambahan untuk reset code  
	public function lupa_password(){
		$this->load->library('recaptcha');
		$this->load->view('lupa_password');
	}

	public function getUserInfo($id){
		$q = $this->db->get_where('admin', array('id' => $id), 1);
		if ($this->db->affected_rows() > 0) {
			$row = $q->row();
			return $row;
		} else {
			error_log('no user found getUserInfo(' . $id . ')');
			return false;
		}
	}

	public function getUserInfoByEmail($email)
	{
		$q = $this->db->get_where('admin', array('email' => $email), 1);
		if ($this->db->affected_rows() > 0) {
			$row = $q->row();
			return $row;
		}
	}

	public function insertToken($user_id)
	{
		$token = substr(sha1(rand()), 0, 30);
		$date = date('Y-m-d');

		$string = array(
			'token' => $token,
			'user_id' => $user_id,
			'created' => $date
		);
		$query = $this->db->insert_string('tokens', $string);
		$this->db->query($query);
		return $token . $user_id;
	}

	public function isTokenValid($token)
	{
		$tkn = substr($token, 0, 30);
		$uid = substr($token, 30);

		$q = $this->db->get_where('tokens', array(
			'tokens.token' => $tkn,
			'tokens.user_id' => $uid
		), 1);

		if ($this->db->affected_rows() > 0) {
			$row = $q->row();

			$created = $row->created;
			$createdTS = strtotime($created);
			$today = date('Y-m-d');
			$todayTS = strtotime($today);

			if ($createdTS != $todayTS) {
				return false;
			}

			$user_info = $this->getUserInfo($row->user_id);
			return $user_info;
		} else {
			return false;
		}
	}

	public function updatePassword($post)
	{
		$this->db->where('id_user', $post['id_user']);
		$this->db->update('users', array('password' => $post['password']));
		return true;
	}
    //End: method tambahan untuk reset code  

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */