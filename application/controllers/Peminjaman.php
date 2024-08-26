<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Peminjaman extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Peminjaman_model');
		if ($this->session->userdata('level') == 'peminjam') {
			redirect('Beranda');
		} elseif ($this->session->userdata('id_user') == NULL) {
			redirect('Beranda');
		}
	}

	public function index()
	{
		$this->db->from('peminjaman');
		$this->db->join('user', 'user.id_user=peminjaman.id_user');
		$this->db->order_by('id_peminjaman', 'DESC');
		$peminjaman = $this->db->get()->result_array();

		$this->db->from('user');
		$user = $this->db->get()->result_array();

		$this->db->from('peminjaman');
		$this->db->join('user', 'user.id_user=peminjaman.id_user');
		$this->db->join('detail_peminjaman', 'detail_peminjaman.id_peminjaman=peminjaman.id_peminjaman');
		$this->db->join('buku', 'buku.id_buku=detail_peminjaman.id_buku');
		$detail_peminjaman = $this->db->get()->result_array();

		$data = array(
			'judul' 				=> 'E-Perpus || Peminjaman',
			'peminjaman'  			=> $peminjaman,
			'user'  				=> $user,
			'detail_peminjaman'  	=> $detail_peminjaman,
		);

		$this->template->load('template_admin', 'Admin/peminjaman', $data);
	}


	public function RiwayatPeminjaman()
	{
		$this->db->from('peminjaman');
		$this->db->join('user', 'user.id_user=peminjaman.id_user');
		$this->db->order_by('id_peminjaman', 'DESC');
		$peminjaman = $this->db->get()->result_array();

		$this->db->from('user');
		$user = $this->db->get()->result_array();

		$this->db->from('peminjaman');
		$this->db->join('user', 'user.id_user=peminjaman.id_user');
		$this->db->join('detail_peminjaman', 'detail_peminjaman.id_peminjaman=peminjaman.id_peminjaman');
		$this->db->join('buku', 'buku.id_buku=detail_peminjaman.id_buku');
		$detail_peminjaman = $this->db->get()->result_array();

		$data = array(
			'judul' 				=> 'E-Perpus || Peminjaman',
			'peminjaman'  			=> $peminjaman,
			'user'  				=> $user,
			'detail_peminjaman'  	=> $detail_peminjaman,
		);

		$this->template->load('template_admin', 'Admin/riwayat_peminjaman', $data);
	}

	public function laporan()
	{
		$startdate = $this->input->post('start_date');
		$enddate = $this->input->post('end_date');
		$status = $this->input->post('status');
		$user = $this->input->post('user');

		$start_date = date('Ymd', strtotime($startdate));
		$end_date = date('Ymd', strtotime($enddate));

		if ($status == '*' && $user == '*') {
			$peminjaman = $this->Peminjaman_model->get_data_by_date_range_all($start_date, $end_date);
		} elseif ($status == '*') {
			$peminjaman = $this->Peminjaman_model->get_data_by_date_range_user($start_date, $end_date, $user);
		} elseif ($user == '*') {
			$peminjaman = $this->Peminjaman_model->get_data_by_date_range($start_date, $end_date, $status);
		} else {
			$peminjaman = $this->Peminjaman_model->get_data_by_date_range_user_status($start_date, $end_date, $user, $status);
		}

		$laporan = 'TANGGAL ' . $startdate . ' SAMPAI ' . $enddate;

		$data = array(
			'judul' 				=> 'E-Perpus || Laporan',
			'peminjaman'  			=> $peminjaman,
			'laporan' 				=> $laporan,
		);

		$this->load->view('print', $data);
	}

	public function updatestatus($id)
	{
		$where = array(
			'id_detail_peminjaman' => $id,
		);
		if ('status' == 'Ditinjau') {
			$status = 'Ditinjau';
		} else {
			$status = 'Dipinjam';
		}
		$update = array(
			'status' => $status,
		);

		$this->db->update('detail_peminjaman', $update, $where);
		redirect('Peminjaman');
	}

	public function updatestatusselesai($id)
	{
		$where = array(
			'id_detail_peminjaman' => $id,
		);

		if ('status' == 'Dipinjam') {
			$status = 'Dipinjam';
		} else {
			$status = 'Dikembalikan';
		}

		$update = array(
			'status' => $status,
		);

		$this->db->update('detail_peminjaman', $update, $where);
		redirect('Peminjaman');
	}

	public function updatestatuse($id)
	{
		$where = array(
			'id_detail_peminjaman' => $id,
		);

		if ('status' == 'Dikembalikan') {
			$status = 'Dikembalikan';
		} else {
			$status = 'Ditinjau';
		}

		$update = array(
			'status' => $status,
		);

		$this->db->update('detail_peminjaman', $update, $where);
		redirect('Peminjaman');
	}

	public function tolakstatus($id)
	{
		$where = array(
			'id_detail_peminjaman' => $id,
		);

		$update = array(
			'status' => 'Ditolak',
		);

		$this->db->update('detail_peminjaman', $update, $where);
		redirect('Peminjaman');
	}
}
