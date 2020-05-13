<div class="row">
	
	<div class="col-12">
		
		<div class="card">
			<div class="card-body">
				
				<form action="<?= site_url('jemput/ubah') ?>" method="POST">
					<input type="hidden" class="form-control" name="id_jemput" value="<?= $res->id_jemput ?>">
					<div class="form-group">
						<label>Titik Penjemputan</label>
						<textarea class="form-control" id="penjemputan" name="penjemputan" rows="6"><?= $res->penjemputan ?></textarea>
					</div>
					<button type="submit" class="btn btn-success btn-sm">Simpan</button>
          <a href="<?= site_url('admin/daftar_jemput') ?>" class="btn btn-danger btn-sm">Kembali</a>
				</form>
				
			</div>
		</div>

	</div>

</div>

<script>
	$(document).ready(function () {
		
		$('#penjemputan').summernote({
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