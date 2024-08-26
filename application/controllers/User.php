<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        if ($this->session->userdata('level') == 'peminjam') {
            redirect('Beranda');
        } elseif ($this->session->userdata('id_user') == NULL) {
            redirect('Beranda');
        }
    }

    public function index()
    {
        $this->db->from('user');
        $user = $this->db->get()->result_array();

        $data = array(
            'judul'  => 'E-Perpus || User',
            'user'  => $user,
        );

        $this->template->load('template_admin', 'Admin/user', $data);
    }

    public function add()
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
            redirect('User');
        } elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $this->input->post('username');
            $password = md5($this->input->post('password'));
            $email = $this->input->post('email');
            $telepon = $this->input->post('telepon');
            $nama_lengkap = $this->input->post('nama_lengkap');
            $alamat = $this->input->post('alamat');

            $data = array(
                'username'      => $username,
                'password'      => $password,
                'email'         => $email,
                'telepon'       => $telepon,
                'nama_lengkap'  => $nama_lengkap,
                'alamat'        => $alamat,
                'level'         => 'peminjam',
            );
        }

        $this->db->insert('user', $data);

        redirect('User');
    }

    public function update()
    {
        $id_user = $this->input->post('id_user');
        $username = $this->input->post('username');
        $email = $this->input->post('email');
        $telepon = $this->input->post('telepon');
        $nama_lengkap = $this->input->post('nama_lengkap');
        $alamat = $this->input->post('alamat');
        $level = $this->input->post('level');

        $where = array(
            'id_user'       => $id_user,
        );

        $data = array(
            'username'      => $username,
            'password'      => $password,
            'email'         => $email,
            'telepon'       => $telepon,
            'nama_lengkap'  => $nama_lengkap,
            'alamat'        => $alamat,
            'level'         => $level,
        );
        $this->db->update('user', $data, $where);
        $this->session->set_flashdata('alert', '
			<div class="alert alert-success alert-dismissible fade show" role="alert">
               <i class="fa fa-exclamation-circle me-2">User berhasil diperbarui</i>
            </div>
			');
        redirect('User');
    }

    public function delete($id)
    {
        $this->User_model->hapus($id);
        $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible" role="alert">
        Congratulation !!! Data berhasil dihapus..😊
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>');
        redirect('User');
    }
}
