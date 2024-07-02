<?php

class People extends CI_Controller {

    public function index()
    {
        $data['judul'] = 'List of People';

        $this->load->model('People_model', 'people');

        //load library
        $this->load->library('pagination');

        //ambil data keyword
        if($this->input->post('submit')) {
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_userdata('keyword', $data['keyword']);
        } else {
            $data['keyword'] = $this->session->userdata('keyword');
        } 
        

        //config
        $this->db->like('name', $data['keyword']);
        $this->db->or_like('email', $data['keyword']);
        $this->db->from('people');
        $config['total_rows'] = $this->db->count_all_results();
        $data['total_row'] = $config['total_rows'];
        $config['per_page'] = 8;


        //initialize
        $this->pagination->initialize($config);

        

        $data['start'] = $this->uri->segment(3);
        $data['people'] = $this->people->getPeople($config['per_page'], $data['start'], $data['keyword']);
        
        
        $this->load->view('template/header', $data);
        $this->load->view('people/index', $data);
        $this->load->view('template/footer');
    }
    
}