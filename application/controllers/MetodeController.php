<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MetodeController extends CI_Controller {

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
		$data['judul'] = 'Tambah Data Metode';
		$data['kode_menu'] = 4;
		$data['konten'] = [
			'admin/metode/tambah',
		];
		$this->load->view('admin/template', $data);
	}

	public function tambah()
	{
		$data = [
			'nm_metode' => $this->input->post('nm_metode'),
			'kode' => $this->input->post('kode'),
			'jns_metode' => $this->input->post('jns_metode'),
			'ket' => $this->input->post('ket', true),
			'stts_metode' => $this->input->post('stts_metode'),
		];
		$res = $this->AM->insertData('t_metode', $data);
		if ($res) {
			$this->session->set_flashdata('notif', [
				'teks' => 'Berhasil ditambah',
				'color' => 'success',
			]);
			redirect(site_url('admin/daftar_metode'),'refresh');
		}else{
			$this->session->set_flashdata('notif', [
				'teks' => 'Berhasil ditambah',
				'color' => 'danger',
			]);
			redirect(site_url('admin/daftar_metode'),'refresh');
		}
	}

	public function ubah($id)
	{
		$data['res'] = $this->AM->loadData('t_metode', ['id_metode'=>$id])->row();
		$data['judul'] = 'Ubah Data Metode #'.$id;
		$data['kode_menu'] = 4;
		$data['konten'] = [
			'admin/metode/ubah',
		];
		$this->load->view('admin/template', $data);
	}

	public function f_ubah()
	{
		$id = ['id_metode' => $this->input->post('id_metode')];
		$data = [
			'nm_metode' => $this->input->post('nm_metode'),
			'kode' => $this->input->post('kode'),
			'jns_metode' => $this->input->post('jns_metode'),
			'ket' => $this->input->post('ket', true),
			'stts_metode' => $this->input->post('stts_metode'),
		];
		$update = $this->AM->updateData('t_metode', $id, $data);
		if ($update) {
			$this->session->set_flashdata('notif', [
				'teks' => 'Berhasil diubah',
				'color' => 'success',
			]);
			redirect(site_url('admin/daftar_metode'),'refresh');
		}else{
			$this->session->set_flashdata('notif', [
				'teks' => 'Berhasil diubah',
				'color' => 'danger',
			]);
			redirect(site_url('admin/daftar_metode'),'refresh');
		}
	}

}