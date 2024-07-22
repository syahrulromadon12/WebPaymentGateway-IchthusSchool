<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_user extends CI_Model
{
	public function siswa()
	{
		return $this->db->get_where('user', ['role_id' => "2"])->result_array();
	}

	public function countSiswa()
	{
		return $this->db->get_where('user', ['role_id' => "2"])->num_rows();
	}

	public function getSiswa($limit, $offset)
	{
		$this->db->where('role_id', "2");
		$this->db->limit($limit, $offset);
		return $this->db->get('user')->result_array();
	}


	public function user_getbyid($id)
	{
		return $this->db->get_where('user', ['id' => $id])->row_array();
	}

	public function jml_siswa()
	{
		// Query untuk menghitung jumlah user dengan role_id = 2
		$this->db->where('role_id', 2);
		return $this->db->count_all_results('user');
	}

	public function countSiswaByKelas($kelas) {
        $this->db->where('role_id', "2");
        $this->db->where('kelas', $kelas);
        return $this->db->count_all_results('user');
    }

    public function getSiswaByKelas($limit, $offset, $kelas) {
		$this->db->where('role_id', "2");
		$this->db->where('kelas', $kelas);
		$this->db->limit($limit, $offset);
		$query = $this->db->get('user');
		return $query->result_array();
	}	
}