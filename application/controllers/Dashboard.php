<?php

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->cek_login();
    }

    public function index() {
        $this->load->view('dashboard');
    }

    public function cek_login() {
        if($this->session->userdata('status') != "admin"){
			redirect(base_url("admin"));
		}
    }

}