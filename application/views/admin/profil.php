<div class="row">
	
	<div class="col-4">
		
		<div class="card card-user">
			<div class="card-header">
				<h5 class="card-title">Detail</h5>
			</div>
			<div class="card-body">
				<form action="" method="POST">
					<div class="form-group">
						<label>Nama Admin</label>
						<input type="text" class="form-control w-100" value="<?= $admin->nama_admin ?>" readonly>
					</div>
					<div class="form-group">
						<label>Username</label>
						<input type="text" class="form-control w-100" value="<?= $admin->username ?>" readonly>
					</div>
					<div class="form-group">
						<label>Status</label>
						<input type="text" class="form-control w-100" value="<?= status($admin->stts_admin) ?>" readonly>
					</div>
				</form>
			</div>
		</div>

	</div>

</div>