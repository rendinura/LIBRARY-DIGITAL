<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level') == 'peminjam') {
            redirect('Beranda');
        } elseif ($this->session->userdata('id_user') == NULL) {
            redirect('Beranda');
        }
    }

    public function index()
    {
        $this->db->from('kategori_buku');
        $kategori = $this->db->get()->result_array();

        $data = array(
            'judul'  => 'E-Perpus || Category',
            'kategori'  => $kategori,
        );

        $this->template->load('template_admin', 'Admin/category', $data);
    }

    public function add()
    {
        $this->db->from('kategori_buku');
        $this->db->where('nama_kategori', $this->input->post('nama_kategori'));
        $cek = $this->db->get()->result_array();
        if ($cek <> null) {
            $this->session->set_flashdata('alert', '
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
               <i class="fa fa-exclamation-circle me-2">Maaf nama kategori sudah ada</i>
            </div>
			');
            redirect('Category');
        } elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nama_kategori = $this->input->post('nama_kategori');

            $data = array(
                'nama_kategori' => $nama_kategori,
            );
        }

        $this->db->insert('kategori_buku', $data);
        $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible" role="alert">
        Congratulation !!! Data berhasil ditambahkan..😊
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>');
        redirect('Category');
    }

    public function update()
    {
        // $this->Category_model->update();

        $id = array(
            'id_kategori'   => $this->input->post('id_kategori'),
        );
        $update = array(
            'nama_kategori'      => $this->input->post('nama_kategori'),
        );
        $this->db->update('kategori_buku', $update, $id);

        $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible" role="alert">
        Congratulation !!! Data berhasil diperbarui..😊
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>');
        redirect('Category');
    }

    public function delete($id)
    {
        // $this->User_model->hapus($id);

        $hapus = array(
            'id_kategori'  => $id,
        );
        $this->db->delete('kategori_buku', $hapus);

        $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible" role="alert">
        Congratulation !!! Data berhasil dihapus..😊
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>');
        redirect('Category');
    }
}
