<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthController extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('auth_model', 'AM');
		if ($this->session->has_userdata('idadmin')) {
			$this->session->set_flashdata('notif', [
				'teks' => 'Anda memiliki sesi',
				'color' => 'warning',
			]);
			redirect(site_url('admin'),'refresh');
		}
	}

	public function index()
	{
		$data['judul'] = 'Masuk';
		$this->load->view('admin/auth/masuk', $data);
	}

	public function masuk()
	{
		$res = $this->AM->auth($this->input->post());
		if ($res['status']) {
			$sesi = [
				'idadmin' => $res['data']->idadmin,
				'nama_admin' => $res['data']->nama_admin,
			];
			$this->session->set_userdata($sesi);

			$this->session->set_flashdata('notif', [
				'teks' => 'Selamat datang '.$res['data']->nama_admin,
				'color' => 'info',
			]);
			redirect(site_url('admin'),'refresh');
		}else{
			$this->session->set_flashdata('pesan', pesan('Username atau kata sandi salah', 'danger'));
			redirect(site_url(),'refresh');
		}
	}

}