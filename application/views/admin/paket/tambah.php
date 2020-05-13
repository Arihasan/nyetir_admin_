<div class="row">
	
	<div class="col-12">
		
		<div class="card">
			<div class="card-body">
				
				<form action="<?= site_url('paket/tambah') ?>" method="POST">
					<div class="form-group">
						<label>Nama Paket</label>
						<input type="text" class="form-control" name="nm_paket">
					</div>
					<div class="form-group">
						<label>Harga</label>
						<input type="number" class="form-control" name="hrg_paket">
					</div>
					<div class="form-group">
						<label>Detail</label>
						<textarea name="dtl_paket" id="detail"></textarea>
					</div>
					<div class="form-group">
						<label>Status</label>
						<select name="stts_paket" class="form-control">
						<?php foreach (status() as $k => $v): ?>
								<option value="<?= $k ?>"><?= $v ?></option>
							<?php endforeach ?>
						</select>
					</div>
					<button type="submit" class="btn btn-success btn-sm">Simpan</button>
          <a href="<?= site_url('admin/daftar_paket') ?>" class="btn btn-danger btn-sm">Kembali</a>
				</form>
				
			</div>
		</div>

	</div>

</div>

<script>
	$(document).ready(function () {
		
		$('#detail').summernote({
			height: '400px',
			toolbar: [
		    ['style', ['bold', 'italic', 'underline', 'clear']],
		    ['fontStyle', ['fontname']],
		    ['font', ['strikethrough', 'superscript', 'subscript']],
		    ['fontsize', ['fontsize']],
		    ['color', ['color']],
		    ['para', ['ul', 'ol']],
		    ['height', ['height']],
		    ['misc', ['undo', 'redo']],
		  ]
		});

	});
</script>