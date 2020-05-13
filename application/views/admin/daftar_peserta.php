<div class="row">
	
	<div class="col-12">
		
		<div class="card">
			<div class="card-body">
				
				<table class="table" id="tabel">
					<thead>
						<tr>
							<th>No.</th>
							<th>NIK</th>
							<th>Nama Lengkap</th>
							<th>No. HP</th>
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

<!-- Modal -->
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
        <table class="table">
        	<tr>
        		<td>ID Peserta</td>
        		<td width="5%">:</td>
        		<td><span id="t_id_peserta"></span></td>
        	</tr>
        	<tr>
        		<td>NIK</td>
        		<td width="5%">:</td>
        		<td><span id="t_nik"></span></td>
        	</tr>
        	<tr>
        		<td>Nama Lengkap</td>
        		<td width="5%">:</td>
        		<td><span id="t_nm_lgkp"></span></td>
        	</tr>
        	<tr>
        		<td>No. HP</td>
        		<td width="5%">:</td>
        		<td><span id="t_no_hp"></span></td>
        	</tr>
        	<tr>
        		<td>Email</td>
        		<td width="5%">:</td>
        		<td><span id="t_email"></span></td>
        	</tr>
        	<tr>
        		<td>Alamat</td>
        		<td width="5%">:</td>
        		<td><span id="t_alamat"></span></td>
        	</tr>
        	<tr>
        		<td>Status</td>
        		<td width="5%">:</td>
        		<td><span id="t_stts_peserta"></span></td>
        	</tr>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script src="<?= site_url('aset/js/daftar_peserta.js') ?>"></script>
<script>
	$(document).ready(function () {
		
		DaftarPeserta.siteUrl = "<?= site_url() ?>";
		DaftarPeserta.init();

	});
</script>