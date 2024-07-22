<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
   public function __construct()
    {
        parent::__construct();

        // Check if user is logged in and has role_id = 1
        if (!$this->session->userdata('nis') || $this->session->userdata('role_id') != 1) {
            redirect('auth'); // Change 'auth' to your login controller/method
        }
    }

    public function index() {
      $data['title'] = "Admin Ichthus-School";
      $data['user'] = $this->db->get_where('user', ['nis' => $this->session->userdata('nis')])->row_array();
      $data['jml_siswa'] = $this->Model_user->jml_siswa();
      $data['saldo'] = $this->Model_transaksi->saldo_biaya();
      $data['pending_payment'] = $this->Model_transaksi->pending_payment();
      $data['success_payment'] = $this->Model_transaksi->success_payment();

      // Fetch data for transaction chart
      $monthly_transaction_data = $this->Model_transaksi->get_monthly_transaction_counts();
      $transaction_success = array_fill(0, 12, 0);
      $transaction_pending = array_fill(0, 12, 0);
      $transaction_failed = array_fill(0, 12, 0);

      foreach ($monthly_transaction_data as $row) {
         $month = $row['month'] - 1; // Adjust month index (January is 0)
         $transaction_success[$month] = $row['success_count']; // Ensure 'success_count' matches the alias in the query
         $transaction_pending[$month] = $row['pending_count']; // Ensure 'pending_count' matches the alias in the query
         $transaction_failed[$month] = $row['failed_count']; // Ensure 'failed_count' matches the alias in the query
      }

      $data['transaction_success'] = $transaction_success;
      $data['transaction_pending'] = $transaction_pending;
      $data['transaction_failed'] = $transaction_failed;

      // Fetch data for payment status chart
    $payment_status_percentages = $this->Model_transaksi->get_payment_status_percentage();
    $data['percentage_paid'] = $payment_status_percentages['paid'];
    $data['percentage_unpaid'] = $payment_status_percentages['unpaid'];

    $this->load->view('admin/dashboard', $data);
   } 
   
   public function siswa() {
      $data['title'] = "Admin Ichthus-School";
      $data['user'] = $this->db->get_where('user', ['nis' => $this->session->userdata('nis')])->row_array();
  
      // Load library pagination
      $this->load->library('pagination');
  
      // Konfigurasi pagination
      $config['base_url'] = base_url('admin/siswa'); // URL base halaman
      $kelas = $this->input->get('kelas'); // Dapatkan filter kelas dari URL
  
      // Log untuk debugging
      log_message('debug', 'Kelas yang dipilih: ' . $kelas);
  
      if ($kelas && $kelas != 'all') {
          $config['total_rows'] = $this->Model_user->countSiswaByKelas($kelas); // Jumlah total data berdasarkan kelas
          log_message('debug', 'Total siswa di kelas ' . $kelas . ': ' . $config['total_rows']);
      } else {
          $config['total_rows'] = $this->Model_user->countSiswa(); // Jumlah total data
          log_message('debug', 'Total semua siswa: ' . $config['total_rows']);
      }
  
      $config['per_page'] = 10; // Jumlah data per halaman
  
      // Styling pagination
      $config['full_tag_open'] = '<nav aria-label="Page navigation example"><ul class="pagination justify-content-end">';
      $config['full_tag_close'] = '</ul></nav>';
      $config['first_tag_open'] = '<li class="page-item">';
      $config['first_tag_close'] = '</li>';
      $config['last_tag_open'] = '<li class="page-item">';
      $config['last_tag_close'] = '</li>';
      $config['next_tag_open'] = '<li class="page-item">';
      $config['next_tag_close'] = '</li>';
      $config['prev_tag_open'] = '<li class="page-item">';
      $config['prev_tag_close'] = '</li>';
      $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
      $config['cur_tag_close'] = '</a></li>';
      $config['num_tag_open'] = '<li class="page-item">';
      $config['num_tag_close'] = '</li>';
      $config['attributes'] = array('class' => 'page-link');
  
      // Initialize pagination
      $this->pagination->initialize($config);
  
      // Ambil data siswa berdasarkan halaman dan filter kelas
      if ($kelas && $kelas != 'all') {
          $data['siswa'] = $this->Model_user->getSiswaByKelas($config['per_page'], $this->uri->segment(3), $kelas);
      } else {
          $data['siswa'] = $this->Model_user->getSiswa($config['per_page'], $this->uri->segment(3));
      }
  
      // Load view dengan data pagination
      $this->load->view('admin/siswa', $data);
  }
  
   private function get_unique_filename($path, $filename, $extension) {
      $new_filename = $filename;
      $counter = 1;

      while (file_exists($path . $new_filename . $extension)) {
         $new_filename = $filename . '_edit(' . $counter . ')';
         $counter++;
      }

      return $new_filename . $extension;
   }

   
   public function edit_siswa($id){
      $data['user'] = $this->db->get_where('user', ['nis' => $this->session->userdata('nis')]) -> row_array();
      $data['title'] = "Admin Ichthus-School";
      $data['siswa'] = $this->Model_user->user_getbyid($id);
      $this->load->view('admin/edit_siswa', $data);
   }  
   
   public function update_siswa() {
      // Konfigurasi upload file
      $config['upload_path'] = './asset/profile/';
      $config['allowed_types'] = 'gif|jpg|png|jpeg';
      $config['max_size'] = 2048;
  
      // Nama dasar file
      $base_filename = $this->input->post('nis') . '_' . $this->input->post('nama') . '_' . time();
      $extension = '.' . pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
  
      // Dapatkan nama file unik dengan versi
      $unique_filename = $this->get_unique_filename($config['upload_path'], $base_filename, $extension);
  
      // Set nama file unik dalam konfigurasi upload
      $config['file_name'] = pathinfo($unique_filename, PATHINFO_FILENAME);
  
      $this->load->library('upload', $config);
  
      // Data siswa yang akan diperbarui
      $data = [
          'nama' => $this->input->post('nama'),
          'nis' => $this->input->post('nis'),
          'email' => $this->input->post('email'),
          'password' => $this->input->post('password'),
          'jns_kelamin' => $this->input->post('jns_kelamin'),
          'alamat' => $this->input->post('alamat'),
          'tmpt_lahir' => $this->input->post('tmpt_lahir'),
          'tgl_lahir' => $this->input->post('tgl_lahir'),
          'kelas' => $this->input->post('kelas'),
          'no_hp' => $this->input->post('no_hp'),
      ];
  
      // Cek apakah ada file yang diunggah
      if ($_FILES['foto']['name']) {
          if ($this->upload->do_upload('foto')) {
              // Mengambil informasi file yang diunggah
              $upload_data = $this->upload->data();
              $new_image = $upload_data['file_name'];
              $data['foto'] = $new_image;
          } else {
              // Jika upload gagal, tampilkan error
              $error = $this->upload->display_errors();
              $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $error . '</div>');
              redirect('admin/siswa');
              return;
          }
      }
  
      // Perbarui data di database
      $this->db->where('id', $this->input->post('id'));
      $this->db->update('user', $data);
  
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">User berhasil diubah</div>');
      redirect('admin/siswa');
   }
      
   
   public function delete_siswa($id){
      $this->db->where('id', $id);
		$this->db->delete('user');
		$this->session->set_flashdata('message', '<div class"alert alert-success" role="alert">user berhasil dihapus</div>');
		redirect('admin/siswa');
	}

   public function pdf_siswa(){
      $this->load->library('dompdf_gen');
    
      $data['siswa'] = $this->Model_user->siswa();
         
      $this->load->view('laporan/laporan_siswa_pdf', $data);
   }

   public function excel_siswa(){
      $data['title'] = 'Laporan Siswa';
      $data['siswa'] = $this->Model_user->siswa();
      $this->load->view('laporan/laporan_siswa_excel', $data);
   }
   
   public function biaya(){
      $data['title'] = "Admin Ichthus-School";
      $data['user'] = $this->db->get_where('user', ['nis' => $this->session->userdata('nis')]) -> row_array();
      $data['biaya'] = $this->Model_biaya->biaya();
      $this->load->view('admin/biaya', $data);
   }

   public function add_biaya(){
      $data['title'] = "Admin Ichthus-School";
      $data['user'] = $this->db->get_where('user', ['nis' => $this->session->userdata('nis')]) -> row_array();
      $this->form_validation->set_rules('nama_biaya', 'Nama_biaya', 'required|trim');
      $this->form_validation->set_rules('harga', 'Harga', 'required|trim');
      $this->form_validation->set_rules('tgl_bayar', 'Tgl_bayar', 'required|trim');
      $this->form_validation->set_rules('kode_biaya', 'Kode_biaya', 'required|trim');
      $this->form_validation->set_rules('biaya_admin', 'biaya_admin', 'required|trim');
      $this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim');

      if ($this->form_validation->run() == false){
         $this->load->view('admin/add_biaya', $data);
      }else{
         $data = [
            'nama_biaya' => $this->input->post('nama_biaya'),
            'tgl_bayar' => $this->input->post('tgl_bayar'),
            'harga' => $this->input->post('harga'),
            'kode_biaya' => $this->input->post('kode_biaya'),
            'biaya_admin' => $this->input->post('biaya_admin'),
            'keterangan' => $this->input->post('keterangan'),
         ];
         $this->db->insert('biaya', $data);
			$this->session->set_flashdata('message', '<div class"alert alert-success" role="alert">biaya telah ditambahkan</div>');
			redirect('admin/biaya');
      }
   }
   
   public function edit_biaya($id){
      $data['user'] = $this->db->get_where('user', ['nis' => $this->session->userdata('nis')])->row_array();
      $data['title'] = "Admin Ichthus-School";
      $data['biaya'] = $this->Model_biaya->biaya_getbyid($id);
      $this->load->view('admin/edit_biaya', $data);
   }
   
   public function update_biaya(){
      $this->form_validation->set_rules('nama_biaya', 'Nama_biaya', 'required|trim');
      $this->form_validation->set_rules('harga', 'Harga', 'required|trim');
      $this->form_validation->set_rules('awal_bayar', 'Awal_bayar', 'required|trim');
      $this->form_validation->set_rules('akhir_bayar', 'Akhir_bayar', 'required|trim');
      $this->form_validation->set_rules('kode_biaya', 'Kode_biaya', 'required|trim');
      $this->form_validation->set_rules('biaya_admin', 'biaya_admin', 'required|trim');
      $this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim');
      
      if ($this->form_validation->run() == false){
         $this->edit_biaya($this->input->post('id'));
      } else {
         $this->Model_biaya->update_biaya();
         $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Biaya berhasil diubah</div>');
         redirect('admin/biaya');
      }
   }   

   public function delet_biaya($id){
      $this->db->where('id', $id);
		$this->db->delete('biaya');
		$this->session->set_flashdata('message', '<div class"alert alert-success" role="alert">Biaya berhasil dihapus</div>');
		redirect('admin/biaya');
	}

   public function riwayat_trans(){
      $this->load->library('pagination');
  
      $config['base_url'] = base_url('admin/riwayat_trans');
      $config['total_rows'] = $this->Model_transaksi->count_trans(); // Menghitung jumlah baris data transaksi
      $config['per_page'] = 10; // Jumlah data per halaman
      $config['uri_segment'] = 3; // Segment URI untuk halaman
      $config['num_links'] = 2; // Jumlah link halaman sebelum dan sesudah halaman saat ini
  
      // Konfigurasi styling untuk pagination
      $config['full_tag_open'] = '<ul class="pagination justify-content-center">';
      $config['full_tag_close'] = '</ul>';
      $config['first_link'] = 'First';
      $config['first_tag_open'] = '<li class="page-item">';
      $config['first_tag_close'] = '</li>';
      $config['last_link'] = 'Last';
      $config['last_tag_open'] = '<li class="page-item">';
      $config['last_tag_close'] = '</li>';
      $config['next_link'] = '&raquo;';
      $config['next_tag_open'] = '<li class="page-item">';
      $config['next_tag_close'] = '</li>';
      $config['prev_link'] = '&laquo;';
      $config['prev_tag_open'] = '<li class="page-item">';
      $config['prev_tag_close'] = '</li>';
      $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
      $config['cur_tag_close'] = '</a></li>';
      $config['num_tag_open'] = '<li class="page-item">';
      $config['num_tag_close'] = '</li>';
  
      $this->pagination->initialize($config);
  
      $data['title'] = "Admin Ichthus-School";
      $data['user'] = $this->db->get_where('user', ['nis' => $this->session->userdata('nis')])->row_array();
      $data['siswa'] = $this->Model_user->siswa();
  
      // Ambil data transaksi dengan limit dan offset
      $offset = $this->uri->segment(3) ? $this->uri->segment(3) : 0;
      $data['transaksi'] = $this->Model_transaksi->get_transaksi($config['per_page'], $offset);
  
      $this->load->view('admin/riwayat_trans', $data);
  }  

   public function pdf_transaksi(){
      $data['title'] = 'Laporan Transaksi Biaya Sekolah';
      $data['transaksi'] = $this->Model_transaksi->all_trans();
      $this->load->view('laporan/laporan_transaksi_pdf', $data);
   }

   public function excel_transaksi(){
      $data['title'] = 'Laporan Transaksi Biaya Sekolah';
      $data['transaksi'] = $this->Model_transaksi->all_trans();
      $this->load->view('laporan/laporan_transaksi_excel', $data);
   }

   public function jadwal_bayar(){
      $data['title'] = "Admin Jadwal Bayar";
      $data['user'] = $this->db->get_where('user', ['nis' => $this->session->userdata('nis')]) -> row_array();
      $data['jadwal_bayar'] = $this->Model_jadwal_bayar->jadwal_bayar();
      $this->load->view('admin/jadwal_bayar',$data);
   }
   
   public function add_jadwal_bayar(){
      $data['title'] = "Admin Ichthus-School";
      $data['user'] = $this->db->get_where('user', ['nis' => $this->session->userdata('nis')]) -> row_array();
      $this->form_validation->set_rules('nama_biaya', 'Nama_biaya', 'required|trim');
      $this->form_validation->set_rules('harga', 'Harga', 'required|trim');
      $this->form_validation->set_rules('tgl_bayar', 'Tgl_bayar', 'required|trim');
      $this->form_validation->set_rules('kode_biaya', 'Kode_biaya', 'required|trim');
      $this->form_validation->set_rules('biaya_admin', 'biaya_admin', 'required|trim');
      $this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim');

      if ($this->form_validation->run() == false){
         $this->load->view('admin/add_jadwal_bayar', $data);
      }else{
         $data = [
            'nama_biaya' => $this->input->post('nama_biaya'),
            'harga' => $this->input->post('harga'),
            'tgl_bayar' => $this->input->post('tgl_bayar'),
            'kode_biaya' => $this->input->post('kode_biaya'),
            'biaya_admin' => $this->input->post('biaya_admin'),
            'keterangan' => $this->input->post('keterangan'),
         ];
         $this->db->insert('jadwal_bayar', $data);
			$this->session->set_flashdata('message', '<div class"alert alert-success" role="alert">jadwal bayar telah ditambahkan</div>');
			redirect('admin/jadwal_bayar');
      }
   }

   public function edit_jadwal_bayar($id){
      $data['user'] = $this->db->get_where('user', ['nis' => $this->session->userdata('nis')]) -> row_array();
      $data['title'] = "Admin Ichthus-School";
      $data['biaya'] = $this->Model_jadwal_bayar->jadwal_getbyid($id);
      $this->load->view('admin/edit_jadwal_bayar', $data);
   }

   public function update_jadwal_bayar(){
      $this->Model_jadwal_bayar->update_jadwal_bayar();
      redirect('admin/jadwal_bayar');
      $this->session->set_flashdata('message', '<div class"alert alert-success" role="alert">Jadwal Bayar berhasil diubah</div>');
   }
   
   public function delet_jadwal_bayar($id){
      $this->db->where('id', $id);
		$this->db->delete('jadwal_bayar');
		$this->session->set_flashdata('message', '<div class"alert alert-success" role="alert">Jadwal Bayar berhasil dihapus</div>');
		redirect('admin/biaya');
   }

   public function pdf_jadwal_bayar(){
      $data['title'] = 'Laporan Jadwal Biaya Sekolah';
      $data['jadwal_bayar'] = $this->Model_jadwal_bayar->jadwal_bayar();
      $this->load->view('laporan/laporan_jadwal_bayar_pdf', $data);
   }

   public function excel_jadwal_bayar(){
      $data['title'] = 'Laporan  Jadwal Biaya Sekolah';
      $data['jadwal_bayar'] = $this->Model_jadwal_bayar->jadwal_bayar();
      $this->load->view('laporan/laporan_jadwal_bayar_excel', $data);
   }

   public function sudah_bayar()
   {
      $data['user'] = $this->db->get_where('user', ['nis' => $this->session->userdata('nis')])->row_array();
      $data['title'] = "Admin Ichthus-School";
      $data['siswa'] = $this->Model_user->siswa();
      $data['transaksi'] = $this->Model_transaksi->sudah_bayar();
      $this->load->view('admin/sudah_bayar', $data);
   }

   public function belum_bayar()
   {
      $data['title'] = "Admin Ichthus-School";
      $data['user'] = $this->db->get_where('user', ['nis' => $this->session->userdata('nis')])->row_array();
      $data['siswa'] = $this->Model_user->siswa();
      $data['transaksi'] = $this->Model_transaksi->belum_bayar();
      $this->load->view('admin/belum_bayar', $data);
   }

   public function cetak_surat_teguran($id)
    {
        $data['siswa'] = $this->Model_user->user_getbyid($id);
        $this->load->view('laporan/surat_teguran', $data);
    }
}