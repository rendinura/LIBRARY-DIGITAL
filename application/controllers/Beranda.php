<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Beranda_model');
		$this->load->model('Peminjaman_model');
		// if ($this->session->userdata('level') == NULL) {
		//     redirect('Beranda');
		// }
	}

	public function index()
	{
		$this->db->from('kategori_buku');
		$kategori = $this->db->get()->result_array();

		$this->db->from('kategori_buku_relasi');
		$kategori_relasi = $this->db->get()->result_array();

		$this->db->select('buku.id_buku, buku.judul, buku.foto, buku.penulis, buku.penerbit, buku.stok, buku.tahun_terbit, GROUP_CONCAT(kategori_buku.nama_kategori SEPARATOR ", ") as kategori');
		$this->db->from('buku');
		$this->db->join('kategori_buku_relasi', 'kategori_buku_relasi.id_buku=buku.id_buku');
		$this->db->join('kategori_buku', 'kategori_buku.id_kategori=kategori_buku_relasi.id_kategori');
		$this->db->group_by('buku.id_buku');
		$buku = $this->db->get()->result_array();

		$data = array(
			'namaform'      => 'E-Perpus📚',
			'judul'  			=> 'E-Perpus📚',
			'kategori' 			=> $kategori,
			'kategori_relasi'  	=> $kategori_relasi,
			'buku'  			=> $buku,
		);

		$this->template->load('template_user', 'beranda', $data);
	}

	public function detail($id)
	{
		$this->db->from('kategori_buku');
		$kategori = $this->db->get()->result_array();

		$this->db->from('kategori_buku_relasi');
		$this->db->where('id_buku', $id);
		$kategori_relasi = $this->db->get()->result_array();

		$this->db->select('buku.id_buku, buku.judul, buku.foto, buku.penulis, buku.penerbit, buku.stok, buku.tahun_terbit, GROUP_CONCAT(kategori_buku.nama_kategori SEPARATOR ", ") as kategori');
		$this->db->from('buku');
		$this->db->join('kategori_buku_relasi', 'kategori_buku_relasi.id_buku=buku.id_buku');
		$this->db->join('kategori_buku', 'kategori_buku.id_kategori=kategori_buku_relasi.id_kategori');
		$this->db->where('buku.id_buku', $id);
		$this->db->group_by('buku.id_buku');
		$buku = $this->db->get()->row();

		$this->db->select('buku.id_buku, buku.judul, buku.foto, buku.penulis, buku.penerbit, buku.stok, buku.tahun_terbit, GROUP_CONCAT(kategori_buku.nama_kategori SEPARATOR ", ") as kategori');
		$this->db->from('buku');
		$this->db->join('kategori_buku_relasi', 'kategori_buku_relasi.id_buku=buku.id_buku');
		$this->db->join('kategori_buku', 'kategori_buku.id_kategori=kategori_buku_relasi.id_kategori');
		$this->db->group_by('buku.id_buku');
		$bukulop = $this->db->get()->result_array();

		$this->db->from('buku');
		$this->db->join('ulasan_buku', 'ulasan_buku.id_buku=buku.id_buku');
		$this->db->join('user', 'user.id_user=ulasan_buku.id_user', 'left');
		$this->db->where('ulasan_buku.id_buku', $id);
		$ulasan = $this->db->get()->result_array();

		$this->db->from('buku');
		$this->db->join('ulasan_buku', 'ulasan_buku.id_buku=buku.id_buku');
		$this->db->join('user', 'user.id_user=ulasan_buku.id_user', 'left');
		$this->db->where('ulasan_buku.id_buku', $id);
		$countulasan = $this->db->count_all_results();

		$this->db->select('buku.*, 
		AVG(ulasan_buku.rating) as rata_rating, 
		COUNT(ulasan_buku.id_ulasan) as jumlah_pemberi_rating,
		(AVG(ulasan_buku.rating) / 5) * 5 as nilai_rating');
		$this->db->from('buku');
		$this->db->join('ulasan_buku', 'ulasan_buku.id_buku=buku.id_buku');
		$this->db->join('user', 'user.id_user=ulasan_buku.id_user', 'left');
		$this->db->where('ulasan_buku.id_buku', $id);
		$rating = $this->db->get()->row();


		$data = array(
			'judul' 			=> 'E-Perpus📚',
			'kategori' 			=> $kategori,
			'kategori_relasi'  	=> $kategori_relasi,
			'buku'  			=> $buku,
			'bukulop'  			=> $bukulop,
			'ulasan'  			=> $ulasan,
			'rating'  		    => $rating,
			'countulasan'  		=> $countulasan,
		);
		$this->template->load('template_user', 'about', $data);
	}

	public function koleksipribadi()
	{
		if ($this->session->userdata('id_user') == NULL) {
			redirect('Beranda');
		}
		$this->db->from('kategori_buku');
		$kategori = $this->db->get()->result_array();

		$id = $this->session->userdata('id_user');
		$this->db->from('user');
		$this->db->where('id_user', $id);
		$user = $this->db->get()->row();

		$this->db->select('buku.id_buku, buku.judul, buku.foto, buku.penulis, buku.penerbit, buku.stok, buku.tahun_terbit, GROUP_CONCAT(kategori_buku.nama_kategori SEPARATOR ", ") as kategori');
		$this->db->from('koleksi_pribadi');
		$this->db->join('buku', 'buku.id_buku = koleksi_pribadi.id_buku');
		$this->db->join('kategori_buku_relasi', 'kategori_buku_relasi.id_buku = buku.id_buku', 'left');
		$this->db->join('kategori_buku', 'kategori_buku.id_kategori = kategori_buku_relasi.id_kategori', 'left');
		$this->db->where('koleksi_pribadi.id_user', $id);
		$this->db->group_by('buku.id_buku');
		$koleksi = $this->db->get()->result_array();

		$data = array(
			'judul'    => 'E-Perpus📚',
			'user'     => $user,
			'koleksi'  => $koleksi,
			'kategori' => $kategori,
		);

		$this->template->load('template_user', 'koleksi', $data);
	}


	public function koleksi($id)
	{
		$id_user = $this->session->userdata('id_user');

		$this->db->from('koleksi_pribadi');
		$this->db->where('id_buku', $id);
		$this->db->where('id_user', $id_user);
		$cek = $this->db->get()->row();

		if ($cek == NULL) {

			$data = array(
				'id_buku'  => $id,
				'id_user'  => $id_user,
			);

			$this->db->insert('koleksi_pribadi', $data);
			redirect('Beranda');
		} else {
			$this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissible" role="alert">
            Sudah ada dalam koleksi pribadi..
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');
			redirect('Beranda');
		}
	}

	public function kategori($id)
	{
		$this->db->from('kategori_buku');
		$kategori = $this->db->get()->result_array();

		$this->db->select('buku.id_buku, buku.judul, buku.foto, buku.penulis, buku.penerbit, buku.stok, buku.tahun_terbit, GROUP_CONCAT(kategori_buku.nama_kategori SEPARATOR ", ") as kategori');
		$this->db->from('buku');
		$this->db->join('kategori_buku_relasi', 'kategori_buku_relasi.id_buku = buku.id_buku');
		$this->db->join('kategori_buku', 'kategori_buku.id_kategori = kategori_buku_relasi.id_kategori');
		$this->db->where('kategori_buku.id_kategori', $id);
		$this->db->group_by('buku.id_buku');
		$buku = $this->db->get()->result_array();

		$this->db->select('buku.id_buku, buku.judul, buku.foto, buku.penulis, buku.penerbit, buku.stok, buku.tahun_terbit, GROUP_CONCAT(kategori_buku.nama_kategori SEPARATOR ", ") as kategori');
		$this->db->from('buku');
		$this->db->join('kategori_buku_relasi', 'kategori_buku_relasi.id_buku=buku.id_buku');
		$this->db->join('kategori_buku', 'kategori_buku.id_kategori=kategori_buku_relasi.id_kategori');
		$this->db->group_by('buku.id_buku');
		$bukulop = $this->db->get()->result_array();

		$this->db->where('id_kategori', $id);
		$kategori_detail = $this->db->get('kategori_buku')->row_array();

		$data = array(
			'judul'            => 'E-Perpus📚',
			'buku'             => $buku,
			'bukulop'          => $bukulop,
			'kategori'         => $kategori,
			'kategori_detail'  => $kategori_detail,
		);

		$this->template->load('template_user', 'kategori', $data);
	}

	public function pinjam($id)
	{
		$id_user = $this->session->userdata('id_user');
		$tpi = $this->input->post('tanggal_peminjaman');
		$tpe = $this->input->post('tanggal_pengembalian');
		$jumlah = 1;

		$data_peminjaman = array(
			'id_user'                => $id_user,
			'tanggal_peminjaman'     => $tpi,
			'tanggal_pengembalian'   => $tpe,
		);

		$this->db->insert('peminjaman', $data_peminjaman);

		$id_peminjaman = $this->db->insert_id();

		$data_detail = array(
			'id_peminjaman'          => $id_peminjaman,
			'id_buku'                => $id,
			'jumlah'                 => $jumlah,
			'tanggal_pengembalian_real'   => 0000 - 00 - 00,
			'status'                 => 'Ditinjau',
		);

		$this->db->insert('detail_peminjaman', $data_detail);

		$this->Beranda_model->update_stok_single($id, $jumlah);

		redirect('Beranda');
	}


	public function pinjambanyak()
	{
		$id_user 				= $this->session->userdata('id_user');
		$tanggal_peminjaman 	= $this->input->post('tanggal_peminjaman');
		$tanggal_pengembalian 	= $this->input->post('tanggal_pengembalian');
		$id_buku 				= $this->input->post('id_buku');
		$jumlah 				= $this->input->post('jumlah');
		$data_peminjaman = array(
			'id_user'				 => $id_user,
			'tanggal_peminjaman'	 => $tanggal_peminjaman,
			'tanggal_pengembalian'	 => $tanggal_pengembalian,
		);

		$id_peminjaman = $this->Peminjaman_model->create_peminjaman($data_peminjaman);

		foreach ($id_buku as $key => $buku) {
			$data_detail = array(
				'id_peminjaman' => $id_peminjaman,
				'id_buku' => $buku,
				'jumlah' => $jumlah[$key],
			);

			// var_dump($data_detail);
			// die;
			$this->Peminjaman_model->create_detail_peminjaman($data_detail);

			$this->Beranda_model->update_stok($buku, $jumlah[$key]);
		}

		$this->session->set_flashdata('success', 'Peminjaman berhasil!');
		redirect('Beranda');
	}

	public function pinjaman()
	{
		if ($this->session->userdata('id_user') == NULL) {
			redirect('Beranda');
		}
		$id = $this->session->userdata('id_user');

		$this->db->from('kategori_buku');
		$kategori = $this->db->get()->result_array();

		$this->db->from('peminjaman');
		$this->db->join('user', 'user.id_user=peminjaman.id_user');
		// $this->db->join('detail_peminjaman', 'detail_peminjaman.id_peminjaman=peminjaman.id_peminjaman');
		// $this->db->join('buku', 'buku.id_buku=detail_peminjaman.id_buku');
		$this->db->where('peminjaman.id_user', $id);
		$peminjaman = $this->db->get()->result_array();

		$this->db->from('peminjaman');
		$this->db->join('user', 'user.id_user=peminjaman.id_user');
		$this->db->join('detail_peminjaman', 'detail_peminjaman.id_peminjaman=peminjaman.id_peminjaman');
		$this->db->join('buku', 'buku.id_buku=detail_peminjaman.id_buku');
		$this->db->where('peminjaman.id_user', $id);
		$detailpeminjaman = $this->db->get()->row_array();

		$this->db->from('user');
		$this->db->where('id_user', $id);
		$user = $this->db->get()->row();

		$data = array(
			'judul'            => 'E-Perpus📚',
			'kategori'         => $kategori,
			'user'             => $user,
			'peminjaman'       => $peminjaman,
			'detailpeminjaman'       => $detailpeminjaman,
		);

		$this->template->load('template_user', 'peminjaman', $data);
	}

	public function detail_pinjaman($idpeminjaman)
	{
		$id = $this->session->userdata('id_user');

		$this->db->from('kategori_buku');
		$kategori = $this->db->get()->result_array();

		$this->db->select('peminjaman.*, 
    detail_peminjaman.id_detail_peminjaman,
    detail_peminjaman.id_buku, 
    detail_peminjaman.jumlah, 
    buku.judul, 
    buku.foto, 
    buku.penulis, 
    buku.penerbit, 
    buku.stok, 
    buku.tahun_terbit, 
    GROUP_CONCAT(kategori_buku.nama_kategori SEPARATOR ", ") as kategori,
    detail_peminjaman.tanggal_pengembalian_real,
    detail_peminjaman.status');
		$this->db->from('peminjaman');
		$this->db->join('detail_peminjaman', 'detail_peminjaman.id_peminjaman = peminjaman.id_peminjaman');
		$this->db->join('buku', 'buku.id_buku = detail_peminjaman.id_buku');
		$this->db->join('kategori_buku_relasi', 'kategori_buku_relasi.id_buku = buku.id_buku', 'left');
		$this->db->join('kategori_buku', 'kategori_buku.id_kategori = kategori_buku_relasi.id_kategori', 'left');
		$this->db->where('peminjaman.id_user', $id);
		$this->db->where('detail_peminjaman.id_peminjaman', $idpeminjaman);
		$this->db->group_by('detail_peminjaman.id_detail_peminjaman');
		$peminjaman = $this->db->get()->result_array();


		$this->db->from('user');
		$this->db->where('id_user', $id);
		$user = $this->db->get()->row();

		$this->db->from('peminjaman');
		$this->db->join('detail_peminjaman', 'detail_peminjaman.id_peminjaman=peminjaman.id_peminjaman');
		$this->db->where('detail_peminjaman.id_peminjaman', $idpeminjaman);
		$detail = $this->db->get()->result_array();

		$data = array(
			'judul'            => 'E-Perpus📚',
			'kategori'         => $kategori,
			'user'             => $user,
			'peminjaman'       => $peminjaman,
			'detail'           => $detail,
		);

		$this->template->load('template_user', 'detail_peminjaman', $data);
	}

	public function pengembalian()
	{
		$id_peminjaman = $this->input->post('id_peminjaman');
		$tanggal_pengembalian_real = date('Y-m-d');

		if ($this->Beranda_model->kembalikan_buku($id_peminjaman, $tanggal_pengembalian_real)) {
			$this->session->set_flashdata('success', 'Buku berhasil dikembalikan.');
		} else {
			$this->session->set_flashdata('error', 'Pengembalian gagal.');
		}


		redirect('Beranda');
	}

	public function kritik_ulasan($id_buku)
	{
		$id_user = $this->session->userdata('id_user');
		$rating = $this->input->post('rating');
		$ulasan = $this->input->post('ulasan');

		$data = array(
			'id_user'  => $id_user,
			'id_buku'  => $id_buku,
			'rating'  => $rating,
			'ulasan'  => $ulasan,
		);

		$this->db->insert('ulasan_buku', $data);

		redirect('Beranda/pinjaman');
	}

	public function print($id_peminjaman)
	{
		$data = array(
			'judul'            => 'E-Perpus📚',
			'id_peminjaman' => $id_peminjaman,
		);
		$this->load->view('print', $data);
	}
}
