<div class="row">
	
	<div class="col-12">
		
		<div class="card">
			<div class="card-body">

        <a href="<?= site_url('jemput/tambah') ?>" class="btn btn-success btn-sm">Tambah</a>
				
				<table class="table" id="tabel">
					<thead>
						<tr>
							<th>No.</th>
							<th>Titik Penjemputan</th>
							<th>Pilihan</th>
						</tr>
					</thead>
					<tbody id="data-disini">
						<tr>
							<td colspan="3" align="center">Memuat Data .......</td>
						</tr>
					</tbody>
				</table>
				
			</div>
		</div>

	</div>

</div>

<script defer src="<?= site_url('aset/js/daftar_jemput.js') ?>"></script>
<script>
	$(document).ready(function () {
		
		DaftarJemput.siteUrl = "<?= site_url() ?>";
		DaftarJemput.init();

	});
</script>