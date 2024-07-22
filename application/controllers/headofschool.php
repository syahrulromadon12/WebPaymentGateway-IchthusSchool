<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Headofschool extends CI_Controller {

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

   public function index(){
      $data['title'] = "Head of School Ichthus-School";
      $data['user'] = $this->db->get_where('user', ['nis' => $this->session->userdata('nis')]) -> row_array();
      $this->load->view('headofschool/dashboard', $data);
   }

   public function user(){
      $data['title'] = "Head of School Ichthus-School";
      //$data['user'] = $this->db->get_where('user', ['nis' => $this->session->userdata('nis')]) -> row_array();
      $data['user'] = $this->Model_user->siswa();
      $this->load->view('headofschool/siswa', $data);
   }

   public function riwayat_trans(){
      $data['title'] = "Head of School Ichthus-School";
      $data['user'] = $this->db->get_where('user', ['nis' => $this->session->userdata('nis')]) -> row_array();
      $this->load->view('headofschool/riwayat_trans', $data);
   }

   public function biaya(){
      $data['title'] = "Head of School Ichthus-School";
      $data['user'] = $this->db->get_where('user', ['nis' => $this->session->userdata('nis')]) -> row_array();
      $this->load->view('headofschool/biaya', $data);
   }
}