<div class="form-msg"></div>
<h3 style="display:block; text-align:center;">Tambah Data Kunjungan</h3>
<form id="form-update-kunjungan" method="POST" autocomplete="off">
	<!-- <form method="POST" action="<?php echo base_url();?>Kunjungan/prosesUpdate"> -->
		<input type="hidden" value="<?php echo $this->userdata->username;?>"></input>
		<!-- <input type="hidden" name="id" value="<?php echo $dataKunjungan->id_ibu;?>"></input> -->
		<input type="hidden" name="nik" value="<?php echo $dataKunjungan->nik_ibu;?>"></input>
		<div class="row">
			<div class="col-md-6">
				<fieldset class="form-group">
					<label for="nik">NIK</label>
					<input type="text" class="form-control" name="nik" id="nik" placeholder="NIK KTP" value="<?php echo $dataKunjungan->nik_ibu;?>" disabled>
				</fieldset>
			</div>
			<div class="col-md-6">
				<fieldset class="form-group">
					<label for="bpjs">No RM</label>
					<input type="text" class="form-control" name="no_rm" id="no_rm" placeholder="No RM" value="<?php echo $dataKunjungan->no_rm;?>" disabled>
				</fieldset>
			</div>
			<div class="col-md-12">
				<fieldset class="form-group">
					<label for="nama">Nama</label>
					<input type="text" class="form-control" name="nama_ibu" id="nama_ibu" placeholder="Nama Ibu" value="<?php echo $dataKunjungan->nama_ibu;?>" disabled>
				</fieldset>
			</div>
			<!-- KN1 -->
			<div class="col-md-6">
				<fieldset class="form-group">
					<label for="alamat">Jadwal KN1</label>
					<input type="date" class="form-control" name="jd_kn1" id="jd_kn1" value="<?php echo $dataKunjungan->jd_kn1;?>">
				</fieldset>
			</div>
			<div class="col-md-6">
				<fieldset class="form-group">
					<label for="tgl_kn1">Kunjungan KN1</label>
					<input type="date" class="form-control" name="tgl_kn1" id="tgl_kn1" value="<?php echo $dataKunjungan->tgl_kn1;?>">
				</fieldset>
			</div>
			<!-- KN2 -->
			<div class="col-md-6">
				<fieldset class="form-group">
					<label for="alamat">Jadwal KN2</label>
					<input type="date" class="form-control" name="jd_kn2" id="jd_kn2" value="<?php echo $dataKunjungan->jd_kn2;?>">
				</fieldset>
			</div>
			<div class="col-md-6">
				<fieldset class="form-group">
					<label for="tgl_kn2">Kunjungan KN2</label>
					<input type="date" class="form-control" name="tgl_kn2" id="tgl_kn2" value="<?php echo $dataKunjungan->tgl_kn2;?>">
				</fieldset>
			</div>
			<!-- KN3 -->
			<div class="col-md-6">
				<fieldset class="form-group">
					<label for="jd_kn3">Jadwal KN3</label>
					<input type="date" class="form-control" name="jd_kn3" id="jd_kn3" value="<?php echo $dataKunjungan->jd_kn3;?>">
				</fieldset>
			</div>
			<div class="col-md-6">
				<fieldset class="form-group">
					<label for="tgl_kn3">Kunjungan KN3</label>
					<input type="date" class="form-control" name="tgl_kn3" id="tgl_kn3" value="<?php echo $dataKunjungan->tgl_kn3;?>">
				</fieldset>
			</div>
			<!-- KN4 -->
			<div class="col-md-6">
				<fieldset class="form-group">
					<label for="jd_kn4">Jadwal KN4</label>
					<input type="date" class="form-control" name="jd_kn4" id="jd_kn4" value="<?php echo $dataKunjungan->jd_kn4;?>">
				</fieldset>
			</div>
			<div class="col-md-6">
				<fieldset class="form-group">
					<label for="tgl_kn4">Kunjungan KN4</label>
					<input type="date" class="form-control" name="tgl_kn4" id="tgl_kn4" value="<?php echo $dataKunjungan->tgl_kn4;?>">
				</fieldset>
			</div>
		</div>
		<button type="submit" class="form-group btn mb-1 btn-primary btn-icon btn-lg btn-block">Simpan</button>
	</form>

	<script src="<?php echo base_url();?>app-assets/js/scripts/forms/select/form-select2.js"></script>