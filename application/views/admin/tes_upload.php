<form action="<?= url_upload('tes_upload') ?>" method="POST" enctype="multipart/form-data" id="form-upload">
	<input type="text" name="url_back" value="admin/pengaturan">
	<div class="form-group">
		<label>Tes Upload</label>
		<input type="file" class="form-control" name="gambar" id="gambar">
	</div>
	<button type="submit" class="btn btn-sm btn-success">Upload</button>
</form>

<script>
	$(document).ready(function () {
		$('#form-upload').on("submit", function(e) {
			e.preventDefault();
			$.ajax({
				url: $(this).attr("action"),
				type: $(this).attr("method"),
				data: new FormData(this),
				processData: false,
				contentType: false,
				success: function (data, status) {
					console.log(data);
				},
				error: function (xhr, desc, err) {
					console.log(desc);
				}
			});        
		});
	});
</script>