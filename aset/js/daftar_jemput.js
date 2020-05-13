var DaftarJemput = function () {
	
	var siteurl = "";

	var loadData = function () {
		$.ajax({
			url: siteurl+"api/datajemput",
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
				<td>${item.penjemputan}</td>
				<td>
					<a href="${siteurl+"jemput/ubah/"+item.id_jemput}" class="btn btn-info btn-sm">Ubah</a>
				</td>
			</tr>`;
		});
		$('#data-disini').html(html);
		// $('#tabel').DataTable({
		// 	"dom" : "frtp",
		// });
		$('#tabel').DataTable();
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