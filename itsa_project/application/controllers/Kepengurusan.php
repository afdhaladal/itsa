<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kepengurusan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $data['judul'] = "Halaman Kepengurusan";
        $this->load->view("layout/header");
        $this->load->view("kepengurusan/vw_kepengurusan", $data);
        $this->load->view("layout/footer");
    }
    // public function kepengurusan_detail()
    // {
    //     $data['judul'] = "Halaman Kepengurusan";
    //     $this->load->view("layout/header");
    //     $this->load->view("kepengurusan/vw_kepengurusan_detail", $data);
    //     $this->load->view("layout/footer");
    // }
    public function kepengurusan_detail($jenis)
    {
        $data['judul'] = "Halaman Kepengurusan";

        switch ($jenis) {
            case 'presidium':
                $view = 'vw_detail_presi';
                break;
            case 'gubwagub':
                $view = 'vw_detail_gub';
                break;
            case 'sekretaris':
                $view = 'vw_detail_sekre';
                break;
            case 'asgub':
                $view = 'vw_detail_asgub';
                break;
            case 'bendahara':
                $view = 'vw_detail_bendahara';
                break;
            case 'humas':
                $view = 'vw_detail_humas';
                break;
            case 'advo':
                $view = 'vw_detail_advo';
                break;
            case 'ristek':
                $view = 'vw_detail_ristek';
                break;
            case 'preskom':
                $view = 'vw_detail_preskom';
                break;
            case 'kominfo':
                $view = 'vw_detail_kominfo';
                break;
            case 'agama':
                $view = 'vw_detail_agama';
                break;
            case 'sosenbud':
                $view = 'vw_detail_sosenbud';
                break;
            case 'depora':
                $view = 'vw_detail_depora';
                break;
            case 'sarpras':
                $view = 'vw_detail_sarpras';
                break;
            default:
                // Default view jika jenis tidak cocok
                $view = 'vw_default';
                break;
        }

        $this->load->view("layout/header");
        $this->load->view("kepengurusan/" . $view, $data);
        $this->load->view("layout/footer");
    }

    public function Dokumentasi()
    {
         $data['judul']= "Halaman Kepengurusan";
         $this->load->view("layout/header");
         $this->load->view("kepengurusan/vw_dokumentasi", $data);
         $this->load->view("layout/footer");
    }

}
