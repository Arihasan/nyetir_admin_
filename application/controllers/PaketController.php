<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PaketController extends CI_Controller {

	function __construct() 
	{
		parent::__construct();
		$this->load->model('api_model', 'AM');
		if (!$this->session->has_userdata('idadmin')) {
			$this->session->set_flashdata('pesan', pesan('Anda tidak memiliki sesi', 'danger'));
			redirect(site_url(),'refresh');
		}
	}

	public function index()
	{
		$data['judul'] = 'Tambah Data Paket';
		$data['kode_menu'] = 3;
		$data['konten'] = [
			'admin/paket/tambah',
		];
		$this->load->view('admin/template', $data);
	}

	public function tambah()
	{
		$data = [
			'nm_paket' => $this->input->post('nm_paket'),
			'hrg_paket' => $this->input->post('hrg_paket'),
			'dtl_paket' => $this->input->post('dtl_paket', true),
			'stts_paket' => $this->input->post('stts_paket'),
		];
		$res = $this->AM->insertData('t_paket', $data);
		if ($res) {
			$this->session->set_flashdata('notif', [
				'teks' => 'Berhasil ditambah',
				'color' => 'success',
			]);
			redirect(site_url('admin/daftar_paket'),'refresh');
		}else{
			$this->session->set_flashdata('notif', [
				'teks' => 'Berhasil ditambah',
				'color' => 'danger',
			]);
			redirect(site_url('admin/daftar_paket'),'refresh');
		}
	}

	public function ubah($id)
	{
		$data['res'] = $this->AM->loadData('t_paket', ['id_paket'=>$id])->row();
		$data['judul'] = 'Ubah Data Paket #'.$id;
		$data['kode_menu'] = 3;
		$data['konten'] = [
			'admin/paket/ubah',
		];
		$this->load->view('admin/template', $data);
	}

	public function f_ubah()
	{
		$id = ['id_paket' => $this->input->post('id_paket')];
		$data = [
			'nm_paket' => $this->input->post('nm_paket'),
			'hrg_paket' => $this->input->post('hrg_paket'),
			'dtl_paket' => $this->input->post('dtl_paket', true),
			'stts_paket' => $this->input->post('stts_paket'),
		];
		$update = $this->AM->updateData('t_paket', $id, $data);
		if ($update) {
			$this->session->set_flashdata('notif', [
				'teks' => 'Berhasil diubah',
				'color' => 'success',
			]);
			redirect(site_url('admin/daftar_paket'),'refresh');
		}else{
			$this->session->set_flashdata('notif', [
				'teks' => 'Berhasil diubah',
				'color' => 'danger',
			]);
			redirect(site_url('admin/daftar_paket'),'refresh');
		}
	}

}