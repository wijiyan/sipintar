<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model { 
	public function update($data, $id) {
		$this->db->where("id", $id);
		$this->db->update("admin", $data);

		return $this->db->affected_rows();
	}

	public function updateAdmin($data) {
		if(empty($data['password'])){
			$password = $data['password_lama'];
		}elseif(!empty($data['password'])){
			$password = md5($data['password']);
		}
		$data2 = array(
			'username' => $data['username'],
			'nama' => $data['nama'],
			'email' => $data['username'],
			'password' => $password,
			'level' => $data['level'],
			'wilayah' => $data['wlayah'],
		);

		$this->db->where("id", $data['id']);
		$this->db->update("admin", $data2);

		return $this->db->affected_rows();
	}

	public function select($id = '') {
		if ($id != '') {
			$this->db->where('id', $id);
		}

		$data = $this->db->get('admin');

		return $data->row();
	}

	public function select_all() {
		$this->db->order_by('id', 'DESC');
		$data = $this->db->get('admin');

		return $data->result();
	}

	public function select_by_id($id) {
		$data = $this->db->get_where('admin', array('id' => $id));

		return $data->row();
	}

	public function cek_username($username) {
		$this->db->where('username', $username);
		$data = $this->db->get('admin');

		return $data->num_rows();
	}

	public function delete($id) {
		$this->db->delete('admin', array('id' => $id));

		return $this->db->affected_rows();
	}

	public function delete_pemantau($username) {
		$this->db->delete('admin', array('username' => $username));

		return $this->db->affected_rows();
	}

	public function cek_nik($nik) {
		$this->db->get('admin', array('username' => $nik));

		return $this->db->affected_rows();
	}

	public function insert($data) {
		$data2 = array(
			'username' => $data['username'],
			'nama' => $data['nama'],
			'email' => $data['username'],
			'password' => md5($data['password']),
			'foto' => $data['foto'],
			'level' => $data['level']
		);
		$this->db->insert('admin', $data2);
		return $this->db->affected_rows();
	}

	public function deleteWilayah($id) {
		$this->db->delete('tbl_wilayah', array('id' => $id));

		return $this->db->affected_rows();
	}

	public function select_all_wilayah() {
		$this->db->order_by('id', 'DESC');
		$data = $this->db->get('tbl_wilayah');

		return $data->result();
	}
}
