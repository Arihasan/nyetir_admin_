<?php

function pesan($teks, $tipe='default')
{
	return "<div class='alert alert-$tipe'>$teks</div>";
}

function jenis_metode($param=null)
{
	$res = [
		0 => 'Bank',
		1 => 'Lainnya',
	];
	return $param == null ? $res : $res[$param];
}

function status($param=null)
{
	$res = [
		0 => 'Aktif',
		1 => 'Non-Aktif',
	];
	return $param == null ? $res : $res[$param];
}

function status_pendaftaran($param=null)
{
	$res = [
		0 => 'Menunggu Pembayaran',
		1 => 'Menunggu Verifikasi',
		2 => 'Pembayaran Berhasil',
		3 => 'Menunggu Jadwal',
	];
	return $param == null ? $res : $res[$param];
}

function ubah_tanggal($tgl)
{
	$tgl = explode("-", $tgl);
	return $tgl[2].'-'.$tgl[1].'-'.$tgl[0];
}

function kerupiah($angka)
{
	return 'Rp. '.strrev(implode('.',str_split(strrev(strval($angka)),3)));
}

function keangka($rupiah)
{
	return intval(preg_replace('/,.*|[^0-9]/', '', $rupiah));
}