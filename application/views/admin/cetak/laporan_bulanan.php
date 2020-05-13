<style>
	* {
		font-family: sans-serif;
	}
	table th, table td{
		border: 1px solid black;
	}
</style>

<div>

<?php if ($res != null){ ?>
		
	<h2>Laporan bulan ke-<?= $bulan ?> tahun <?= $tahun ?></h2>
	<br>

	<table cellpadding="4" cellspacing="0" width="100%">
		<thead>
			<tr>
				<th>No.</th>
				<th>ID Daftar</th>
				<th>Nama Peserta</th>
				<th>Nama Paket</th>
				<th>Total</th>
			</tr>
		</thead>
		<tbody>
			<?php $total=0; $no=1; foreach ($res as $r) { ?>
			<tr>
				<td><?= $no ?></td>
				<td><?= $r->id_daftar ?></td>
				<td><?= $r->nm_lgkp ?></td>
				<td><?= $r->nm_paket ?></td>
				<td><?= kerupiah($r->hrg_paket) ?></td>
			</tr>
			<?php $no++; $total+= $r->hrg_paket; } ?>
		</tbody>
		<tfoot>
			<tr>
				<td colspan="4" align="center">Total</td>
				<td><?= kerupiah($total) ?></td>
			</tr>
		</tfoot>
	</table>

<?php }else{ ?>

	<h2>Tidak ada data pada bulan ke-<?= $bulan ?> tahun <?= $tahun ?></h2>

<?php } ?>

</div>