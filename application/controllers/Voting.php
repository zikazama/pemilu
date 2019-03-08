<?php

class Voting extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('voting_model');
        $this->cek_login();
    }

    function index() {
        $this->load->view('voting');
    }

    public function cek_login() {
        if($this->session->userdata('status') != 'login') {
            redirect(base_url('login'));
        }
    }
}