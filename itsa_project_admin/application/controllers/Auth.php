<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model', 'userrole');
    }

    public function index()
    {
        if ($this->session->userdata('email')) {
            redirect('Admin');
        }
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', [
            'valid_email' => 'Email Harus Valid',
            'required' => 'Email Wajib isi'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'trim|required|', [
            'required' => 'Password Wajib di isi'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view("layout/auth_header");
            $this->load->view("auth/login");
            $this->load->view("layout/auth_footer");
        } else {
            $this->cek_login();
        }
    }
    public function registrasi()
    {
        if ($this->session->userdata("email")) {
            redirect('Mahasiswa');
        }
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim',[
            'required' => 'Nama Wajib di isi'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]|regex_match[/ti\@mahasiswa\.pcr\.ac\.id$/]', [
            'is_unique' => 'Email ini sudah terdaftar!',
            'valid_email' => 'Email Harus Valid',
            'required' => 'Email Wajib di isi',
            'regex_match' => 'Email harus menggunakan domain mahasiswa PCR',
        ]);
        $this->form_validation->set_rules('nim', 'NIM', 'required|integer',[
            'required'=> 'NIM Wajib di isi',
            'integer'=>'NIM harus angka'
        ]);
        $this->form_validation->set_rules('angkatan', 'Angkatan', 'required|integer',[
            'required'=> 'Angkatan Wajib di isi',
            'integer'=>'Angkatan harus angka'
        ]);
        $this->form_validation->set_rules('kelas', 'Kelas', 'required|trim|regex_match[/^\d{2}[A-Z]{3}$/]',[
            'required'=> 'Kelas Wajib di isi',
            'regex_match' => 'Kelas menggunakan angkatan,TI,kelas',
        ]);
        $this->form_validation->set_rules(
            'password1',
            'Password',
            'required|trim|min_length[5]|matches[inputPasswordConfirm]',
            [
                'matches' => 'Password Tidak Sama',
                'min_length' => 'Password Terlalu Pendek',
                'required' => 'Password harus di isi',
            ]
        );
        $this->form_validation->set_rules('inputPasswordConfirm', 'Konfirmasi Password', 'required|trim|matches[password1]');
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Registration';
            $this->load->view("layout/auth_header", $data);
            $this->load->view("auth/registrasi");
            $this->load->view("layout/auth_footer");
        } else {
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'nim' => htmlspecialchars($this->input->post('nim', true)),
                'angkatan' => htmlspecialchars($this->input->post('angkatan', true)),
                'kelas' => htmlspecialchars($this->input->post('kelas', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'password' => password_hash($this->input->post('password1', true), PASSWORD_DEFAULT),
                'gambar' => 'pp.jpg',
                'role' => "User",
                'date_created' => time()
            ];

            $this->userrole->insert($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat!
			Akunmu telah berhasil terdaftar, Sihlakan Login!</div>');
            redirect('auth');
        }
    }
    public function cek_regis()
    {
        $data = [
            'nama' => htmlspecialchars($this->input->post('nama')),
            'email' => htmlspecialchars($this->input->post('email')),
            'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            'gambar' => 'default.jpg',
            'role' => 'User',
            'date_created' => date("Y-m-d")
        ];

        $this->userrole->insert($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat akunmu telah berhasil terdaftar, Silahkan Login!</div>');
        redirect('Auth');
    }
    public function cek_login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        if ($user) {
            if (password_verify($password, $user['password'])) {
                $data = [
                    'email' => $user['email'],
                    'role' => $user['role'],
                    'id' => $user['id']
                ];
                $this->session->set_userdata($data);
                if ($user['role'] == 'Admin') {
                    redirect('Dashboard');
                } else {
                    redirect('Dashboard');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password salah!</div>');
                redirect('Auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email belum terdaftar!</div>');
            redirect('Auth');
        }
    }
    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Logout!</div>');
        redirect('Auth');
    }
}
