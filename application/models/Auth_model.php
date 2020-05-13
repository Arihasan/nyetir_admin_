<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

	function __construct()
	{
		parent::__construct();

	}

	function auth($post)
	{
		$res = $this->db->get_where('t_admin', [
			'username' => $post['username'],
			'sandi' => md5($post['sandi']),
		]);
		if ($res->num_rows() > 0) {
			return [
				'status' => true,
				'data' => $res->row(),
			];
		}else{
			return [
				'status' => false,
			];
		}
	}

}