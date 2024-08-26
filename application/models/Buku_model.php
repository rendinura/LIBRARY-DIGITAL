<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Buku_model extends CI_Model
{
    public function update_categories($id_buku, $kategori_ids)
    {
        $this->db->delete('kategori_buku_relasi', array('id_buku' => $id_buku));

        foreach ($kategori_ids as $id_kategori) {
            $data_kategori_relasi = array(
                'id_buku' => $id_buku,
                'id_kategori' => $id_kategori
            );
            $this->db->insert('kategori_buku_relasi', $data_kategori_relasi);
        }
    }

    public function update($data, $id_buku)
    {
        $this->db->where('id_buku', $id_buku);
        $this->db->update('buku', $data);
    }
}
