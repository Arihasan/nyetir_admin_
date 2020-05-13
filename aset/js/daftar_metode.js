var DaftarMetode = function () {
	
	var siteurl = "";

	var loadData = function () {
		$.ajax({
			url: siteurl+"api/datametode",
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
				<td>${item.nm_metode}</td>
				<td>${item.kode}</td>
				<td>${item.jns_metode}</td>
				<td>${item.stts_metode}</td>
				<td>
					<button type="button" class="btn btn-primary btn-sm btnKet" data-id="${item.id_metode}">Keterangan</button>
					<a href="${siteurl+"metode/ubah/"+item.id_metode}" class="btn btn-info btn-sm">Ubah</a>
				</td>
			</tr>`;
		});
		$('#data-disini').html(html);
		// $('#tabel').DataTable({
		// 	"dom" : "frtp",
		// });
		$('#tabel').DataTable();
		keterangan();
	}

	var keterangan = function () {
		$('.btnKet').on('click', function () {
			resetKet();
			$.post(siteurl+"api/datametode", {id_metode: $(this).data('id')}, function (res) {
				$('.t_ket').html(res.data[0].ket);
				$('#keterangan').modal();
			}, "json");
		});
	}

	var resetKet = function () {
		$('.t_ket').html("Memuat ....");
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