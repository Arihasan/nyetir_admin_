<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ErrController extends CI_Controller {

	public function index()
	{
		$this->load->view('errors/err_404');
	}

}