<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kodeqr
{
	protected $ci;

	public function __construct()
	{
        $this->ci =& get_instance();
	}

	public function buatqr($teks='', $id_daftar=''){
		include "phpqrcode-master/qrlib.php";

		QRCode::png($teks, 'uploads/qr_code/'.$id_daftar.'.png', 'H', '5');

		return '<img src="./uploads/qr_code/'.$id_daftar.'.png" width="20%" >';
	}
	

}