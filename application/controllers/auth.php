<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		
	}


	public function index()
	{
		$this->form_validation->set_rules('nis', 'Nis', 'required|trim',);
		$this->form_validation->set_rules('password', 'Password', 'required|trim');

		if ($this->form_validation->run() == false) {
			$data['title'] = 	'login page';
			$this->load->view('auth/login', $data);
		} else {
			//success validation
			$this->_login();

			
		}
	}

	private function _login()
	{
		//get data login
		$nis = $this->input->post('nis');
		$password = $this->input->post('password');
		$user = $this->db->get_where('user', ['nis' => $nis],)->row_array();

		if ($user) {
			//jila user active
			if ($user['is_active'] == 1) {
				if (password_verify($password, $user['password'])) {
					$data = [
						'nis' => $user['nis'],
						'role_id' => $user['role_id']
					];
					if ($data['role_id'] == 1) {
						$this->session->set_userdata($data);
						redirect('admin');
						$this->session->set_flashdata('message', '<div class"alert" role="alert">Hi, enjoy our content</div>');
					}elseif($data['role_id'] == 2){
						$this->session->set_userdata($data);
						redirect('user');
						$this->session->set_flashdata('message', '<div class"alert" role="alert">Hi, enjoy our content ></div>');
					}else {
						$this->session->set_userdata($data);
						redirect('headofschool');
						$this->session->set_flashdata('message', '<div class"alert" role="alert">Hi, enjoy our content ></div>');
					}
				} else {
					$this->session->set_flashdata('message', '<div class"alert text-danger" role="alert">Password yang anda masukan salah!</div>');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('message', '<div class"alert text danger" role="alert">Nis kamu tidak aktif!</div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class"alert" role="alert text-danger">Nis kamu tidak terdaftar!</div>');
			redirect('auth');
		}

	}

	private function _sendEmail($token, $type) {
		$this->load->library('email');
	
		$config = array(
			'protocol' => 'smtp',
			'smtp_host' => 'smtp.gmail.com',  // Ganti dengan host SMTP Anda
			'smtp_user' => 'syahrulromadon667@gmail.com',  // Ganti dengan email Anda
			'smtp_pass' => 'sr12210397',  // Ganti dengan password email Anda
			'smtp_port' => 587,
			'mailtype' => 'html',
			'charset' => 'utf-8',
			'newline' => "\r\n"
		);
	
		$this->email->initialize($config);
		$this->email->from('syahrulromadon667@gmail.com', 'ICHTHUS SCHOOL');  // Ganti dengan nama Anda
		$this->email->to($this->input->post('email'));
	
		if ($type == 'forgot') {
			$this->email->subject('Reset Password');
			$this->email->message('Klik tautan ini untuk mereset password Anda : <a href="' . base_url() . 'auth/resetPassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>');
		}
	
		if ($this->email->send()) {
			return true;
		} else {
			echo $this->email->print_debugger();
			die;
		}
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
	

	public function add_user()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('nis', 'Nis', 'required|trim|is_unique[user.nis]', [
			'is_unique' => 'NIS Telah Terdaftar!'
		]);
		$this->form_validation->set_rules('email', 'Email', 'valid_email|required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');
		$this->form_validation->set_rules('jns_kelamin', 'Jns_kelamin', 'required|trim');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
		$this->form_validation->set_rules('tmpt_lahir', 'Tmpt_lahir', 'required|trim');
		$this->form_validation->set_rules('kelas', 'Kelas', 'required|trim');
		$this->form_validation->set_rules('no_hp', 'No_hp', 'required|trim');
		
		if ($this->form_validation->run() == false) {
			$data['title'] = 'admin tambah user';
			$data['user'] = $this->db->get_where('user', ['nis' => $this->session->userdata('nis')])->row_array();
			$this->load->view('admin/add_siswa', $data);
		} else {
			$upload_image = $_FILES['foto']['name'];

			if ($upload_image) {
				$config['allowed_types'] = 'jpg|jpeg|png';
				$config['max_size']     = '2048';
				$config['upload_path'] = './asset/profile/';

				// Nama dasar file
				$base_filename = $this->input->post('nis') . '_' . $this->input->post('nama') . '_' . time();
				$extension = '.' . pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);

				// Dapatkan nama file unik dengan versi
				$unique_filename = $this->get_unique_filename($config['upload_path'], $base_filename, $extension);

				// Set nama file unik dalam konfigurasi upload
				$config['file_name'] = pathinfo($unique_filename, PATHINFO_FILENAME);

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('foto')) {
					$new_image = $this->upload->data('file_name');
				} else {
					echo $this->upload->display_errors();
				}
			} else {
				$new_image = 'default.jpg';
			}

			$data = [
				'nama' => $this->input->post('nama'),
				'nis' => $this->input->post('nis'),
				'email' => $this->input->post('email'),
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				'jns_kelamin' => $this->input->post('jns_kelamin'),
				'alamat' => $this->input->post('alamat'),
				'tmpt_lahir' => $this->input->post('tmpt_lahir'),
				'tgl_lahir' => $this->input->post('tgl_lahir'),
				'kelas' => $this->input->post('kelas'),
				'no_hp' => $this->input->post('no_hp'),
				'role_id' => '2',
				'is_active' => '1',
				'foto' => $new_image
			];

			$this->db->insert('user', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Akun telah dibuat</div>');
			redirect('admin/siswa');
		}
	}


	public function ubah_password(){
		$this->form_validation->set_rules('password_lama','Password_lama','required|trim');
		$this->form_validation->set_rules('password_baru','Password_baru','required|trim');
		if ($this->form_validation->run() == false) {
			$data['title'] = 'profile';
			$data['user'] = $this->db->get_where('user', ['nis' => $this->session->userdata('nis')]) -> row_array();
			$this->load->view('user/profile', $data);
		}else{
			$password_lama = $this->input->post('password_lama');
			$password_baru = $this->input->post('password_baru');
			if (password_verify($password_lama,$user['password'])){
				$this->session->set_flashdata('message', '<div class"alert alert-danger" role="alert">Password yang anda masukan salah!!</div>');
				redirect('user/profile');
			}else{
				if ($password_lama == $password_baru){
					$this->session->set_flashdata('message', '<div class"alert alert-danger" role="alert">Password tidak boleh sama</div>');
					redirect('user/profile');
				}else{
					$password_hash = password_hash($password_baru, PASSWORD_DEFAULT);
					$this->db->set('password', $password_hash);
					$this->db->where('nis',$this->session->userdata('nis'));
					$this->db->update('user');

					$this->session->set_flashdata('message', '<div class"alert alert-success" role="alert">Password berhasil diubah</div>');
					redirect('user/profile');
				}
			}
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('nis');
		$this->session->unset_userdata('role_id');
		$this->session->set_flashdata('message', '<div class"alert alert-success" role="alert">You have been logged out!</div>');
		redirect('auth');
	}

	public function forgotPassword(){
		$this->form_validation->set_rules('email','Email','required|trim|valid_email');
		if ($this->form_validation->run() == false) {
			$data['title'] = 'Forgot Password';
			$this->load->view('users/header');		
			$this->load->view('auth/forgot_password');
		}else{
			$email = $this->input->post('email');
			$user = $this->db->get_where('user',['email' => $email, 'is_active' => 1])->row_array(); 

			if($user){
				$token = base64_encode(random_bytes(32));
				$user_token = [
					'email' => $email,
					'token' => $token,
					'date_created' => time()
  				];

				  $this->db->insert('user_token', $user_token);
				  $this->_sendEmail($token, 'forgot');

				  $this->session->set_flashdata('message', '<div class"alert alert-danger" role="alert">Cek email kamu untuk melakukan reset password</div>');
				  redirect('auth/forgotPassword');

			}else{
				$this->session->set_flashdata('message', '<div class"alert alert-danger" role="alert">Email tidak terdaftar!</div>');
				redirect('auth/forgotPassword');
			}
		}
	}

	public function resetPassword() {
		$email = $this->input->get('email');
		$token = $this->input->get('token');
	
		$user = $this->db->get_where('user', ['email' => $email])->row_array();
	
		if ($user) {
			$user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
	
			if ($user_token) {
				$this->session->set_userdata('reset_email', $email);
				$this->changePassword();
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset password gagal! Token tidak valid.</div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset password gagal! Email tidak valid.</div>');
			redirect('auth');
		}
	}
	
	public function changePassword() {
		if (!$this->session->userdata('reset_email')) {
			redirect('auth');
		}
	
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]');
		$this->form_validation->set_rules('password2', 'Repeat Password', 'required|trim|matches[password1]');
	
		if ($this->form_validation->run() == false) {
			$data['title'] = 'Change Password';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/change_password');
			$this->load->view('templates/auth_footer');
		} else {
			$password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
			$email = $this->session->userdata('reset_email');
	
			$this->db->set('password', $password);
			$this->db->where('email', $email);
			$this->db->update('user');
	
			$this->session->unset_userdata('reset_email');
	
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password telah diubah! Silakan login.</div>');
			redirect('auth');
		}
	}	
}
