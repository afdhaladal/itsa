<?php
defined('BASEPATH') or exit('No direct script access allowed');

class  Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $data['user']= $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view("layout/header", $data);
        $this->load->view("dashboard/vw_dashboard", $data);
        $this->load->view("layout/footer", $data);
    }
   
}
