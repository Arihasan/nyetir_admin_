var DaftarPeserta = function () {
	
	var siteurl = "";

	var loadData = function () {
		$.ajax({
			url: siteurl+"api/datapeserta",
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
				<td>${item.nik}</td>
				<td>${item.no_hp}</td>
				<td>${item.nm_lgkp}</td>
				<td>${item.stts_peserta}</td>
				<td>
					<button type="button" class="btn btn-primary btn-sm btnDetail" data-id="${item.id_peserta}">Detail</button>
				</td>
			</tr>`;
		});
		$('#data-disini').html(html);
		// $('#tabel').DataTable({
		// 	"dom" : "frtp",
		// });
		$('#tabel').DataTable();
		detail();
	}

	var detail = function () {
		$('.btnDetail').on('click', function () {
			reset();
			$.post(siteurl+"api/datapeserta", {id_peserta: $(this).data('id')}, function (res) {
				$('#t_id_peserta').html(res.data[0].id_peserta);
				$('#t_nik').html(res.data[0].nik);
				$('#t_nm_lgkp').html(res.data[0].nm_lgkp);
				$('#t_no_hp').html(res.data[0].no_hp);
				$('#t_email').html(res.data[0].email);
				$('#t_alamat').html(res.data[0].alamat);
				$('#t_stts_peserta').html(res.data[0].stts_peserta);
				$('#detail').modal();
			}, "json");
		});
	}

	var reset = function () {
		$('#t_id_peserta').html("Memuat data ....");
		$('#t_nik').html("Memuat data ....");
		$('#t_nm_lgkp').html("Memuat data ....");
		$('#t_no_hp').html("Memuat data ....");
		$('#t_email').html("Memuat data ....");
		$('#t_alamat').html("Memuat data ....");
		$('#t_stts_peserta').html("Memuat data ....");
	}

	return {

		siteUrl: "",
		init: function () {
			siteurl = this.siteUrl;
			console.log(siteurl);
			loadData();
		}

	}

}();