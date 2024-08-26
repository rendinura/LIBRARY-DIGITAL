<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if ($this->session->userdata('level') !== NULL) {
            redirect('Beranda');
        }
        $data = array(
            'namaform'  => 'E-Perpus📚',
        );
        $this->load->view('login', $data);
    }

    public function login()
    {
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));

        $this->db->from('user');
        $this->db->where('username', $username, $password);
        $cek = $this->db->get()->row();

        if ($cek == NULL) {
            $this->session->set_flashdata('alert', '
            <div class="alert alert-danger alert-dismissible" role="alert">
            Sorry !!! Username salah..✋
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>');
            redirect('Auth');
        } else if ($password == $cek->password) {
            $data = array(
                'namaform'      => 'E-Perpus📚',
                'id_user'       => $cek->id_user,
                'nama_lengkap'  => $cek->nama_lengkap,
                'telepon'       => $cek->telepon,
                'username'      => $cek->username,
                'email'         => $cek->email,
                'alamat'        => $cek->alamat,
                'level'         => $cek->level,
            );

            $this->session->set_userdata($data);
            redirect('Beranda');
        } else {
            $this->session->set_flashdata('alert', '
            <div class="alert alert-danger alert-dismissible" role="alert">
            Sorry !!! Password salah..✋
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>');
            redirect('Auth');
        }
    }

    public function regist()
    {
        $data = array(
            'namaform'  => 'E-Perpus📚',
        );
        $this->load->view('regist', $data);
    }

    public function register()
    {
        $this->db->from('user');
        $this->db->where('username', $this->input->post('username'));
        $cek = $this->db->get()->result_array();
        if ($cek <> null) {
            $this->session->set_flashdata('alert', '
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
               <i class="fa fa-exclamation-circle me-2">Maaf Username sudah ada</i>
            </div>
			');
            redirect('Auth/regist');
        } elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $this->input->post('username');
            $password = md5($this->input->post('password'));
            $email = $this->input->post('email');
            $telepon = $this->input->post('telepon');
            $nama_lengkap = $this->input->post('nama_lengkap');
            $alamat = $this->input->post('alamat');

            $data = array(
                'username' => $username,
                'password' => $password,
                'email' => $email,
                'telepon' => $telepon,
                'nama_lengkap' => $nama_lengkap,
                'alamat' => $alamat,
                'level' => 'peminjam',
            );
        }
        $this->session->set_flashdata('alert', '
        <div class="alert alert-success alert-dismissible fade show" role="alert">
           <i class="fa fa-exclamation-circle me-2">Registrasi Berhasil.. Silahkan Login dengan akun Anda..</i>
        </div>
        ');
        $this->db->insert('user', $data);

        redirect('Auth');
    }

    public function logout()
    {
        $this->session->userdata('username');
        $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible" role="alert">
            Congratulation !!! Logout succes..😊
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>');

        $this->session->sess_destroy();
        redirect('Auth');
    }
}
