<div class="form-msg"></div>
<h3 style="display:block; text-align:center;">Tambah Data Ibu</h3>
<form id="form-tambah-dataibu" method="POST" autocomplete="off">
	<!-- <form method="POST" action="<?php echo base_url();?>DataIbu/simpan"> -->
		<fieldset class="form-group">
			<label for="nik">NIK</label>
			<input type="text" class="form-control" name="nik" id="nik" placeholder="NIK KTP" required>
		</fieldset>
		<fieldset class="form-group">
			<label for="bpjs">No RM</label>
			<input type="text" class="form-control" name="no_rm" id="no_rm" placeholder="No RM" required>
		</fieldset>
		<fieldset class="form-group">
			<label for="nama">Nama</label>
			<input type="text" class="form-control" name="nama_ibu" id="nama_ibu" placeholder="Nama Ibu" required>
		</fieldset>
		<fieldset class="form-group">
			<label for="alamat">Alamat</label>
			<input type="text" class="form-control" name="alamat" id="alamat" placeholder="alamat" required>
		</fieldset>
		<fieldset class="form-group">
			<label for="tgl_persalinan">Tanggal Persalinan</label>
			<input type="date" class="form-control" name="tgl_persalinan" id="tgl_persalinan" required>
		</fieldset>
		<fieldset class="form-group">
			<label for="tpt_persalinan">Tempat Persalinan</label>
			<input type="text" class="form-control" name="tpt_persalinan" id="tpt_persalinan" placeholder="Tempat Persalinan" required>
		</fieldset>
		<fieldset class="form-group">
			<label for="hp">No HP (WA)</label>
			<input type="text" class="form-control" name="hp" id="hp" placeholder="HP" required>
		</fieldset>
		<fieldset class="form-group">
			<label for="wilayah">Wilayah</label>
			<select class="form-control select2" name="wilayah" id="wilayah" required>
				<option value="cpt">Cempaka Putih Timur</option>
				<option selected value="cpb">Cempaka Putih Barat</option>
				<option value="rws">Rawasari</option>
				<option value="lw">Luar Wilayah</option>
			</select>
		</fieldset>
		<button type="submit" class="form-group btn mb-1 btn-primary btn-icon btn-lg btn-block">Simpan</button>
	</form>

	<script src="<?php echo base_url();?>app-assets/js/scripts/forms/select/form-select2.js"></script>