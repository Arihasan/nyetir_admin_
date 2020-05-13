var Notif = function () {
	
	return {

		notif: function (data) {
			$.notify({
        icon: "nc-icon "+(data.icon) ? data.icon : "nc-bell-55",
        message: data.teks
      },
      {
        type: (data.color) ? data.color : 'primary',
        timer: (data.waktu) ? data.waktu : 5000,
        placement: {
          from: (data.from) ? data.from : "top",
          align: (data.align) ? data.align : "right"
        }
      });
		}

	}

}();