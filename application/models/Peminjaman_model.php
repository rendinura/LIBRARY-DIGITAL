<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Peminjaman_model extends CI_Model
{
    public function create_peminjaman($data)
    {
        $this->db->insert('peminjaman', $data);
        return $this->db->insert_id();
    }

    public function create_detail_peminjaman($data)
    {
        return $this->db->insert('detail_peminjaman', $data);
    }

    public function get_data_by_date_range_all($start_date, $end_date)
    {
        $this->db->from('buku');
        $this->db->join('detail_peminjaman', 'detail_peminjaman.id_buku=buku.id_buku');
        $this->db->join('peminjaman', 'peminjaman.id_peminjaman=detail_peminjaman.id_peminjaman');
        $this->db->join('user', 'user.id_user=peminjaman.id_user');
        $this->db->where('tanggal_peminjaman >= ', $start_date);
        $this->db->where('tanggal_peminjaman <= ', $end_date);
        $this->db->order_by('tanggal_peminjaman', 'DESC');
        return $this->db->get()->result_array();
    }

    public function get_data_by_date_range($start_date, $end_date, $status)
    {
        $this->db->from('buku');
        $this->db->join('detail_peminjaman', 'detail_peminjaman.id_buku=buku.id_buku');
        $this->db->join('peminjaman', 'peminjaman.id_peminjaman=detail_peminjaman.id_peminjaman');
        $this->db->join('user', 'user.id_user=peminjaman.id_user');
        $this->db->where('tanggal_peminjaman >= ', $start_date);
        $this->db->where('tanggal_peminjaman <= ', $end_date);
        $this->db->where('detail_peminjaman.status', $status);
        $this->db->order_by('tanggal_peminjaman', 'DESC');
        return $this->db->get()->result_array();
    }

    public function get_data_by_date_range_user($start_date, $end_date, $user)
    {
        $this->db->from('buku');
        $this->db->join('detail_peminjaman', 'detail_peminjaman.id_buku=buku.id_buku');
        $this->db->join('peminjaman', 'peminjaman.id_peminjaman=detail_peminjaman.id_peminjaman');
        $this->db->join('user', 'user.id_user=peminjaman.id_user');
        $this->db->where('tanggal_peminjaman >= ', $start_date);
        $this->db->where('tanggal_peminjaman <= ', $end_date);
        $this->db->where('peminjaman.id_user', $user);
        $this->db->order_by('tanggal_peminjaman', 'DESC');
        return $this->db->get()->result_array();
    }

    public function get_data_by_date_range_user_status($start_date, $end_date, $user, $status)
    {
        $this->db->from('buku');
        $this->db->join('detail_peminjaman', 'detail_peminjaman.id_buku=buku.id_buku');
        $this->db->join('peminjaman', 'peminjaman.id_peminjaman=detail_peminjaman.id_peminjaman');
        $this->db->join('user', 'user.id_user=peminjaman.id_user');
        $this->db->where('tanggal_peminjaman >= ', $start_date);
        $this->db->where('tanggal_peminjaman <= ', $end_date);
        $this->db->where('peminjaman.id_user', $user);
        $this->db->where('detail_peminjaman.status', $status);
        $this->db->order_by('tanggal_peminjaman', 'DESC');
        return $this->db->get()->result_array();
    }
}
