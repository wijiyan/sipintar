<script type="text/javascript">
	var MyTable = $('#list-data').dataTable({
		"paging": true,
		"lengthChange": true,
		"searching": true,
		"ordering": true,
		"info": true,
		"autoWidth": false
	});

	window.onload = function() {
		tampilKunjungan();
		<?php
		if ($this->session->flashdata('msg') != '') {
			echo "effect_msg();";
		}
		?>
	}

	function refresh() {
		MyTable = $('#list-data').dataTable();
	}

	function effect_msg_form() {
		// $('.form-msg').hide();
		$('.form-msg').show(1000);
		setTimeout(function() { $('.form-msg').fadeOut(1000); }, 3000);
	}

	function effect_msg() {
		// $('.msg').hide();
		$('.msg').show(1000);
		setTimeout(function() { $('.msg').fadeOut(1000); }, 3000);
	}

	function tampilKunjungan1() {
		var cari = $('#cari').val();
		var isi = $('#isi').val();
		$.get('<?php echo base_url('Kunjungan/tampil/'); ?>'+cari+'/'+isi, function(data) {

			MyTable.fnDestroy();
			$('#data-kunjungan').html(data);
			refresh();
		});
	}

	function tampilKunjungan() {
		$.get('<?php echo base_url('Kunjungan/tampil'); ?>', function(data) {

			MyTable.fnDestroy();
			$('#data-kunjungan').html(data);
			refresh();
		});
	}


	var id;
	$(document).on("click", ".konfirmasiHapus-kunjungan", function() {
		id = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataKunjungan", function() {
		var id_kunjungan = id;

		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Kunjungan/delete'); ?>",
			data: "id=" +id_kunjungan
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilKunjungan();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-kunjungan", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Kunjungan/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-kunjungan').modal('show');
		})
	})


	$('#form-tambah-kunjungan').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Kunjungan/Simpan'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilKunjungan();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-kunjungan").reset();
				$('#tambah-kunjungan').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$(document).on('submit', '#form-update-kunjungan', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Kunjungan/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilKunjungan();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-kunjungan").reset();
				$('#update-kunjungan').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-kunjungan').on('hidden.bs.modal', function () {
		$('.form-msg').html('');
	})

	$('#update-kunjungan').on('hidden.bs.modal', function () {
		$('.form-msg').html('');
	})


</script>