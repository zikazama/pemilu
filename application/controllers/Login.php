<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Login extends CI_Controller{
 
	function __construct(){
		parent::__construct();		
		$this->load->model('login_model');
		$this->cek_status();
	}
 
	function index(){
		$this->load->view('login');
	}
 
	function aksi_login(){
		$nim = $this->input->post('nim');
		$password = $this->input->post('password');
		$where = array(
			'nim' => $nim,
			'password' => $password
			);
		$cek = $this->login_model->cek_login("user",$where)->num_rows();
		if($cek > 0){
 
			$data_session = array(
				'nim' => $nim,
				'status' => "login"
				);
 
			$this->session->set_userdata($data_session);
 
			redirect(base_url("home"));
 
		}else{
			echo "Username dan password salah !";
			$this->load->view('login');
		}
	}
 
	public function logout(){
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}

	public function cek_status() {
		if($this->session->userdata('status') == 'login') {
			$this->logout();
		}
	}
}