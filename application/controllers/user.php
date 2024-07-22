<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
 
		// Check if user is logged in and has role_id = 1
		if (!$this->session->userdata('nis') || $this->session->userdata('role_id') != 2) {
			redirect('auth'); // Change 'auth' to your login controller/method
		}
	}

    public function index(){
		$data['user'] = $this->db->get_where('user', ['nis' => $this->session->userdata('nis')]) -> row_array();
		$this->load->view('users/header');
		$this->load->view('users/navbar', $data);
		$this->load->view('users/homepage');
		$this->load->view('users/cara_bayar');
		$this->load->view('users/footer');
    }
	
	public function info_pembayaran(){
		$data['jadwal_bayar'] = $this->Model_jadwal_bayar->jadwal_bayar();
		$data['user'] = $this->db->get_where('user', ['nis' => $this->session->userdata('nis')]) -> row_array();
		$this->load->view('users/header');
		$this->load->view('users/navbar', $data);
		$this->load->view('users/info_pembayaran', $data);
		$this->load->view('users/footer');
	}
	
	public function bayar_tern(){
		$nis = $this->session->userdata('nis');
		$data['user'] = $this->db->get_where('user', ['nis' => $nis])->row_array();
		$this->load->view('users/header');
		$this->load->view('users/navbar', $data);
		
		// Cek apakah nis sudah ada di tabel transaksi
		$this->db->where('nis', $nis);
		$check_transaksi = $this->db->get('transaksi')->row_array();
		
		if ($check_transaksi) {
			// Cek apakah kode_biaya == kode_biaya di tabel biaya
			$this->db->where('kode_biaya', $check_transaksi['kode_biaya']);
			$check_biaya = $this->db->get('biaya')->row_array();
			
			if ($check_biaya) {
				$data['lunas'] = true;
				$this->load->view('users/lunas', $data);
			} else {
				// Jika tidak ada transaksi yang valid, tampilkan opsi pembayaran jika dalam rentang tanggal
				$data['biaya'] = $this->Model_biaya->bayar_tern();
				$current_date = date('Y-m-d');
				$available = false;
				
				foreach ($data['biaya'] as $biaya) {
					if ($current_date >= $biaya['awal_bayar'] && $current_date <= $biaya['akhir_bayar']) {
						$available = true;
						break;
					}
				}
				
				if ($available) {
					$this->load->view('users/bayar', $data);
				} else {
					$this->load->view('users/tidak_ada_bayar', $data);
				}
			}
		} else {
			// Jika belum ada transaksi, ambil data biaya untuk ditampilkan
			$data['biaya'] = $this->Model_biaya->bayar_tern();
			$current_date = date('Y-m-d');
			$available = false;
			
			foreach ($data['biaya'] as $biaya) {
				if ($current_date >= $biaya['awal_bayar'] && $current_date <= $biaya['akhir_bayar']) {
					$available = true;
					break;
				}
			}
			
			if ($available) {
				$this->load->view('users/bayar', $data);
			} else {
				$this->load->view('users/tidak_ada_bayar', $data);
			}
		}
		
		$this->load->view('users/footer');
	}	
	
	public function bayar_kegiatan() {
		$nis = $this->session->userdata('nis');
		$data['user'] = $this->db->get_where('user', ['nis' => $nis])->row_array();
		$this->load->view('users/header');
		$this->load->view('users/navbar', $data);
	
		// Debugging output
		$this->db->where(['nis' => $nis, 'kode_biaya' => 'KEGIATAN']);
		$check_transaksi = $this->db->get('transaksi')->row_array();
	
		if ($check_transaksi) {
			$data['lunas'] = true;
			$this->load->view('users/lunas', $data);
		} else {
			// If no transaction, get biaya data
			$data['biaya'] = $this->Model_biaya->bayar_kegiatan();
			$current_date = date('Y-m-d');
			$available = false;
	
			foreach ($data['biaya'] as $biaya) {
				if ($current_date >= $biaya['awal_bayar'] && $current_date <= $biaya['akhir_bayar']) {
					$available = true;
					break;
				}
			}
	
			if ($available) {
				$this->load->view('users/bayar', $data);
			} else {
				$this->load->view('users/tidak_ada_bayar', $data);
			}
		}
	
		$this->load->view('users/footer');
	}
	
	public function bayar_wisuda() {
		$nis = $this->session->userdata('nis');
		$data['user'] = $this->db->get_where('user', ['nis' => $nis])->row_array();
		$this->load->view('users/header');
		$this->load->view('users/navbar', $data);
	
		// Cek apakah nis sudah ada di tabel transaksi untuk kode_biaya 'wisuda'
		$this->db->where('nis', $nis);
		$this->db->where('kode_biaya', 'Wisuda');
		$check_transaksi = $this->db->get('transaksi')->row_array();
	
		if ($check_transaksi) {
			// Jika transaksi valid ditemukan, tampilkan view "lunas"
			$data['lunas'] = true;
			$this->load->view('users/lunas', $data);
		} else {
			// Jika belum ada transaksi, ambil data biaya untuk ditampilkan
			$data['biaya'] = $this->Model_biaya->bayar_wisuda();
			$current_date = date('Y-m-d');
			$available = false;
	
			foreach ($data['biaya'] as $biaya) {
				if ($current_date >= $biaya['awal_bayar'] && $current_date <= $biaya['akhir_bayar']) {
					$available = true;
					break;
				}
			}
	
			if ($available) {
				$this->load->view('users/bayar', $data);
			} else {
				$this->load->view('users/tidak_ada_bayar', $data);
			}
		}
	
		$this->load->view('users/footer');
	}	
	
	public function riwayat_transaksi(){
		$nis = $this->session->userdata('nis');
		$data['user'] = $this->db->get_where('user', ['nis' => $nis])->row_array();
		$data['transaksi'] = $this->Model_transaksi->get_transaksi_by_nis($nis);
		$this->load->view('users/header');
		$this->load->view('users/navbar', $data);
		$this->load->view('users/riwayat_transaksi', $data);
		$this->load->view('users/footer');
	}	
	
	public function profile(){
		$data['user'] = $this->db->get_where('user', ['nis' => $this->session->userdata('nis')]) -> row_array();
		$this->load->view('users/header');
		$this->load->view('users/navbar', $data);
		$this->load->view('users/profile', $data);
		$this->load->view('users/footer');
	}
}