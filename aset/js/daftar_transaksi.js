var DaftarTransaksi = function () {
	
	var siteurl = "";
	
	const stts = [
		"Menunggu Pembayaran",
		"Verifikasi",
		"Pembayaran Berhasil",
		"Menunggu Jadwal"
	];

	var loadData = function () {
		resetTabel();
		$.ajax({
			url: siteurl+"api/datapendaftaran",
			type: "POST",
			data: {},
			beforeSend: function () {
				
			},
			success: function (res) {
				bentukTabel(res.data);
			},
			error: function (f, msg) {
				console.log(msg);
			}
		});
	}

	var bentukTabel = function (data) {
		var html = "";
		data.forEach(function (item, index) {
			html += `<tr>
				<td>${++index}</td>
				<td>${item.id_daftar}</td>
				<td>${item.tgl_daftar}</td>
				<td>${item.tgl_jemput}</td>
				<td>${item.nm_lgkp}</td>
				<td>${stts[item.stts_daftar]}</td>
				<td>
					<button type="button" class="btn btn-primary btn-sm btn-block btnDetail" data-id="${item.id_daftar}">Detail</button>`;

			if (item.stts_daftar == 1) {
				html += `<button type="button" class="btn btn-primary btn-sm btn-block mt-1 btnVerif" data-id="${item.id_daftar}">
					Verifikasi
				</button>`;
			}

			if (item.stts_daftar == 2) {
				html += `<button type="button" class="btn btn-warning btn-sm btn-block mt-1 btnBatalVerif" data-id="${item.id_daftar}">
					Batalkan
				</button>`;
				html += `<button type="button" class="btn btn-success btn-sm btn-block mt-1 btnJemput" data-id="${item.id_daftar}">
					Jemput
				</button>`;
			}

			html += `</td>
						</tr>`;
		});
		$('#data-disini').html(html);
		// $('#tabel').DataTable({
		// 	"dom" : "frtp",
		// });
		$('#tabel').DataTable({
			"fnDrawCallback" : function( oSettings ) {
				verifikasi();
				batalVerifikasi();
			}
		});
		detail();
		verifikasi();
		batalVerifikasi();
		jemput();
	}

	var detail = function () {
		$('.btnDetail').on('click', function () {
			reset();
			$.post(siteurl+"api/datapendaftaran/detail", {id_daftar: $(this).data('id')}, function (res) {
				$('.modal-body').html(res);
				$('#detail').modal();
			}, "html");
		});
	}

	var reset = function () {
		$('.modal-body').empty();
	}

	var resetTabel = function () {
		$('#data-disini').empty();
	}

	var verifikasi = function () {
		$('.btnVerif').on('click', function () {
			$.post(siteurl+"pendaftaran/verifikasi/2", {id_daftar: $(this).data('id')}, function (res) {
				if (res.status == 202) {
					Notif.notif({
						teks: "Berhasil diverifikasi",
						color: "success"
					});
				}else{
					Notif.notif({
						teks: "Gagal diverifikasi",
						color: "danger"
					});
				}
				loadData();
			}, "json");
		});
	}

	var batalVerifikasi = function () {
		$('.btnBatalVerif').on('click', function () {
			$.post(siteurl+"pendaftaran/batalkan", {id_daftar: $(this).data('id')}, function (res) {
				if (res.status == 202) {
					Notif.notif({
						teks: "Verifikasi berhasil dibatalkan",
						color: "warning"
					});
				}else{
					Notif.notif({
						teks: "Verifikasi gagal dibatalkan",
						color: "danger"
					});
				}
				loadData();
			}, "json");
		});
	}

	var jemput = function () {
		$('.btnJemput').on('click', function () {
			$.post(siteurl+"pendaftaran/verifikasi/3", {id_daftar: $(this).data('id')}, function (res) {
				if (res.status == 202) {
					Notif.notif({
						teks: "Segera menuju ketitik penjemputan",
						color: "info"
					});
				}else{
					Notif.notif({
						teks: "Gagal menuju ketitik penjemputan",
						color: "danger"
					});
				}
				loadData();
			}, "json");
		});
	}

	return {

		siteUrl: "",
		init: function () {
			siteurl = this.siteUrl;
			console.log(siteurl);
			loadData();
		},
		load: function () {
			loadData();
		}

	}

}();