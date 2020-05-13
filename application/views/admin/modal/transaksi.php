<h5>Data Peserta</h5>
<table class="table">
	<tr>
		<td>ID Daftar</td>
		<td width="5%">:</td>
		<td><?= $res->id_daftar ?></td>
	</tr>
	<tr>
		<td>Nama Lengkap</td>
		<td>:</td>
		<td><?= $res->nm_lgkp ?></td>
	</tr>
	<tr>
		<td>No. HP</td>
		<td>:</td>
		<td><?= $res->no_hp ?></td>
	</tr>
	<tr>
		<td>Email</td>
		<td>:</td>
		<td><?= $res->email ?></td>
	</tr>
	<tr>
		<td>Status Pendaftaran</td>
		<td>:</td>
		<td><div class="badge badge-info"><?= $res->stts_daftar ?></div></td>
	</tr>
</table>
<hr>
<h5>Data Pendaftaran</h5>
<table class="table">
	<tr>
		<td>Paket :</td>
		<td class="bg-info"><?= $res->nm_paket ?></td>
		<td class="bg-warning"><?= $res->hrg_paket ?></td>
	</tr>
	<tr>
		<td colspan="2">Tanggal Daftar</td>
		<td class="bg-primary"><?= ubah_tanggal($res->tgl_daftar) ?></td>
	</tr>
	<tr>
		<td colspan="2">Tanggal Jemput</td>
		<td class="bg-primary"><?= ubah_tanggal($res->tgl_jemput) ?></td>
	</tr>
	<tr class="bg-success">
		<td>Alamat Penjemputan :</td>
		<td colspan="2"></td>
	</tr>
	<tr>
		<td colspan="3"><?= $res->titik_penjemputan ?></td>
	</tr>
</table>

<?php if ($res->sc_ktp !=null): ?>
<p>
	<label>Scan KTP</label>
	<img src="<?= site_url().'uploads/sc_ktp/'.$res->sc_ktp ?>" class="img-fluid">
</p>
<?php endif ?>

<?php if ($res->sc_sim !=null): ?>
<p>
	<label>Scan SIM</label>
	<img src="<?= site_url().'uploads/sc_sim/'.$res->sc_sim ?>" class="img-fluid">
</p>
<?php endif ?>

<?php if ($res->sc_bukti !=null): ?>
<p>
	<label>Bukti Pembayaran</label>
	<img src="<?= site_url().'uploads/sc_bukti/'.$res->sc_bukti ?>" class="img-fluid">
</p>
<?php endif ?>