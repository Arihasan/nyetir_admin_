<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminController extends CI_Controller {

	function __construct() 
	{
		parent::__construct();
		$this->load->model('api_model', 'AM');
		if (!$this->session->has_userdata('idadmin')) {
			$this->session->set_flashdata('pesan', pesan('Anda tidak memiliki sesi', 'danger'));
			redirect(site_url(),'refresh');
		}
	}

	public function profil()
	{
		$data['admin'] = $this->AM->loadData('t_admin', ['idadmin'=>$this->session->has_userdata('idadmin')])->row();
		$data['judul'] = 'Profil';
		$data['kode_menu'] = null;
		$data['konten'] = [
			'admin/profil',
		];
		$this->load->view('admin/template', $data);
	}

	// MENU
	public function index()
	{
		$data['jumlah'] = [
			'totalpeserta' => $this->AM->loadData('t_peserta')->num_rows(),
			'totalpesertaaktif' => $this->AM->loadData('t_peserta', ['stts_peserta'=>0])->num_rows(),
			'totalmetode' => $this->AM->loadData('t_metode')->num_rows(),
			'totalpaket' => $this->AM->loadData('t_paket')->num_rows(),
			'totaljemput' => $this->AM->loadData('t_penjemputan')->num_rows(),
			'totalpendaftaran' => $this->AM->loadData('t_pendaftaran')->num_rows(),
		];
		$data['judul'] = 'Dashboard';
		$data['kode_menu'] = 1;
		$data['konten'] = [
			'admin/dashboard',
		];
		$this->load->view('admin/template', $data);
	}

	public function daftar_peserta()
	{
		$data['judul'] = 'Daftar Peserta';
		$data['kode_menu'] = 2;
		$data['konten'] = [
			'admin/daftar_peserta',
		];
		$this->load->view('admin/template', $data);
	}

	public function daftar_paket()
	{
		$data['judul'] = 'Daftar Paket';
		$data['kode_menu'] = 3;
		$data['konten'] = [
			'admin/daftar_paket',
		];
		$this->load->view('admin/template', $data);
	}

	public function daftar_metode()
	{
		$data['judul'] = 'Daftar Metode';
		$data['kode_menu'] = 4;
		$data['konten'] = [
			'admin/daftar_metode',
		];
		$this->load->view('admin/template', $data);
	}

	public function daftar_jemput()
	{
		$data['judul'] = 'Daftar Penjemputan';
		$data['kode_menu'] = 5;
		$data['konten'] = [
			'admin/daftar_jemput',
		];
		$this->load->view('admin/template', $data);
	}

	public function daftar_transaksi()
	{
		$data['judul'] = 'Daftar Transaksi';
		$data['kode_menu'] = 6;
		$data['konten'] = [
			'admin/daftar_transaksi',
		];
		$this->load->view('admin/template', $data);
	}

	public function laporan_bulanan()
	{
		$data['judul'] = 'Laporan Bulanan';
		$data['kode_menu'] = 7;
		$data['konten'] = [
			'admin/laporan/bulanan',
		];
		$this->load->view('admin/template', $data);
	}

	public function pengaturan()
	{
		$data['judul'] = 'Pengaturan';
		$data['kode_menu'] = 99;
		$data['konten'] = [
			'admin/pengaturan',
		];
		$this->load->view('admin/template', $data);
	}

	// AUTH
	public function keluar()
	{
		$this->session->unset_userdata('idadmin');
		$this->session->unset_userdata('nama_admin');
		redirect(site_url(),'refresh');
	}
	
}