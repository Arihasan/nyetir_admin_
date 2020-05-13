<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PendaftaranController extends CI_Controller {

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
		
	}

	public function verifikasi($status)
	{
		$id = isset($_POST) ? $this->input->post('id_daftar') : null;
		$result = null;
		if ($id != null) {
			$res = $this->AM->updateData('t_pendaftaran', ['id_daftar'=>$id], [
				'idadmin' => $this->session->userdata('idadmin'),
				'stts_daftar' => $status,
			]);
			$result = $res ? ['status'=>202] : ['status'=>406];
		}else{
			$result = ['status'=>400];
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($result));
	}

	public function batalkan()
	{
		$id = isset($_POST) ? $this->input->post('id_daftar') : null;
		$result = null;
		if ($id != null) {
			$res = $this->AM->updateData('t_pendaftaran', ['id_daftar'=>$id], [
				'idadmin' => $this->session->userdata('idadmin'),
				'sc_bukti' => null,
				'stts_daftar' => 0,
			]);
			$result = $res ? ['status'=>202] : ['status'=>406];
		}else{
			$result = ['status'=>400];
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($result));
	}

}