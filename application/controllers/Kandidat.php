<?php

class Kandidat extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('kandidat_model');   
    }

    function index() {
        $this->load->view('kandidat');
    }

    function tambah() {
        $data = array( 
            'nim' => $this->input->post('nim'),
            'nama_depan' => $this->input->post('nama_depan'),
            'jabatan' => $this->input->post('jabatan'),
            'no_kandidat' => $this->input->post('no_kandidat')
        );
        $this->kandidat_model->tambah($data);
        redirect('kandidat');
    }

}