<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ulasan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Ulasan_model');
        if ($this->session->userdata('level') == 'peminjam') {
            redirect('Beranda');
        } elseif ($this->session->userdata('id_user') == NULL) {
            redirect('Beranda');
        }
    }

    public function index()
    {
        $this->db->from('ulasan_buku');
        $this->db->join('buku', 'buku.id_buku=ulasan_buku.id_buku');
        $this->db->join('user', 'user.id_user=ulasan_buku.id_user');
        $ulasan = $this->db->get()->result_array();

        $this->db->from('user');
        $user = $this->db->get()->result_array();

        $this->db->from('buku');
        $buku = $this->db->get()->result_array();

        $data = array(
            'judul'                 => 'E-Perpus || Ulasan',
            'ulasan'                => $ulasan,
            'buku'                  => $buku,
            'user'                  => $user,
        );

        $this->template->load('template_admin', 'Admin/ulasan', $data);
    }

    public function laporan()
    {
        $judul = $this->input->post('judul');
        $rating = $this->input->post('rating');

        if ($judul == '*' && $rating == '*') {
            $ulasan = $this->Ulasan_model->get_all_ulasan();
        } elseif ($judul == '*') {
            $ulasan = $this->Ulasan_model->get_all_ulasan_rating($rating);
        } elseif ($rating == '*') {
            $ulasan = $this->Ulasan_model->get_all_ulasan_judul($judul);
        } else {
            $ulasan = $this->Ulasan_model->get_ulasan_buku($judul, $rating);
        }

        $data = array(
            'judul'             => 'E-Perpus || Laporan Ulasan',
            'ulasan'            => $ulasan,
        );

        $this->load->view('laporan_ulasan', $data);
    }
}
