<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Proposal extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Proposal_model');
    }
    public function index()
    {
        $data['judul'] = "Halaman proposal";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        if ($data['user']['role'] == 'User') {
            $data['proposal'] = $this->Proposal_model->get();
            $this->load->view("layout/header", $data);
            $this->load->view("proposal/vw_proposal", $data);
            $this->load->view("layout/footer", $data);
        } elseif ($data['user']['role'] == 'Admin') {
            $data['proposal'] = $this->Proposal_model->get(); // Gantilah ini dengan data sesuai kebutuhan Admin
            $this->load->view("layout/header", $data);
            $this->load->view("proposal/vw_proposal_admin", $data);
            $this->load->view("layout/footer", $data);
        } elseif ($data['user']['role'] == 'Sekre2') {
            $data['proposal'] = $this->Proposal_model->get(); // Gantilah ini dengan data sesuai kebutuhan Admin
            $this->load->view("layout/header", $data);
            $this->load->view("proposal/vw_proposal_admin", $data);
            $this->load->view("layout/footer", $data);
        } else {
            // Role tidak dikenali, atur tindakan yang sesuai
        }
    }


    public function tambah_proposal()
    {
        $data['judul'] = "Halaman Tambah proposal";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view("layout/header", $data);
        $this->load->view("proposal/vw_tambah_proposal", $data);
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
        $this->form_validation->set_rules('namakegiatan', 'Nama Kegiatan', 'required');
        $this->form_validation->set_rules('nohp', 'Nomor HP', 'required|integer');
        $this->form_validation->set_rules('file_path', 'File Proposal', 'callback_check_file_upload');

        // Configurasi upload
        $config['upload_path']   = './assets/img/proposal/';
        $config['allowed_types'] = 'pdf';
        $config['max_size']      = 10240;

        $this->load->library('upload', $config);

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, tampilkan kembali halaman tambah_proposal dengan pesan error
            $data['judul'] = "Halaman Tambah Proposal";
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $this->load->view("layout/header", $data);
            $this->load->view("proposal/vw_tambah_proposal", $data);
            $this->load->view("layout/footer", $data);
        } else {
            if ($this->upload->do_upload('file_path')) {
                $uploadData = $this->upload->data();
                $data = [
                    'nama' => $this->input->post('nama'),
                    'nim' => $this->input->post('nim'),
                    'angkatan' => $this->input->post('angkatan'),
                    'kelas' => $this->input->post('kelas'),
                    'nohp' => $this->input->post('nohp'),
                    'namakegiatan' => $this->input->post('namakegiatan'),
                    'file_path' => $uploadData['file_name'],
                    'status' => 'Diterima',
                ];

                $this->Proposal_model->insert($data);
                redirect('Proposal');
            } else {
                $error = array('error' => $this->upload->display_errors());
                print_r($error);
            }
        }
    }

    // Callback function to check if the file is uploaded
    public function check_file_upload($file_path)
    {
        if (empty($_FILES['file_path']['name'])) {
            $this->form_validation->set_message('check_file_upload', 'The File Proposal field is required.');
            return FALSE;
        } else {
            return TRUE;
        }
    }


    public function edit($id)
    {
        $data['judul'] = "Halaman Edit proposal";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['proposal'] = $this->Proposal_model->getById($id);
        $this->load->view("layout/header", $data);
        $this->load->view("proposal/vw_ubah_proposal", $data);
        $this->load->view("layout/footer", $data);
    }
    public function hapus($id)
    {
        $this->Proposal_model->delete($id);
        redirect('proposal');
    }
    function update()
    {
        $data = [
            'nama' => $this->input->post('nama'),
            'nim' => $this->input->post('nim'),
            'nohp' => $this->input->post('nohp'),
            'namakegiatan' => $this->input->post('namakegiatan'),
            'file_path' => $this->input->post('file_path'),

        ];
        $id = $this->input->post('id');
        $this->Proposal_model->update(['id' => $id], $data);
        redirect('proposal');
    }
    // Controller
    public function tolak($id)
    {
        // Pastikan user yang login memiliki peran 'Admin'
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        if ($user['role'] == 'Admin') {
            // Update status proposal menjadi 'Proses'
            $this->Proposal_model->updateStatus($id, 'Ditolak');

            // Redirect kembali ke halaman proposal admin
            redirect('proposal');
        } else {
            // Tindakan jika user bukan admin (misalnya, redirect ke halaman lain atau tampilkan pesan)
            // ...
        }
    }
    public function proses($id)
    {
        // Pastikan user yang login memiliki peran 'Admin'
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        if ($user['role'] == 'Admin') {
            // Update status proposal menjadi 'Proses'
            $this->Proposal_model->updateStatus($id, 'Proses');

            // Redirect kembali ke halaman proposal admin
            redirect('proposal');
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
            // Update status proposal menjadi 'Proses'
            $this->Proposal_model->updateStatus($id, 'Selesai');

            // Redirect kembali ke halaman proposal admin
            redirect('proposal');
        } else {
            // Tindakan jika user bukan admin (misalnya, redirect ke halaman lain atau tampilkan pesan)
            // ...
        }
    }

    public function detail($id)
    {
        $data['judul'] = "Halaman Detail proposal";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['proposal'] = $this->Proposal_model->getById($id);
        $this->load->view("layout/header", $data);
        $this->load->view("proposal/vw_detail_proposal", $data);
        $this->load->view("layout/footer", $data);
    }
}
