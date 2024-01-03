<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Organisasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $data['judul']= "Halaman Beranda";
        $this->load->view("layout/header");
        $this->load->view("organisasi/vw_beranda", $data);
        $this->load->view("layout/footer");
    }
}