<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_transaksi extends CI_Model
{
    public function all_trans()
    {
        return $this->db->get('transaksi')->result_array();
    }

    public function get_transaksi($limit, $offset)
    {
        return $this->db->get('transaksi', $limit, $offset)->result_array();
    }

    public function count_trans()
    {
        return $this->db->count_all_results('transaksi');
    }

    public function transgetid()
    {
        return $this->db->get_where('transaksi', ['nama' => $this->session->userdata('nama')])->result_array();
    }

    public function saldo_biaya()
    {
        $this->db->select('SUM(gross_amount) as total');
        $this->db->from('transaksi');
        return $this->db->get()->row()->total;
    }

    public function pending_payment()
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->like('status_code', '201');
        return $this->db->count_all_results();
    }

    public function success_payment()
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->like('status_code', '200');
        return $this->db->count_all_results();
    }

    public function sudah_bayar()
    {
        $this->db->select('user.*');
        $this->db->from('user');
        $this->db->join('transaksi', 'user.nis = transaksi.nis');
        $this->db->where('transaksi.status_code', '200');
        return $this->db->get()->result_array();
    }


    public function belum_bayar()
    {
        $this->db->select('user.*');
        $this->db->from('user');
        $this->db->where('user.role_id', '2'); // Mengambil data siswa
        $this->db->where("NOT EXISTS (SELECT 1 FROM transaksi WHERE transaksi.nis = user.nis AND transaksi.status_code = '200')", null, false);
        return $this->db->get()->result_array();
    }

	public function get_transaksi_by_nis($nis)
    {
        return $this->db->get_where('transaksi', ['nis' => $nis])->result_array();
    }

    public function get_monthly_transaction_counts() {
        $query = "SELECT MONTH(transaction_time) AS month, 
                         SUM(CASE WHEN status_code = '200' THEN 1 ELSE 0 END) AS success_count,
                         SUM(CASE WHEN status_code = '201' THEN 1 ELSE 0 END) AS pending_count,
                         SUM(CASE WHEN status_code <> '200' AND status_code <> '201' THEN 1 ELSE 0 END) AS failed_count
                  FROM transaksi 
                  GROUP BY MONTH(transaction_time)";
        $result = $this->db->query($query)->result_array();
        return $result;
    }

    public function get_payment_status_percentage() {
        $total_students = $this->db->count_all_results('user'); // Total jumlah siswa
    
        // Hitung jumlah siswa yang sudah bayar
        $paid_students = count($this->sudah_bayar());
    
        // Hitung jumlah siswa yang belum bayar
        $unpaid_students = count($this->belum_bayar());
    
        // Hitung persentase siswa yang sudah bayar dan belum bayar
        $percentage_paid = ($total_students > 0) ? ($paid_students / $total_students) * 100 : 0;
        $percentage_unpaid = 100 - $percentage_paid;
    
        return ['paid' => $percentage_paid, 'unpaid' => $percentage_unpaid];
    }
    
}
