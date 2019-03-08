<?php 

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('admin_model');
        $this->cek_status();
    }

    function index(){
		$this->load->view('admin');
	}
 
	function aksi_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $username,
			'password' => $password
			);
		$cek = $this->admin_model->cek_login("admin",$where)->num_rows();
		if($cek > 0){
 
			$data_session = array(
				'username' => $username,
				'status' => "admin"
				);
 
			$this->session->set_userdata($data_session);
 
			redirect(base_url("dashboard"));
 
		}else{
			echo "Username dan password salah !";
			$this->load->view('admin');
		}
	}
 
	public function logout(){
		$this->session->sess_destroy();
		redirect(base_url('admin'));
	}

	public function cek_status() {
		if($this->session->userdata('status') == 'admin') {
			$this->logout();
		}
	}
}