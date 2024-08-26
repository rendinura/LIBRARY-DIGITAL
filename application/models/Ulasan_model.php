<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ulasan_model extends CI_Model
{
    public function get_all_ulasan()
    {
        $this->db->from('ulasan_buku');
        $this->db->join('buku', 'buku.id_buku=ulasan_buku.id_buku');
        $this->db->join('user', 'user.id_user=ulasan_buku.id_user');
        return $this->db->get()->result_array();
    }

    public function get_all_ulasan_rating($rating)
    {
        $this->db->from('ulasan_buku');
        $this->db->join('buku', 'buku.id_buku=ulasan_buku.id_buku');
        $this->db->join('user', 'user.id_user=ulasan_buku.id_user');
        $this->db->where('ulasan_buku.rating', $rating);
        return $this->db->get()->result_array();
    }

    public function get_all_ulasan_judul($judul)
    {
        $this->db->from('ulasan_buku');
        $this->db->join('buku', 'buku.id_buku=ulasan_buku.id_buku');
        $this->db->join('user', 'user.id_user=ulasan_buku.id_user');
        $this->db->where('buku.judul', $judul);
        return $this->db->get()->result_array();
    }

    public function get_ulasan_buku($judul,$rating)
    {
        $this->db->from('ulasan_buku');
        $this->db->join('buku', 'buku.id_buku=ulasan_buku.id_buku');
        $this->db->join('user', 'user.id_user=ulasan_buku.id_user');
        $this->db->where('buku.judul', $judul);
        $this->db->where('ulasan_buku.rating', $rating);
        return $this->db->get()->result_array();
    }
}
