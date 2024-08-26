<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda_model extends CI_Model
{
    public function simpan_peminjaman($data_peminjaman, $id_buku_array, $tanggal_peminjaman, $tanggal_pengembalian)
    {
        $this->db->insert('peminjaman', $data_peminjaman);
        $id_peminjaman = $this->db->insert_id();

        foreach ($id_buku_array as $id_buku) {
            $data_detail = array(
                'id_peminjaman' => $id_peminjaman,
                'id_buku' => $id_buku,
                'tanggal_pengembalian' => $tanggal_pengembalian,
                'stok' => '1',
                'status' => 'Ijin',
            );
            $this->db->insert('detail_peminjaman', $data_detail);
        }
    }

    public function find($id)
    {
        $buku = $this->db->where('id_buku', $id)->limit(1)->get('buku');
        if ($buku->num_rows() > 0) {
            return $buku->row();
        } else {
            return array();
        }
    }

    public function update_stok_single($id, $jumlah)
    {
        $this->db->set('stok', 'stok -s' . $jumlah, FALSE);
        $this->db->where('id_buku', $id);
        $this->db->update('buku');
    }

    public function get_buku_by_id($id_buku)
    {
        return $this->db->get_where('buku', array('id_buku' => $id_buku))->row();
    }

    public function update_stok($id_buku, $jumlah)
    {
        $this->db->set('stok', 'stok -' . $jumlah, FALSE);
        $this->db->where('id_buku', $id_buku);
        return $this->db->update('buku');
    }

    public function kembalikan_buku($id_peminjaman, $tanggal_pengembalian_real)
    {
        $this->db->trans_start();

        $this->db->set('tanggal_pengembalian_real', $tanggal_pengembalian_real);
        $this->db->set('status', 'Dikembalikan');
        $this->db->where('id_peminjaman', $id_peminjaman);
        $this->db->update('detail_peminjaman');


        $this->db->select('id_buku, jumlah');
        $this->db->where('id_peminjaman', $id_peminjaman);
        $query = $this->db->get('detail_peminjaman');
        $detail_peminjaman = $query->result();

        foreach ($detail_peminjaman as $detail) {
            $this->db->set('stok', 'stok + ' . $detail->jumlah, FALSE);
            $this->db->where('id_buku', $detail->id_buku);
            $this->db->update('buku');
        }

        $this->db->trans_complete();

        return $this->db->trans_status();
    }
}
