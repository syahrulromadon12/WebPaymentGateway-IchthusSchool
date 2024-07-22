<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_jadwal_bayar extends CI_Model
{
	public function jadwal_bayar()
	{
		return $this->db->get('jadwal_bayar')->result_array();
	}

	public function jadwal_getbyid($id)
	{
		return $this->db->get('jadwal_bayar',['id' => $id])->row_array();
	}

	public function update_jadwal_bayar(){
		$data = [
			'nama_biaya' => $this->input->post('nama_biaya',true),
			'harga' => $this->input->post('harga',true),
			'tgl_bayar' => $this->input->post('tgl_bayar',true),
			'kode_biaya' => $this->input->post('kode_biaya',true),
			'biaya_admin' => $this->input->post('biaya_admin',true),
			'keterangan' => $this->input->post('keterangan',true),
		];
		$this->db->where('id', $this->input->post('id'));
		$this->db->update('jadwal_bayar', $data);
	}
}