<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_biaya extends CI_Model
{
	public function biaya()
	{
		return $this->db->get('biaya')->result_array();
	}
	
	public function bayar_tern(){
		return $this->db->get_where('biaya', ['kode_biaya' => 'TERN'])->result_array();
	}	
	
	public function bayar_kegiatan()
	{
		return $this->db->get_where('biaya', ['kode_biaya' => 'Kegiatan'])->result_array();
	}

	public function bayar_wisuda()
	{
		return $this->db->get_where('biaya', ['kode_biaya' => 'Wisuda'])->result_array();
	}

	public function biaya_getbyid($id)
	{
		return $this->db->get_where('biaya', ['id' => $id])->row_array();
	}

	public function update_biaya(){
		$data = [
			'nama_biaya' => $this->input->post('nama_biaya', true),
			'awal_bayar' => $this->input->post('awal_bayar', true),
			'akhir_bayar' => $this->input->post('akhir_bayar', true),
			'harga' => $this->input->post('harga', true),
			'kode_biaya' => $this->input->post('kode_biaya', true),
			'biaya_admin' => $this->input->post('biaya_admin', true),
			'keterangan' => $this->input->post('keterangan', true),
		];
		$this->db->where('id', $this->input->post('id'));
		$this->db->update('biaya', $data);
	}

}