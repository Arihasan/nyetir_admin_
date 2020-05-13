<style>
	* {
		font-family: sans-serif;
	}
</style>

<div>
	
	<h2>Invoice #<?= $res->id_daftar  ?></h2>
	<br>

	<table cellpadding="4">
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
	<table width="100%" cellspacing="0" cellpadding="4" border="1">
		<tr>
			<td width="30%">Paket :</td>
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
			<td colspan="2" style="text-overflow: all;"><?= $res->titik_penjemputan ?></td>
		</tr>
	</table>

	<br>
	<div>
		<?= $this->kodeqr->buatqr(site_url().'api/cetak/invoice/'.$res->id_daftar, $res->id_daftar); ?>
	</div>
	<div>
		<p>Dicetak pada <?= date('d-m-Y H:i:s') ?></p>
	</div>

</div>