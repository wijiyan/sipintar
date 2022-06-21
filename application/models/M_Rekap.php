<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Rekap extends CI_Model {

    public function select_all1($cari, $isi) {
        if($cari == 'nik'){
            $this->db->like('nik', urldecode($isi));
        } else if ($cari == 'nama'){
            $this->db->like('nama_ibu', urldecode($isi));
        }
        $this->db->order_by('nama_ibu','ASC');
        $data = $this->db->get('tbl_ibu');

        return $data->result();
    }

    public function select_all() {
        $this->db->order_by('nama_ibu','ASC');
        $data = $this->db->get('tbl_ibu');

        return $data->result();
    }

    public function select_by_id($id) {
        $data = $this->db->get_where('tbl_ibu', array('id' => $id));

        return $data->row();
    }

    public function select_by_nik($id) {
        $data = $this->db->get_where('tbl_ibu', array('nik' => $id));

        return $data->row();
    }

    public function cek_nik($nik) {
        $this->db->where('nik', $nik);
        $data = $this->db->get('tbl_ibu');

        return $data->num_rows();
    }

    public function update($data) {
        $this->db->update('tbl_ibu', $data, array('id' => $data['id']));
        return $this->db->affected_rows();
    }

    public function update_bu_nik($data) {
        $this->db->update('tbl_ibu', $data, array('nik' => $data['nik']));
        return $this->db->affected_rows();
    }

    public function delete($id) {
        $this->db->delete('tbl_ibu', array('id' => $id));

        return $this->db->affected_rows();
    }

    public function insert($data) {
        $this->db->insert('tbl_ibu', $data);
        return $this->db->affected_rows();
    }

    public function insert_batch_ibu($data) {
        $this->db->insert_batch('tbl_ibu', $data);
        
        return $this->db->affected_rows();
    }

    public function insert_batch_pelaporan($data) {
        $this->db->insert_batch('tbl_pelaporan', $data);
        
        return $this->db->affected_rows();
    }

    public function insert_batch_admin($data) {
        $this->db->insert_batch('admin', $data);
        
        return $this->db->affected_rows();
    }


}
