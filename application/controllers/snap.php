<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, OPTIONS");

class Snap extends CI_Controller {

	 public function __construct()
	 {
		parent::__construct();
		$params = array('server_key' => 'SB-Mid-server-5M-WqNj38I6dFrECu1K_00x8', 'production' => false);
		$this->load->library('midtrans');
		$this->midtrans->config($params);
		$this->load->helper('url');
	 }

    public function index()
    {
    	$this->load->view('checkout_snap');
    }

    public function token() {
		$nama = $this->input->post('nama');
		$nis = $this->input->post('nis');
		$email = $this->input->post('email');
		$no_hp = $this->input->post('no_hp');
		$nama_biaya = $this->input->post('nama_biaya');
		$biaya = $this->input->post('biaya');
		$admin = $this->input->post('admin');
		$jumlah = $this->input->post('jumlah');
	
		// Required transaction details
		$transaction_details = array(
			'order_id' => time(),
			'gross_amount' => $jumlah, // no decimal allowed for creditcard
		);
	
		// Item details
		$item_details = array(
			array(
				'id' => 'a1',
				'price' => $biaya,
				'quantity' => 1,
				'name' => $nama_biaya
			),
			array(
				'id' => 'a2',
				'price' => $admin,
				'quantity' => 1,
				'name' => 'Admin Fee'
			)
		);
	
		// Customer details
		$customer_details = array(
			'first_name'    => $nama,
			'email'         => $email,
			'phone'         => $no_hp,
		);
	
		// Transaction data
		$transaction_data = array(
			'transaction_details' => $transaction_details,
			'item_details'        => $item_details,
			'customer_details'    => $customer_details
		);
	
		$snapToken = $this->midtrans->getSnapToken($transaction_data);
		echo $snapToken;
	}

	public function finish() {
		$data['user'] = $this->db->get_where('user', ['nis' => $this->session->userdata('nis')])->row_array();
		$result = json_decode($this->input->post('result_data'), true);
		$nama = $this->input->post('nama');
		$nis = $this->input->post('nis');
		$nama_biaya = $this->input->post('nama_biaya');
		$kode_biaya = $this->input->post('kode_biaya');
		$harga = $this->input->post('harga');
		$biaya_admin = $this->input->post('biaya_admin');
		$jumlah = $this->input->post('jumlah');
	
		$trans = [
			'order_id' => $result['order_id'],
			'nama' => $nama,
			'nis' => $nis,
			'gross_amount' => $jumlah,
			'payment_type' => $result['payment_type'],
			'transaction_time' => $result['transaction_time'],
			'bank' => isset($result['va_numbers'][0]['bank']) ? $result['va_numbers'][0]['bank'] : '',
			'va_number' => isset($result['va_numbers'][0]['va_number']) ? $result['va_numbers'][0]['va_number'] : '',
			'status_code' => $result['status_code'],
			'pdf_url' => isset($result['pdf_url']) ? $result['pdf_url'] : '',
			'nama_biaya' => $nama_biaya,
			'kode_biaya' => $kode_biaya,
		];
	
		$save = $this->db->insert('transaksi', $trans);
		if ($save) {
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Terimakasih, Telah Melakukan Pembayaran!!</div>');
			redirect('user');
		} else {
			echo 'gagal';
		}
	}	
}