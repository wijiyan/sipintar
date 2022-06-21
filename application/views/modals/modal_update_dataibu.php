<div class="form-msg"></div>
<h3 style="display:block; text-align:center;">Update Data Ibu</h3>
<form id="form-update-dataibu" method="POST" autocomplete="off">
	<!-- <form method="POST" action="<?php echo base_url();?>DataIbu/prosesUpdate"> -->
		<input type="hidden" value="<?php echo $this->userdata->username;?>"></input>
		<input type="hidden" name="id" value="<?php echo $dataIbu->id;?>"></input>
		<fieldset class="form-group">
			<label for="nik">NIK</label>
			<input type="text" class="form-control" name="nik" id="nik" placeholder="NIK KTP" value="<?php echo $dataIbu->nik;?>" disabled>
		</fieldset>
		<fieldset class="form-group">
			<label for="bpjs">No RM</label>
			<input type="text" class="form-control" name="no_rm" id="no_rm" placeholder="No RM" value="<?php echo $dataIbu->no_rm;?>" disabled>
		</fieldset>
		<fieldset class="form-group">
			<label for="nama">Nama</label>
			<input type="text" class="form-control" name="nama_ibu" id="nama_ibu" placeholder="Nama Ibu"  value="<?php echo $dataIbu->nama_ibu;?>" required>
		</fieldset>
		<fieldset class="form-group">
			<label for="alamat">Alamat</label>
			<input type="text" class="form-control" name="alamat" id="alamat" placeholder="alamat"  value="<?php echo $dataIbu->alamat;?>" required>
		</fieldset>
		<fieldset class="form-group">
			<label for="tgl_persalinan">Tanggal Persalinan</label>
			<input type="date" class="form-control" name="tgl_persalinan" id="tgl_persalinan"  value="<?php echo $dataIbu->tgl_persalinan;?>" required>
		</fieldset>
		<fieldset class="form-group">
			<label for="tpt_persalinan">Tempat Persalinan</label>
			<input type="text" class="form-control" name="tpt_persalinan" id="tpt_persalinan"  value="<?php echo $dataIbu->tpt_persalinan;?>" placeholder="Tempat Persalinan" required>
		</fieldset>
		<fieldset class="form-group">
			<label for="hp">No HP (WA)</label>
			<input type="text" class="form-control" name="hp" id="hp" placeholder="HP"  value="<?php echo $dataIbu->hp;?>" required>
		</fieldset>
		<fieldset class="form-group">
			<label for="wilayah">Wilayah</label>
			<select class="form-control select2" name="wilayah" id="wilayah" required>
				<option <?php if($dataIbu->wilayah == "cpt"){echo 'selected';}?> value="cpt">Cempaka Putih Timur</option>
				<option <?php if($dataIbu->wilayah == "cpb"){echo 'selected';}?> value="cpb">Cempaka Putih Barat</option>
				<option <?php if($dataIbu->wilayah == "rws"){echo 'selected';}?> value="rws">Rawasari</option>
				<option <?php if($dataIbu->wilayah == "lw"){echo 'selected';}?> value="lw">Luar Wilayah</option>
			</select>
		</fieldset>
		<button type="submit" class="form-group btn mb-1 btn-primary btn-icon btn-lg btn-block">Simpan</button>
	</form>

	<script src="<?php echo base_url();?>app-assets/js/scripts/forms/select/form-select2.js"></script>