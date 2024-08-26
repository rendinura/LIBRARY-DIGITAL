<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

    public function tambah()
    {
        $data = array(
            'nama' => $this->input->post('nama'),
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('password')),
            'level' => $this->input->post('level'),
        );
        $this->db->insert('user', $data);
    }

    public function hapus($id)
    {
        $hapus = array(
            'id_user'  => $id,
        );
        $this->db->delete('user', $hapus);
    }

    public function update()
    {
        $id = array(
            'id_user'   => $this->input->post('id_user'),
        );
        $update = array(
            'nama'      => $this->input->post('nama'),
        );
        $this->db->update('user', $update, $id);
    }

    public function resetPW($id)
    {
        $where = array(
            'id_user' => $id,
        );
        $reset = array(
            'password' => md5('Admin123'),
        );
        $this->db->update('user', $reset, $where);
    }
}
