<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ApiController extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('api_model', 'AM');
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Headers: *");
    header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
	}

	public function index()
	{
		echo "ILLEGAL AKSES";
	}

	// TESTING
	public function cek_id_tambah()
	{
		$res = $this->AM->id_peserta();
		echo json_encode($res);
	}

	// FUNGSI
	function filterPeserta($data)
	{
		foreach ($data as $d) {
			$d->stts_peserta = status($d->stts_peserta);
		}
		return $data;
	}
	function filterAdmin($data)
	{
		foreach ($data as $d) {
			$d->stts_admin = status($d->stts_admin);
		}
		return $data;
	}
	function filterPaket($data)
	{
		foreach ($data as $d) {
			$d->stts_paket = status($d->stts_paket);
		}
		return $data;
	}
	function filterMetode($data)
	{
		foreach ($data as $d) {
			$d->jns_metode = jenis_metode($d->jns_metode);
			$d->stts_metode = status($d->stts_metode);
		}
		return $data;
	}
	function filterPendaftaran($data)
	{
		foreach ($data as $d) {
			$d->stts_peserta = status($d->stts_peserta);
			$d->stts_paket = status($d->stts_paket);
			$d->jns_metode = jenis_metode($d->jns_metode);
			$d->stts_metode = status($d->stts_metode);
			$d->hrg_paket = kerupiah($d->hrg_paket);
			$d->tgl_daftar = ubah_tanggal($d->tgl_daftar);
			$d->tgl_jemput = ubah_tanggal($d->tgl_jemput);
		}
		return $data;
	}

	function pendaftaranDetail($data)
	{
		$data->stts_daftar = status_pendaftaran($data->stts_daftar);
		$data->stts_peserta = status($data->stts_peserta);
		$data->stts_paket = status($data->stts_paket);
		$data->jns_metode = jenis_metode($data->jns_metode);
		$data->stts_metode = status($data->stts_metode);
		if ($data->penjemputan != 0) {
			$penjemputan = $this->AM->loadData('t_penjemputan', ['id_jemput'=>$data->penjemputan])->row()->penjemputan;
			$data->titik_penjemputan = $penjemputan;
		}else{
			$data->titik_penjemputan = $data->alamat;
		}
		$data->hrg_paket = kerupiah($data->hrg_paket);
		return $data;
	}

	function filterLaporan($data)
	{
		foreach ($data as $d) {
			$d->stts_daftar = status_pendaftaran($d->stts_daftar);
		}
		return $data;
	}

	// JSON
	public function ambilDataAdmin()
	{
		$id = isset($_POST) ? $this->input->post('idadmin') : null;
		$result = null;

		$where = $id != null ? ['idadmin' => $id] : null;
		$res = $this->AM->loadData('t_admin', $where)->row();
		$result['data'] = $this->filterAdmin($res);
		
		$this->output->set_content_type('application/json')->set_output(json_encode($result));
	}

	public function ambilDataPeserta()
	{
		$id = isset($_POST) ? $this->input->post('id_peserta') : null;
		$result = null;

		$where = $id != null ? ['id_peserta' => $id] : null;
		$res = $this->AM->loadData('t_peserta', $where)->result();
		$result['data'] = $this->filterPeserta($res);

		$this->output->set_content_type('application/json')->set_output(json_encode($result));
	}

	public function ambilDataPaket()
	{
		$id = isset($_POST) ? $this->input->post('id_paket') : null;
		$result = null;

		$where = $id != null ? ['id_paket' => $id] : null;
		$res = $this->AM->loadData('t_paket', $where)->result();
		$result['data'] = $this->filterPaket($res);

		$this->output->set_content_type('application/json')->set_output(json_encode($result));
	}

	public function ambilDataMetode()
	{
		$id = isset($_POST) ? $this->input->post('id_metode') : null;
		$result = null;

		$where = $id != null ? ['id_metode' => $id] : null;
		$res = $this->AM->loadData('t_metode', $where)->result();
		$result['data'] = $this->filterMetode($res);

		$this->output->set_content_type('application/json')->set_output(json_encode($result));
	}

	public function ambilDataJemput()
	{
		$id = isset($_POST) ? $this->input->post('id_jemput') : null;
		$result = null;

		$where = $id != null ? ['id_jemput' => $id] : null;
		$res = $this->AM->loadData('t_penjemputan', $where)->result();
		$result['data'] = $res;

		$this->output->set_content_type('application/json')->set_output(json_encode($result));
	}

	public function ambilDataPendaftaran()
	{
		$id = isset($_POST) ? $this->input->post('id_daftar') : null;
		$result = null;
		
		$where = $id != null ? ['id_daftar' => $id] : null;
		$res = $this->AM->loadData(
			't_pendaftaran',
			$where,
			null,
			null,
			[
				[
					'tabel' => 't_peserta',
					'kolom' => 'id_peserta',
				],
				[
					'tabel' => 't_paket',
					'kolom' => 'id_paket',
				],
				[
					'tabel' => 't_metode',
					'kolom' => 'id_metode',
				],
				[
					'tabel' => 't_jenis_mobil',
					'kolom' => 'id_jenis',
				],
			]
		)->result();
		// filter
		$result['data'] = $this->filterPendaftaran($res);

		$this->output->set_content_type('application/json')->set_output(json_encode($result));
	}

	public function ambilDataPendaftaranDetail()
	{
		$id = isset($_POST) ? $this->input->post('id_daftar') : null;
		if ($id != null) {
			$res = $this->AM->loadData(
				't_pendaftaran',
				['id_daftar' => $id],
				null,
				null,
				[
					[
						'tabel' => 't_peserta',
						'kolom' => 'id_peserta',
					],
					[
						'tabel' => 't_paket',
						'kolom' => 'id_paket',
					],
					[
						'tabel' => 't_metode',
						'kolom' => 'id_metode',
					],
					[
						'tabel' => 't_jenis_mobil',
						'kolom' => 'id_jenis',
					],
				]
			)->row();
			// filter
			$data['res'] = $this->pendaftaranDetail($res);
		}else{
			$data['res'] = null;
		}
		$this->load->view('admin/modal/transaksi', $data);
	}

	public function upload_sc_sim()
	{
		$url = isset($_POST) ? $this->input->post('url_back') : null;
		$res = $this->AM->uploadGambar('sc_sim/', 'sc_sim');
		if ($url != null) {
			redirect($url,'refresh');
		}else{
			$this->output->set_content_type('application/json')->set_output(json_encode($res));
		}
	}

	public function upload_sc_ktp()
	{
		$url = isset($_POST) ? $this->input->post('url_back') : null;
		$res = $this->AM->uploadGambar('sc_ktp/', 'sc_ktp');
		if ($url != null) {
			redirect($url,'refresh');
		}else{
			$this->output->set_content_type('application/json')->set_output(json_encode($res));
		}
	}

	public function upload_sc_bukti()
	{
		$id = $this->input->post('id_daftar');
		$sc_bukti = $this->AM->uploadGambar('sc_bukti/', 'sc_bukti');
		if ($sc_bukti[0] === 200) {
			$update = $this->AM->updateData('t_pendaftaran', ['id_daftar'=>$id], [
				'sc_bukti' => $sc_bukti[2],
				'stts_daftar' => 1,
			]);
			if ($update) {
				$result = [
					'status' => $sc_bukti[0],
					'teks' => 'Berhasil upload',
				];
			}else{
				$result = [
					'status' => 500,
					'teks' => 'Terjadi kesalahan pada sistem',
				];
			}
		}else{
			$result = [
				'status' => $sc_bukti[0],
				'teks' => $sc_bukti[1],
			];
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($result));
	}

	public function pendaftaran__()
	{
		// $this->output->set_content_type('application/json')->set_output(json_encode($_POST));
		$this->output->set_content_type('application/json')->set_output(json_encode($_FILES));
	}

	public function pendaftaran()
	{
		$data['id_daftar'] = $this->AM->id_daftar();
		$data['id_peserta'] = $this->input->post('id_peserta');
		$data['id_paket'] = $this->input->post('id_paket');
		$data['id_metode'] = $this->input->post('id_metode');
		$data['id_jenis'] = $this->input->post('id_jenis');
		$data['tgl_daftar'] = date('Y-m-d');
		$data['tgl_jemput'] = $this->input->post('tgl_jemput');
		$data['penjemputan'] = $this->input->post('penjemputan');

		// UPLOAD SC SIM
		$sc_sim = $this->AM->uploadGambar('sc_sim/', 'sc_sim');
		if ($sc_sim[0] === 200) {
			$data['sc_sim'] = $sc_sim[2];
		}else{
			$result = [
				'status' => $sc_sim[0],
				'teks' => $sc_sim[1],
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($result));
			return;
		}

		// UPLOAD SC KTP
		$sc_ktp = $this->AM->uploadGambar('sc_ktp/', 'sc_ktp');
		if ($sc_ktp[0] === 200) {
			$data['sc_ktp'] = $sc_ktp[2];
		}else{
			$result = [
				'status' => $sc_ktp[0],
				'teks' => $sc_ktp[1],
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($result));
			return;
		}

		$insert = $this->AM->insertData('t_pendaftaran', $data);
		if ($insert) {
			$result = [
				'status' => 201,
				'teks' => "Berhasil mendaftar",
				'data' => $data,
			];
		}else{
			$result = [
				'status' => 500,
				'teks' => "Coba kembali beberapa saat lagi",
				'data' => null,
			];
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($result));
	}

	public function daftar_akun()
	{
		$data['id_peserta'] = $this->AM->id_peserta();
		$data['nik'] = $this->input->post('nik');
		$data['nm_lgkp'] = $this->input->post('nm_lgkp');
		$data['no_hp'] = $this->input->post('no_hp');
		$data['email'] = $this->input->post('email');
		$data['alamat'] = $this->input->post('alamat');
		$data['sandi'] = md5($this->input->post('sandi'));
		$data['tgl_daftar'] = date('Y-m-d');

		$cek = $this->AM->cekDaftarAkun($this->input->post());

		if ($cek == 0) {

			// UPLOAD SC SIM
			// $sc_sim = $this->AM->uploadGambar('sc_sim/', 'sc_sim');
			// if ($sc_sim[0] === 200) {
			// 	$data['sc_sim'] = $sc_sim[2];
			// }else{
			// 	$result = [
			// 		'status' => $sc_sim[0],
			// 		'teks' => $sc_sim[1],
			// 		'data' => null,
			// 	];
			// 	$this->output->set_content_type('application/json')->set_output(json_encode($result));
			// 	return;
			// }

			// UPLOAD SC KTP
			// $sc_ktp = $this->AM->uploadGambar('sc_ktp/', 'sc_ktp');
			// if ($sc_ktp[0] === 200) {
			// 	$data['sc_ktp'] = $sc_ktp[2];
			// }else{
			// 	$result = [
			// 		'status' => $sc_ktp[0],
			// 		'teks' => $sc_ktp[1],
			// 		'data' => null,
			// 	];
			// 	$this->output->set_content_type('application/json')->set_output(json_encode($result));
			// 	return;
			// }

			$insert = $this->AM->insertData('t_peserta', $data);
			if ($insert) {
				$result = [
					'status' => 201,
					'teks' => "Berhasil mendaftar",
					'data' => $data,
				];
			}else{
				$result = [
					'status' => 500,
					'teks' => "Coba kembali beberapa saat lagi",
					'data' => null,
				];
			}
		}else{
			$result = [
				'status' => 400,
				'teks' => "NIK/No. HP/Email telah dipakai",
				'data' => null,
			];
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($result));
	}

	public function invoice($id_daftar=null)
	{
		$this->load->library('pdf');
		if ($id_daftar != null) {
			$res = $this->AM->loadData(
				't_pendaftaran',
				['id_daftar' => $id_daftar],
				null,
				null,
				[
					[
						'tabel' => 't_peserta',
						'kolom' => 'id_peserta',
					],
					[
						'tabel' => 't_paket',
						'kolom' => 'id_paket',
					],
					[
						'tabel' => 't_metode',
						'kolom' => 'id_metode',
					],
					[
						'tabel' => 't_jenis_mobil',
						'kolom' => 'id_jenis',
					],
				]
			)->row();
			// filter
			$data['res'] = $this->pendaftaranDetail($res);
			// $this->load->view('admin/cetak/invoice', $data);
			$html = $this->load->view('admin/cetak/invoice', $data, true);
			$this->pdf->generate($html, $id_daftar, 'A4', 'landscape');
		}else{
			return null;
		}
	}

	public function ambilLaporanBulanan__()
	{
		$result = [
			'bulan' => $this->input->post('bulan'),
			'tahun' => $this->input->post('tahun'),
		];
		$this->output->set_content_type('application/json')->set_output(json_encode($result));
	}

	public function ambilLaporanBulanan()
	{
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');
		$this->load->library('pdf');
		$res = $this->AM->loadData(
			't_pendaftaran',
			[
				'stts_daftar' => 3,
				'MONTH(DATE(updated_at))' => $bulan,
				'YEAR(DATE(updated_at))' => $tahun,
			],
			null,
			null,
			[
				[
					'tabel' => 't_peserta',
					'kolom' => 'id_peserta',
				],
				[
					'tabel' => 't_paket',
					'kolom' => 'id_paket',
				],
			]
		);
		$data['bulan'] = $bulan;
		$data['tahun'] = $tahun;
		if ($res->num_rows() > 0) {
			// filter
			$data['res'] = $res->result();
		}else{
			$data['res'] = null;
		}
		// $this->load->view('admin/cetak/laporan_bulanan', $data);
		$html = $this->load->view('admin/cetak/laporan_bulanan', $data, true);
		$this->pdf->generate($html, $bulan.'-'.$tahun, 'A4', 'landscape');
	}

}