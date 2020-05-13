var DaftarPaket = function () {
	
	var siteurl = "";

	var loadData = function () {
		$.ajax({
			url: siteurl+"api/datapaket",
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
				<td>${item.nm_paket}</td>
				<td>${Konversi.kerupiah(item.hrg_paket)}</td>
				<td>${item.stts_paket}</td>
				<td>
					<button type="button" class="btn btn-primary btn-sm btnDetail" data-id="${item.id_paket}">Detail</button>
					<a href="${siteurl+"paket/ubah/"+item.id_paket}" class="btn btn-info btn-sm">Ubah</a>
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
			$.post(siteurl+"api/datapaket", {id_paket: $(this).data('id')}, function (res) {
				$('#t_detail').html(res.data[0].dtl_paket);
				$('#detail').modal();
			}, "json");
		});
	}

	var reset = function () {
		$('#t_detail').html("Memuat ....");
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