<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Kunjungan extends CI_Model {

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
        $this->db->select('*');
    //$this->db->select('tbl_skrining.id as `id_skrining`');
        $this->db->from('tbl_kunjungan');
        $this->db->join('tbl_ibu', 'tbl_kunjungan.nik = tbl_ibu.nik', 'right');
        $this->db->order_by('tbl_ibu.id','DESC');
        $data = $this->db->get();

        return $data->result();
    }

    public function select_by_id($id) {
        $data = $this->db->get_where('tbl_kunjungan', array('id' => $id));

        return $data->row();
    }

    public function select_by_nik($id) {
        $data = $this->db->query('SELECT
        tbl_ibu.id as `id_ibu`,
        tbl_ibu.nik as `nik_ibu`,
        tbl_ibu.nama_ibu,
        tbl_ibu.alamat,
        tbl_ibu.no_rm,
        tbl_ibu.tpt_persalinan,
        tbl_ibu.wilayah,
        tbl_ibu.hp,
        tbl_ibu.tgl_persalinan,
        tbl_kunjungan.nik,
        tbl_kunjungan.jd_kn1,
        tbl_kunjungan.tgl_kn1,
        tbl_kunjungan.jd_kn2,
        tbl_kunjungan.tgl_kn2,
        tbl_kunjungan.jd_kn3,
        tbl_kunjungan.tgl_kn3,
        tbl_kunjungan.jd_kn4,
        tbl_kunjungan.tgl_kn4
        FROM
        tbl_ibu
        LEFT JOIN tbl_kunjungan ON tbl_ibu.nik = tbl_kunjungan.nik
        where tbl_ibu.id = '.$id
        );

        return $data->row();
    }

    public function cek_nik($nik) {
        $this->db->where('nik', $nik);
        $data = $this->db->get('tbl_kunjungan');

        return $data->num_rows();
    }

    public function update($data) {
        $this->db->update('tbl_kunjungan', $data, array('nik' => $data['nik']));
        return $this->db->affected_rows();
    }

    public function update_bu_nik($data) {
        $this->db->update('tbl_kunjungan', $data, array('nik' => $data['nik']));
        return $this->db->affected_rows();
    }

    public function delete($id) {
        $this->db->delete('tbl_kunjungan', array('id' => $id));

        return $this->db->affected_rows();
    }

    public function insert($data) {
        $this->db->insert('tbl_kunjungan', $data);
        return $this->db->affected_rows();
    }

    public function insert_batch_kunjungan($data) {
        $this->db->insert_batch('tbl_kunjungan', $data);
        
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
