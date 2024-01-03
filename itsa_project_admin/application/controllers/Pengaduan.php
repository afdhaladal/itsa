<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengaduan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pengaduan_model');
    }
    public function index()
    {
        $data['judul'] = "Halaman Pengaduan";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        if ($data['user']['role'] == 'User') {
            $data['pengaduan'] = $this->Pengaduan_model->get();
            $this->load->view("layout/header", $data);
            $this->load->view("pengaduan/vw_pengaduan", $data);
            $this->load->view("layout/footer", $data);
        } elseif ($data['user']['role'] == 'Admin') {
            $data['pengaduan'] = $this->Pengaduan_model->get(); // Gantilah ini dengan data sesuai kebutuhan Admin
            $this->load->view("layout/header", $data);
            $this->load->view("pengaduan/vw_pengaduan_admin", $data);
            $this->load->view("layout/footer", $data);
        } else {
            // Role tidak dikenali, atur tindakan yang sesuai
        }
    }

    public function tambah_pengaduan()
    {
        $data['judul'] = "Halaman Tambah Pengaduan";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view("layout/header", $data);
        $this->load->view("pengaduan/vw_tambah_pengaduan", $data);
        $this->load->view("layout/footer", $data);
    }
    public function upload()
    {
        $namaUser = $this->session->userdata('nama');
        $nimUser = $this->session->userdata('nim');
        $angkatanUser = $this->session->userdata('angkatan');
        $kelasUser = $this->session->userdata('kelas');

        // Fetch the user's id based on the name
        $user = $this->db->get_where('user', ['nama' => $namaUser])->row_array();
        $user = $this->db->get_where('user', ['nim' => $nimUser])->row_array();
        $user = $this->db->get_where('user', ['angkatan' => $angkatanUser])->row_array();
        $user = $this->db->get_where('user', ['kelas' => $kelasUser])->row_array();

        // Set rules for form validation
        $this->form_validation->set_rules('pengaduan', 'Pengaduan', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, tampilkan kembali halaman tambah_pengaduan dengan pesan error
            $data['judul'] = "Halaman Tambah Pengaduan";
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $this->load->view("layout/header", $data);
            $this->load->view("pengaduan/vw_tambah_pengaduan", $data);
            $this->load->view("layout/footer", $data);
        } else {
            // Jika validasi sukses, lakukan proses upload
            $data = [
                'nama' => $this->input->post('nama'),
                'nim' => $this->input->post('nim'),
                'angkatan' => $this->input->post('angkatan'),
                'kelas' => $this->input->post('kelas'),
                'pengaduan' => $this->input->post('pengaduan'),
                'status' => 'Diterima',
            ];
            $this->Pengaduan_model->insert($data);
            redirect('Pengaduan');
        }
    }
    public function hapus($id)
    {
        $this->Pengaduan_model->delete($id);
        redirect('Pengaduan');
    }
    // Controller
    public function proses($id)
    {
        // Pastikan user yang login memiliki peran 'Admin'
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        if ($user['role'] == 'Admin') {
            // Update status pengaduan menjadi 'Proses'
            $this->Pengaduan_model->updateStatus($id, 'Proses');

            // Redirect kembali ke halaman pengaduan admin
            redirect('Pengaduan');
        } else {
            // Tindakan jika user bukan admin (misalnya, redirect ke halaman lain atau tampilkan pesan)
            // ...
        }
    }
    public function selesai($id)
    {
        // Pastikan user yang login memiliki peran 'Admin'
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        if ($user['role'] == 'Admin') {
            // Update status pengaduan menjadi 'Proses'
            $this->Pengaduan_model->updateStatus($id, 'Selesai');

            // Redirect kembali ke halaman pengaduan admin
            redirect('Pengaduan');
        } else {
            // Tindakan jika user bukan admin (misalnya, redirect ke halaman lain atau tampilkan pesan)
            // ...
        }
    }

    public function detail($id)
    {
        $data['judul'] = "Halaman Detail Pengaduan";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pengaduan'] = $this->Pengaduan_model->getById($id);
        $this->load->view("layout/header", $data);
        $this->load->view("pengaduan/vw_detail_pengaduan", $data);
        $this->load->view("layout/footer", $data);
    }
}
