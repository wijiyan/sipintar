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
		//tampilDataIbu();
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

	function tampilDataIbu() {
		var cari = $('#cari').val();
		var isi = $('#isi').val();
		$.get('<?php echo base_url('DataIbu/tampil/'); ?>'+cari+'/'+isi, function(data) {

			MyTable.fnDestroy();
			$('#data-ibu').html(data);
			refresh();
		});
	}

	function tampilDataIbu1() {
		$.get('<?php echo base_url('DataIbu/tampil'); ?>', function(data) {

			MyTable.fnDestroy();
			$('#data-ibu').html(data);
			refresh();
		});
	}


	var id;
	$(document).on("click", ".konfirmasiHapus-dataibu", function() {
		id = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataDataIbu", function() {
		var id_dataibu = id;

		$.ajax({
			method: "POST",
			url: "<?php echo base_url('DataIbu/delete'); ?>",
			data: "id=" +id_dataibu
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilDataIbu();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataDataIbu", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('DataIbu/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-dataibu').modal('show');
		})
	})


	$('#form-tambah-dataibu').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('DataIbu/Simpan'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			//tampilDataIbu();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-dataibu").reset();
				$('#tambah-dataibu').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$(document).on('submit', '#form-update-dataibu', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('DataIbu/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilDataIbu();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-dataibu").reset();
				$('#update-dataibu').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-dataibu').on('hidden.bs.modal', function () {
		$('.form-msg').html('');
	})

	$('#update-dataibu').on('hidden.bs.modal', function () {
		$('.form-msg').html('');
	})


</script>