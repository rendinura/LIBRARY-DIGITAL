<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
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
        $buku = $this->db->from('buku')->count_all_results();
        $user = $this->db->from('user')->count_all_results();
        $kategori_buku = $this->db->from('kategori_buku')->count_all_results();
        $peminjaman = $this->db->from('peminjaman')->count_all_results();

        $data = array(
            'judul'  => 'Beranda',
            'buku'  => $buku,
            'user'  => $user,
            'kategori_buku'  => $kategori_buku,
            'peminjaman'  => $peminjaman,
        );

        $this->template->load('template_admin', 'Admin/beranda', $data);
    }
}
