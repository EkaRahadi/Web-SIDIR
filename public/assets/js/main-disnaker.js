function previewImage() {
    document.getElementById("image-preview").style.display = "block";
    var oFReader = new FileReader();
     oFReader.readAsDataURL(document.getElementById("image-source").files[0]);
 
    oFReader.onload = function(oFREvent) {
      document.getElementById("image-preview").src = oFREvent.target.result;
    };
  };
function pengguna(act, id_pengguna){
	var url, pesan1, pesan2, btn_txt="Ya, Rubah", btn_cls="btn-primary"
	switch(act){
		case 1:
			url="/admin/pengguna/level?id_pengguna="+id_pengguna+"&set=0"
			pesan1 = "Rubah Level?"
			pesan2 = "Level Akan Dirubah ke Jurnalis"
			break;
		case 2: 
			url="/admin/pengguna/level?id_pengguna="+id_pengguna+"&set=1"
			pesan1 = "Rubah Level?"
			pesan2 = "Level Akan Dirubah ke Administrator"
			break;
		case 3: 
			url="/admin/pengguna/hapus?id_pengguna="+id_pengguna
			pesan1 = "Hapus Pengguna?"
			pesan2 = "Pengguna akan dihapus"
			btn_txt="Ya, Hapus"
			btn_cls="btn-danger"
			break;
		default:
			return
			break
	}
	swal({
			  title: pesan1,
			  text: pesan2,
			  type: "warning",
			  showCancelButton: true,
			  confirmButtonClass: btn_cls,
			  confirmButtonText: btn_txt,
			  cancelButtonText: "Tidak",
			  closeOnConfirm: false,
			  closeOnCancel: false,
			  closeOnClickOutside: true
			},
			function(isConfirm) {
			if (isConfirm) 
				$.getJSON(url, function(data, status){
					 if(data.stat == 200)
						swal({
									  title: "Berhasil",
									  text: data.mess,
									  type: "success",
									  showCancelButton: false,
									  confirmButtonClass: "btn-info",
									  confirmButtonText: "OK"
									},
									function(isConfirm){
										location.reload()
									})
					else swal.close()
						
			})
			else swal.close()})
}
function hapus_slider(id){
	 swal({
			  title: "Hapus Slider?",
			  text: "Slider Akan Terhapus",
			  type: "warning",
			  showCancelButton: true,
			  confirmButtonClass: "btn-danger",
			  confirmButtonText: "Ya, Hapus!",
			  cancelButtonText: "Tidak",
			  closeOnConfirm: false,
			  closeOnCancel: false,
			  closeOnClickOutside: true
			},
			function(isConfirm) {
			  if (isConfirm) {
				$.getJSON('/admin/slider/'+id+'/hapus', function(data, status){
					if(data.stat == 200)
						swal({
									  title: "Berhasil",
									  text: data.mess,
									  type: "success",
									  showCancelButton: false,
									  confirmButtonClass: "btn-info",
									  confirmButtonText: "OK"
									},
									function(isConfirm){
										location.reload()
									})
					else
						swal("Gagal!", data.mess, "error")
				})
			  }else{
				  swal.close()
			  }
			});
}
function f(act, id_menu){
		  var url, pesan1, pesan2, btn_txt="Ya", btn_cls="btn-primary"
	switch(act){
		case 1:
			url="/admin/func_menu/visibilitas?id_menu="+id_menu+"&set=na"
			pesan1 = "Sembunyikan Menu?"
			pesan2 = "Menu Akan Disembunyikan"
			break;
		case 2: 
			url="/admin/func_menu/visibilitas?id_menu="+id_menu+"&set=a"
			pesan1 = "Tamplikan Menu"
			pesan2 = "Menu Akan Ditampilkan"
			break;
		case 3: 
			url="/admin/func_menu/hapus?id_menu="+id_menu
			pesan1 = "Hapus Menu?"
			pesan2 = "Menu akan dihapus"
			btn_txt="Ya, Hapus"
			btn_cls="btn-danger"
			break;
		default:
			return
			break
	}
	swal({
			  title: pesan1,
			  text: pesan2,
			  type: "warning",
			  showCancelButton: true,
			  confirmButtonClass: btn_cls,
			  confirmButtonText: btn_txt,
			  cancelButtonText: "Tidak",
			  closeOnConfirm: false,
			  closeOnCancel: false,
			  closeOnClickOutside: true
			},
			function(isConfirm) {
			if (isConfirm) 
				$.getJSON(url, function(data, status){
					 if(data.stat == 200)
						swal({
									  title: "Berhasil",
									  text: data.mess,
									  type: "success",
									  showCancelButton: false,
									  confirmButtonClass: "btn-info",
									  confirmButtonText: "OK"
									},
									function(isConfirm){
										location.reload()
									})
					else swal.close()
						
			})
			else swal.close()})
	  }
function hapus(id){
		  swal({
			  title: "Hapus Berita?",
			  text: "Berita Akan Terhapus",
			  type: "warning",
			  showCancelButton: true,
			  confirmButtonClass: "btn-danger",
			  confirmButtonText: "Ya, Hapus!",
			  cancelButtonText: "Tidak",
			  closeOnConfirm: false,
			  closeOnCancel: false,
			  closeOnClickOutside: true
			},
			function(isConfirm) {
			  if (isConfirm) {
				$.getJSON('/admin/berita/'+id+'/hapus', function(data, status){
					if(data.stat == 200)
						swal({
									  title: "Berhasil",
									  text: "Berita Terhapus",
									  type: "success",
									  showCancelButton: false,
									  confirmButtonClass: "btn-info",
									  confirmButtonText: "OK"
									},
									function(isConfirm){
										location.reload()
									})
					else
						swal("Gagal!", "Tidak dapat Hapus Berita", "error")
				})
			  }else{
				  swal.close()
			  }
			});
	  }
	  
	  function tambah_kategori(id,val){
		  if(id == 0)
		  swal({
			  title: "Tambah Kategori",
			  type: "input",
			  showCancelButton: true,
			  closeOnConfirm: false,
			  inputPlaceholder: "Tambah Kategori"
			}, function (inputValue) {
			  if (inputValue === false) return false;
			  if (inputValue.trim() === "") {
				swal.showInputError("You need to write something!");
				return false
			  }
			  $.getJSON('/admin/berita/tambah_kategori/'+inputValue+'/'+id, function(data, status){
				  if(data.stat == 200){
					  location.reload()
				  }else{
					  swal("Gagal", data.mess, "error")
				  }
			  })
			  
			})
			else
			  swal({
			  title: "Edit Kategori",
			  type: "input",
			  inputValue: val,
			  showCancelButton: true,
			  closeOnConfirm: false,
			  inputPlaceholder: "Edit Kategori"
			}, function (inputValue) {
			  if (inputValue === false) return false;
			  if (inputValue.trim() === "") {
				swal.showInputError("You need to write something!");
				return false
			  }
			  $.getJSON('/admin/berita/tambah_kategori/'+inputValue+'/'+id, function(data, status){
				  if(data.stat == 200)
					  swal({
									  title: "Berhasil",
									  text: data.mess,
									  type: "success",
									  showCancelButton: false,
									  confirmButtonClass: "btn-info",
									  confirmButtonText: "OK"
									},
									function(isConfirm){
										location.reload()
									})
					else
						swal("Gagal!", data.mess, "error")
				})
			})
	  }
	  function aktifasi_berita(aktifasi, id){
		  var pesan1 ="Sembunyikan Berita?"
		  var pesan2 ="Berita Akan Disembunyikan"
		  var pesan3 ="Berita Disembunyikan"
		  var btn ="Ya, Sembunyikan"
		  if(aktifasi){
			  pesan1 = "Publikasikan Berita?"
			  pesan2 = "Berita Akan Dipuplikasikan"
			  pesan3 = "Berita Dipuplikasikan"
			  btn ="Ya, Publikasikan"
		  }
		swal({
			  title: pesan1,
			  text: pesan2,
			  type: "warning",
			  showCancelButton: true,
			  confirmButtonClass: "btn-warning",
			  confirmButtonText: btn,
			  cancelButtonText: "Tidak",
			  closeOnConfirm: false,
			  closeOnCancel: false,
			  closeOnClickOutside: true
			},  
			function(isConfirm){
				if (isConfirm) {
				$.getJSON('/admin/berita/'+id+'/publikasi-'+aktifasi, function(data, status){
					if(data.stat == 200)
						swal({
									  title: "Berhasil",
									  text: pesan3,
									  type: "success",
									  showCancelButton: false,
									  confirmButtonClass: "btn-info",
									  confirmButtonText: "OK"
									},
									function(isConfirm){
										location.reload()
									})
					else
						swal("Gagal!", data.mess, "error")
				})
			  }else{
				  swal.close()
			  }
			})
	  }
	  function edit_confirm(id){
		 $.getJSON('/admin/berita/'+id+'/lihat', function(data, status){
			 if(data.stat == 100)
				 window.location.replace('/admin/berita/'+id+'/'+data.mess+'/edit')
			 else
				swal("Gagal!", data.mess, "error")
		 })
	  }
	  function kategori_berita(id, edit){
		  if(edit){
			  swal("edit")
		  }else{
			  swal({
			  title: "Hapus Kategori?",
			  text: "Kategori Akan Terhapus",
			  type: "warning",
			  showCancelButton: true,
			  confirmButtonClass: "btn-danger",
			  confirmButtonText: "Ya, Hapus!",
			  cancelButtonText: "Tidak",
			  closeOnConfirm: false,
			  closeOnCancel: false,
			  closeOnClickOutside: true
			},
			function(isConfirm) {
				if(isConfirm){
					$.getJSON('/admin/berita/hapus_kategori/'+id, function(data, status){
					 if(data.stat == 200)
						swal({
									  title: "Berhasil",
									  text: data.mess,
									  type: "success",
									  showCancelButton: false,
									  confirmButtonClass: "btn-info",
									  confirmButtonText: "OK"
									},
									function(isConfirm){
										location.reload()
									})
					else
						swal({
									  title: "Terjadi Masalah",
									  text: data.mess,
									  type: "info",
									  showCancelButton: false,
									  confirmButtonClass: "btn-info",
									  confirmButtonText: "OK"
									},
									function(isConfirm){
										location.reload()
									})
				 })
				}
				swal.close()
		  });
		  }
	  }	  
function submit_form(id, update){
	//document.getElementsByTagName("form")[0].submit()
	if(id == 1){
		var judul = judul = document.getElementById("judul_halaman").value
		var url = "/admin/halaman/cek_judul_halaman/"+judul+"/"+update
	}else{
		var judul = document.getElementById("judul_berita").value
		var url = "/admin/berita/cek_judul_berita/"+judul+"/"+update
	}
	if(judul.trim().length > 0){
			$.getJSON(url, function(data, status){
				if(data.res == 200)
						document.getElementsByTagName("form")[0].submit()
					else
						swal("Maaf!", "Judul Sudah Ada", "warning")
			})
	}else{swal("Maaf!", "Judul Tidak Boleh Kosong", "warning")}
}
function fhal(act, id_hal){
		  var url, pesan1, pesan2, btn_txt="Ya", btn_cls="btn-primary"
	switch(act){
		case 1:
			url="/admin/func_halaman/visibilitas?id_halaman="+id_hal+"&set=TIDAK"
			pesan1 = "Sembunyikan Halaman?"
			pesan2 = "Halaman Akan Disembunyikan"
			break;
		case 2: 
			url="/admin/func_halaman/visibilitas?id_halaman="+id_hal+"&set=YA"
			pesan1 = "Publikasikan Halaman"
			pesan2 = "Halaman Akan Dipublikasikan"
			break;
		case 3: 
			url="/admin/func_halaman/hapus?id_halaman="+id_hal
			pesan1 = "Hapus Halaman?"
			pesan2 = "Halaman akan dihapus"
			btn_txt="Ya, Hapus"
			btn_cls="btn-danger"
			break;
		default:
			return
			break
	}
	swal({
			  title: pesan1,
			  text: pesan2,
			  type: "warning",
			  showCancelButton: true,
			  confirmButtonClass: btn_cls,
			  confirmButtonText: btn_txt,
			  cancelButtonText: "Tidak",
			  closeOnConfirm: false,
			  closeOnCancel: false,
			  closeOnClickOutside: true
			},
			function(isConfirm) {
			if (isConfirm) 
				$.getJSON(url, function(data, status){
					 if(data.stat == 200)
						swal({
									  title: "Berhasil",
									  text: data.mess,
									  type: "success",
									  showCancelButton: false,
									  confirmButtonClass: "btn-info",
									  confirmButtonText: "OK"
									},
									function(isConfirm){
										location.reload()
									})
					else swal.close()
						
			})
			else swal.close()})
	  }