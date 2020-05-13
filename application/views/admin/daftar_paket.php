<div class="row">
	
	<div class="col-12">
		
		<div class="card">
			<div class="card-body">

        <a href="<?= site_url('paket/tambah') ?>" class="btn btn-success btn-sm">Tambah</a>
				
				<table class="table" id="tabel">
					<thead>
						<tr>
							<th>No.</th>
							<th>Nama Paket</th>
							<th>Harga</th>
							<th>Status</th>
							<th>Pilihan</th>
						</tr>
					</thead>
					<tbody id="data-disini">
						<tr>
							<td colspan="5" align="center">Memuat Data .......</td>
						</tr>
					</tbody>
				</table>
				
			</div>
		</div>

	</div>

</div>

<!-- Modal Ket -->
<div class="modal fade bd-example-modal-lg" id="detail" tabindex="-1" role="dialog" aria-labelledby="detailLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="detailLabel">Detail</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p id="t_detail"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script defer src="<?= site_url('aset/js/daftar_paket.js') ?>"></script>
<script>
	$(document).ready(function () {
		
		DaftarPaket.siteUrl = "<?= site_url() ?>";
		DaftarPaket.init();

	});
</script>