<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Buku extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Buku_model');
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

        $this->db->from('kategori_buku_relasi');
        $kategori_relasi = $this->db->get()->result_array();

        $this->db->select('buku.id_buku, buku.judul, buku.foto, buku.penulis, buku.penerbit, buku.stok, buku.tahun_terbit, 
        GROUP_CONCAT(kategori_buku.nama_kategori SEPARATOR ", ") as kategori');
        $this->db->from('buku');
        $this->db->join('kategori_buku_relasi', 'kategori_buku_relasi.id_buku=buku.id_buku');
        $this->db->join('kategori_buku', 'kategori_buku.id_kategori=kategori_buku_relasi.id_kategori');
        $this->db->group_by('buku.id_buku');
        $buku = $this->db->get()->result_array();

        $data = array(
            'judul'  => 'E-Perpus || Buku',
            'kategori'  => $kategori,
            'kategori_relasi'  => $kategori_relasi,
            'buku'  => $buku,
        );

        $this->template->load('template_admin', 'Admin/buku', $data);
    }

    public function add()
    {
        $namafoto                      = date('YmdHis') . '.jpg';
        $config['upload_path']         = 'assets/upload/buku/';
        $config['max_size']            = 2048 * 1024; // 3MB; 0=unlimited
        $config['file_name']           = $namafoto;
        $config['allowed_types']       = '*';
        $this->load->library('upload', $config);

        if ($_FILES['foto']['size'] >= 2048 * 1024) {
            $this->session->set_flashdata('alert', '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
               <i class="fa fa-exclamation-circle me-2">Maaf ukuran foto terlalu besar..</i>
            </div>
            ');
            redirect('Buku');
        } elseif ($this->upload->do_upload('foto')) {
            $error = array('error' => $this->upload->display_errors());
        } else {
            $data = array('upload_data' => $this->upload->data());
        }

        $this->db->from('buku');
        $this->db->where('judul', $this->input->post('judul'));
        $cek = $this->db->get()->result_array();

        if ($cek <> null) {
            $this->session->set_flashdata('alert', '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
               <i class="fa fa-exclamation-circle me-2">Maaf nama kategori sudah ada..</i>
            </div>
            ');
            redirect('Buku');
        } elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
            $judul = $this->input->post('judul');

            $data = array(
                'judul' => $judul,
                'penulis' => $this->input->post('penulis'),
                'foto' => $namafoto,
                'penerbit' => $this->input->post('penerbit'),
                'stok' => $this->input->post('stok'),
                'tahun_terbit' => $this->input->post('tahun_terbit'),
            );

            $this->db->insert('buku', $data);
            $id_buku = $this->db->insert_id();

            // Simpan kategori ke tabel relasi
            $kategori = $this->input->post('id_kategori');
            foreach ($kategori as $id_kategori) {
                $data_kategori_relasi = array(
                    'id_buku' => $id_buku,
                    'id_kategori' => $id_kategori
                );
                $this->db->insert('kategori_buku_relasi', $data_kategori_relasi);
            }

            $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible" role="alert">
            Congratulation !!! Data berhasil ditambahkan..😊
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>');
            redirect('Buku');
        }
    }

    public function update()
    {
        $namafoto                      = $this->input->post('nama_foto');
        $config['upload_path']         = 'assets/upload/buku/';
        $config['max_size']            = 2048 * 1024; //3*1024*1024; // 3MB; 0=unlimited
        $config['file_name']           = $namafoto;
        $config['overwrite']           = true;
        $config['allowed_types']       = '*';
        $this->load->library('upload', $config);
        if ($_FILES['foto']['size']   >= 2048 * 1024) {
            $this->session->set_flashdata('alert', '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                   <i class="fa fa-exclamation-circle me-2">Maaf ukuran foto terlalu besar..</i>
                </div>
                ');
            redirect('Buku');
        } elseif (!$this->upload->do_upload('foto')) {
            $error = array('error' => $this->upload->display_errors());
        } else {
            $data = array('upload_data' => $this->upload->data());
        }

        $data = array(
            'judul' => $this->input->post('judul'),
            'penerbit' => $this->input->post('penerbit'),
            'penulis' => $this->input->post('penulis'),
            'stok' => $this->input->post('stok'),
            'tahun_terbit' => $this->input->post('tahun_terbit'),
        );

        $id_buku = $this->input->post('id_buku');

        $this->Buku_model->update_categories($id_buku, $this->input->post('id_kategori'));

        $this->Buku_model->update($data, $id_buku);

        $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible" role="alert">
        Congratulation !!! Data Barang berhasil diperbarui..😊
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>');
        redirect('Buku');
    }



    public function delete($id)
    {

        $filename = FCPATH . '/assets/upload/buku/' . $id;
        if (file_exists($filename)) {
            unlink("./assets/upload/buku/" . $id);
        }

        $where = array(
            'id_buku' => $id
        );

        $this->db->delete('kategori_buku_relasi', $where);
        $this->db->delete('buku', $where);

        $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible" role="alert">
        Congratulation !!! Data berhasil dihapus..😊
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>');
        redirect('Buku');
    }
}
