<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_model extends CI_Model {

	function __construct()
	{
		parent::__construct();

	}

	function id_peserta()
	{
		$now = date('Y-m-d');
		$res = $this->db->select("SUBSTR(MAX(id_peserta),10 ,4) as id")
									->from('t_peserta')
									->where('tgl_daftar', $now)
									->order_by('id_peserta', 'DESC')
									->limit(1)
									->get();
		$output = $this->autoTambah($res->row()->id, $res->num_rows());
		return 'P'.date('dmY').$output;
		// return $res->row();
	}

	function id_daftar()
	{
		$now = date('Y-m-d');
		$res = $this->db->select("SUBSTR(MAX(id_daftar),10 ,4) as id")
									->from('t_pendaftaran')
									->where("DATE(created_at) LIKE '$now' ")
									->order_by('id_daftar', 'DESC')
									->limit(1)
									->get();
		$output = $this->autoTambah($res->row()->id, $res->num_rows());
		return 'T'.date('dmY').$output;
		// return $res->row();
	}

	function autoTambah($id, $row)
	{
		$nomor = $id;
		$default = '0001';
		if ($row > 0) {
			$output = '';
			$nomor = ++$nomor;
			if ($nomor < 10) {$output = '000'.$nomor;}
				elseif ($nomor < 100) {$output = '00'.$nomor;}
				elseif ($nomor < 1000) {$output = '0'.$nomor;}
				else {$output = $nomor;}
			return $output;
		} else {
			return $default;
		}
	}

	function loadData($tabel=null, $where=null, $limit=null, $offset=null, $join=null, $order=null, $select=null)
	{
		if ($select != null) {
			$this->db->select($select);
		}else{
			$this->db->select('*');
		}
		
		$this->db->from($tabel);

		if ($join != null) {
			foreach ($join as $j) {
				$this->db->join($j['tabel'], $tabel.'.'.$j['kolom'].' = '.$j['tabel'].'.'.$j['kolom']);
			}
		}
		if ($where != null) {
			$this->db->where($where);
		}
		if ($order != null) {
			$this->db->order_by($order[0], $order[1]);
		}
		if ($limit != null) {
			$this->db->limit($limit);
		}
		if ($offset != null) {
			$offset = $offset*$limit;
			$this->db->offset($offset);
		}

		$res = $this->db->get();
		return $res;
	}

	function updateData($tabel, $kolomWhere, $data)
	{
		$this->db->where($kolomWhere);
		if ( $this->db->update($tabel, $data) ) {
			return true;
		}else{
			return false;
		}
	}

	function insertData($tabel, $data)
	{
		$res = $this->db->insert($tabel, $data);
		if ($res) {
			return true;
		}else{
			return false;
		}
	}

	function cekDaftarAkun($post)
	{
		$nik = $post['nik'];
		$no_hp = $post['no_hp'];
		$email = $post['email'];
		$q = "SELECT * FROM t_peserta WHERE nik LIKE '$nik' OR no_hp LIKE '$no_hp' OR email LIKE '$email' ";
		return $this->db->query($q)->num_rows();
		// return $this->db->like('nik', $post['nik'])
		// 								->like('no_hp', $post['no_hp'])
		// 								->like('email', $post['email'])
		// 								->get('t_peserta')->num_rows();
	}

	function uploadGambar($path, $name)
	{
		$setting['upload_path'] = './uploads/'.$path;
		$setting['allowed_types'] = 'jpg|jpeg|png';
		$setting['encrypt_name'] = TRUE;
		$setting['max_size']  = '5120';
		// $setting['max_width']  = '1024';
		// $setting['max_height']  = '768';
		$this->load->library('upload', $setting);
		$this->upload->initialize($setting);
		if (!$this->upload->do_upload($name)){
			return [
				400,
				$this->upload->display_errors(),
			];
		}
		else{
			// $this->resize($path.$this->upload->data('file_name'));
			return [
				200,
				$this->upload->data('full_path'),
				$this->upload->data('file_name'),
			];
		}
	}

	function resize($path)
	{
		$config['image_library'] = 'gd2';
		$config['source_image'] = './uploads/'.$path;
		$config['create_thumb'] = FALSE;
		$config['maintain_ratio'] = TRUE;
		$config['width']         = 800;
		$config['height']       = 600;
		$this->load->library('image_lib', $config);
		$this->image_lib->resize();
	}

}