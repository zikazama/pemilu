<?php

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        $this->cek_login();
    }

    public function index() {
        $jumlah_data = $this->user_model->jumlah_data();
        $this->load->library('pagination');
		$config['base_url'] = base_url().'user/index/';
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 40;
		$from = $this->uri->segment(3);
		$this->pagination->initialize($config);		
		$data['user'] = $this->user_model->data($config['per_page'],$from);
        $this->load->view('user',$data);
    }

    public function tambah() {
        $this->load->helper('string');
        for ($i=$this->input->post('nimawal'); $i <= $this->input->post('nimakhir') ; $i++) {
            $pass = random_string('alnum',6);
            $data = array( 
                'nim' => $i,
                'prodi' => $this->input->post('prodi'),
                'tingkat' => $this->input->post('tingkat'),
                'password' => $pass
            );
            $this->user_model->tambah($data);
        }
        redirect('user');
    }

    public function edit() {
        $nim = $this->uri->segment(3);
        $data['data'] = $this->user_model->per_id($nim);
        $this->load->view('edit_user',$data);
    }

    public function update() {
        $nim = $this->input->post('nim');
        $data = array( 
            'prodi' => $this->input->post('prodi'),
            'tingkat' => $this->input->post('tingkat'),
            'password' => $this->input->post('password')
        );
        $this->user_model->update($nim,$data);
        redirect('user');
    }

    public function reset() {
        $this->user_model->reset();
        redirect('user');
    }

    public function cek_login() {
        if($this->session->userdata('status') != "admin"){
			redirect(base_url("admin"));
		}
    }

}