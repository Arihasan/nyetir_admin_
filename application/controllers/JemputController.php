<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JemputController extends CI_Controller {

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
		$data['judul'] = 'Tambah Data Penjemputan';
		$data['kode_menu'] = 5;
		$data['konten'] = [
			'admin/jemput/tambah',
		];
		$this->load->view('admin/template', $data);
	}

	public function tambah()
	{
		$data = [
			'penjemputan' => $this->input->post('penjemputan', true),
		];
		$res = $this->AM->insertData('t_penjemputan', $data);
		if ($res) {
			$this->session->set_flashdata('notif', [
				'teks' => 'Berhasil ditambah',
				'color' => 'success',
			]);
			redirect(site_url('admin/daftar_jemput'),'refresh');
		}else{
			$this->session->set_flashdata('notif', [
				'teks' => 'Berhasil ditambah',
				'color' => 'danger',
			]);
			redirect(site_url('admin/daftar_jemput'),'refresh');
		}
	}

	public function ubah($id)
	{
		$data['res'] = $this->AM->loadData('t_penjemputan', ['id_jemput'=>$id])->row();
		$data['judul'] = 'Ubah Data Penjemputan #'.$id;
		$data['kode_menu'] = 5;
		$data['konten'] = [
			'admin/jemput/ubah',
		];
		$this->load->view('admin/template', $data);
	}

	public function f_ubah()
	{
		$id = ['id_jemput' => $this->input->post('id_jemput')];
		$data = [
			'penjemputan' => $this->input->post('penjemputan', true),
		];
		$update = $this->AM->updateData('t_penjemputan', $id, $data);
		if ($update) {
			$this->session->set_flashdata('notif', [
				'teks' => 'Berhasil diubah',
				'color' => 'success',
			]);
			redirect(site_url('admin/daftar_jemput'),'refresh');
		}else{
			$this->session->set_flashdata('notif', [
				'teks' => 'Berhasil diubah',
				'color' => 'danger',
			]);
			redirect(site_url('admin/daftar_jemput'),'refresh');
		}
	}

}