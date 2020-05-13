<div class="row">
	
	<div class="col-md-12">
		
		<div class="card">
			<div class="card-body">
				
				<form target="_blank" action="<?= site_url('api/export/bulanan') ?>" method="POST">
					<div class="form-group">
						<label>Bulan</label>
						<select name="bulan" id="bulan" class="form-control" required>
							<option value="">-- Pilih --</option>
							<option value="01">Januari</option>
							<option value="02">Februari</option>
							<option value="03">Maret</option>
							<option value="04">April</option>
							<option value="05">Mei</option>
							<option value="06">Juni</option>
							<option value="07">Juli</option>
							<option value="08">Agustus</option>
							<option value="09">September</option>
							<option value="10">Oktober</option>
							<option value="11">November</option>
							<option value="12">Desember</option>
						</select>
					</div>
					<div class="form-group">
						<label>Tahun</label>
						<select name="tahun" id="tahun" class="form-control" required>
							<option value="">-- Pilih --</option>
							<option value="2020">2020</option>
							<option value="2021">2021</option>
						</select>
					</div>
					<button type="submit" class="btn btn-success">Cetak</button>
				</form>

			</div>
		</div>

	</div>

</div>