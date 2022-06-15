<div class="form-msg"></div>
<h3 style="display:block; text-align:center;">Edit Data Sasaran</h3>
<form id="form-update-sasaran" method="POST" autocomplete="off">
	<!-- <form method="POST" action="<?php echo base_url();?>Sasaran/prosesUpdate"> -->
		<input type="hidden" value="<?php echo $this->userdata->username;?>"></input>
		<input type="hidden" value="<?php echo date('Y-m-d');?>" ></input>
		<input type="hidden" name="id" value="<?php echo $dataSasaran->id;?>"></input>
		<input type="hidden" name="nik" value="<?php echo $dataSasaran->nik;?>"></input>
		<fieldset class="form-group">
			<label for="nik">NIK</label>
			<input type="text" class="form-control" name="nik_2" id="nik_2" value="<?php echo $dataSasaran->nik;?>" disabled>
		</fieldset>
		<fieldset class="form-group">
			<label for="bpjs">BPJS</label>
			<input type="text" class="form-control" name="bpjs" id="bpjs" value="<?php echo $dataSasaran->bpjs;?>"placeholder="BPJS">
		</fieldset>
		<fieldset class="form-group">
			<label for="nama">Nama</label>
			<input type="text" class="form-control" name="nama" id="nama" value="<?php echo $dataSasaran->nama;?>"placeholder="Nama">
		</fieldset>
		<fieldset class="form-group">
			<label for="tgl_lahir">Tanggal Lahir</label>
			<input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" value="<?php echo $dataSasaran->tgl_lahir;?>">
		</fieldset>
		<fieldset class="form-group">
			<label for="umur">Umur</label>
			<input type="text" class="form-control" name="umur" id="umur" value="<?php echo $dataSasaran->umur;?>">
		</fieldset>
		<fieldset class="form-group">
			<label for="agama">Agama</label>
			<select class="form-control select2" name="agama" id="agama" required>
				<option <?php if($dataSasaran->agama == "Islam"){echo 'selected';}?>>Islam</option>
				<option <?php if($dataSasaran->agama == "Kristen"){echo 'selected';}?>>Kristen</option>
				<option <?php if($dataSasaran->agama == "Katolik"){echo 'selected';}?>>Katolik</option>
				<option <?php if($dataSasaran->agama == "Hindu"){echo 'selected';}?>>Hindu</option>
				<option <?php if($dataSasaran->agama == "Budha"){echo 'selected';}?>>Budha</option>
				<option <?php if($dataSasaran->agama == "Konghuchu"){echo 'selected';}?>>Konghuchu</option>
			</select>
		</fieldset>
		<fieldset class="form-group">
			<label for="jenkel">Jenis Kelamin</label>
			<select class="form-control select2" name="jenkel" id="jenkel" required>
				<option <?php if($dataSasaran->jenkel == "Laki-Laki"){echo 'selected';}?>>Laki-Laki</option>
				<option <?php if($dataSasaran->jenkel == "Perempuan"){echo 'selected';}?>>Perempuan</option>
			</select>
		</fieldset>
		<fieldset class="form-group">
			<label for="status_menikah">Status Menikah</label>
			<select class="form-control select2" name="status_menikah" id="status_menikah" required>
				<option <?php if($dataSasaran->status_menikah == "Belum menikah"){echo 'selected';}?>>Belum Menikah</option>
				<option <?php if($dataSasaran->status_menikah == "Menikah"){echo 'selected';}?>>Menikah</option>
				<option <?php if($dataSasaran->status_menikah == "Janda"){echo 'selected';}?>>Janda</option>
				<option <?php if($dataSasaran->status_menikah == "Duda"){echo 'selected';}?>>Duda</option>
			</select>
		</fieldset>
		<fieldset class="form-group">
			<label for="hp">No HP (WA)</label>
			<input type="text" class="form-control" name="hp" id="hp" value="<?php echo $dataSasaran->hp;?>"placeholder="HP">
		</fieldset>
		<fieldset class="form-group">
			<label for="email">Email</label>
			<input type="text" class="form-control" name="email" id="email" value="<?php echo $dataSasaran->email;?>"placeholder="Email">
		</fieldset>
		<fieldset class="form-group">
			<label for="pekerjaan">Pekerjaan</label>
			<input type="text" class="form-control" name="pekerjaan" id="pekerjaan" value="<?php echo $dataSasaran->pekerjaan;?>"placeholder="pekerjaan">
		</fieldset>
		<fieldset class="form-group">
			<label for="instansi">Instansi</label>
			<input type="text" class="form-control" name="instansi" id="instansi" value="<?php echo $dataSasaran->instansi;?>"placeholder="Instansi">
		</fieldset>
		<fieldset class="form-group">
			<label for="nama_kk">Nama Kepala Keluarga</label>
			<input type="text" class="form-control" name="nama_kk" id="nama_kk" value="<?php echo $dataSasaran->nama_kk;?>"placeholder="Nama KK">
		</fieldset>
<!-- 		<fieldset class="form-group">
			<label for="alamat">Alamat KTP</label>
			<input type="text" class="form-control" name="alamat" id="alamat" value="<?php echo $dataSasaran->alamat;?>"placeholder="alamat">
		</fieldset> -->
		<fieldset class="form-group">
			<label for="alamat_domisili">Alamat Domisili</label>
			<textarea type="text" class="form-control" name="alamat_domisili" id="alamat_domisili" value="" placeholder="Alamat Domisili"><?php echo $dataSasaran->alamat_domisili;?></textarea>
		</fieldset>
		<fieldset class="form-group">
			<label for="prov_domisili">Provinsi Domisili</label>
			<input type="text" class="form-control" name="prov_domisili" id="prov_domisili" value="<?php echo $dataSasaran->prov_domisili;?>" placeholder="Prov Domisili">
		</fieldset>
		<fieldset class="form-group">
			<label for="kota_domisili">Kota Domisili</label>
			<input type="text" class="form-control" name="kota_domisili" id="kota_domisili" value="<?php echo $dataSasaran->kota_domisili;?>"placeholder="Kota Doomisili">
		</fieldset>
		<fieldset class="form-group">
			<label for="kec_domisili">Kecamatan Domisili</label>
			<input type="text" class="form-control" name="kec_domisili" id="kec_domisili" value="<?php echo $dataSasaran->kec_domisili;?>"placeholder="Kec Domisili">
		</fieldset>
		<fieldset class="form-group">
			<label for="kel_domisili">Kelurahan Domisili</label>
			<input type="text" class="form-control" name="kel_domisili" id="kel_domisili" value="<?php echo $dataSasaran->kel_domisili;?>"placeholder="kel_domisili">
		</fieldset>
		<fieldset class="form-group position-relative">
			<label for="rt">RT Tempat Tinggal</label>
			<select class="form-control select2" name="rt_domisili" id="rt_domisili" required>
				<option <?php if($dataSasaran->rt_domisili == '1'){echo 'selected';}?>>1</option>
				<option <?php if($dataSasaran->rt_domisili == '2'){echo 'selected';}?>>2</option>
				<option <?php if($dataSasaran->rt_domisili == '3'){echo 'selected';}?>>3</option>
				<option <?php if($dataSasaran->rt_domisili == '4'){echo 'selected';}?>>4</option>
				<option <?php if($dataSasaran->rt_domisili == '5'){echo 'selected';}?>>5</option>
				<option <?php if($dataSasaran->rt_domisili == '6'){echo 'selected';}?>>6</option>
				<option <?php if($dataSasaran->rt_domisili == '7'){echo 'selected';}?>>7</option>
				<option <?php if($dataSasaran->rt_domisili == '8'){echo 'selected';}?>>8</option>
				<option <?php if($dataSasaran->rt_domisili == '9'){echo 'selected';}?>>9</option>
				<option <?php if($dataSasaran->rt_domisili == '10'){echo 'selected';}?>>10</option>
				<option <?php if($dataSasaran->rt_domisili == '11'){echo 'selected';}?>>11</option>
				<option <?php if($dataSasaran->rt_domisili == '12'){echo 'selected';}?>>12</option>
				<option <?php if($dataSasaran->rt_domisili == '13'){echo 'selected';}?>>13</option>
				<option <?php if($dataSasaran->rt_domisili == '14'){echo 'selected';}?>>14</option>
				<option <?php if($dataSasaran->rt_domisili == '15'){echo 'selected';}?>>15</option>
				<option <?php if($dataSasaran->rt_domisili == '16'){echo 'selected';}?>>16</option>
				<option <?php if($dataSasaran->rt_domisili == '17'){echo 'selected';}?>>17</option>
				<option <?php if($dataSasaran->rt_domisili == '18'){echo 'selected';}?>>18</option>
				<option <?php if($dataSasaran->rt_domisili == '19'){echo 'selected';}?>>19</option>
				<option <?php if($dataSasaran->rt_domisili == '20'){echo 'selected';}?>>20</option>
				<option <?php if($dataSasaran->rt_domisili == '21'){echo 'selected';}?>>21</option>
				<option <?php if($dataSasaran->rt_domisili == '22'){echo 'selected';}?>>22</option>
				<option <?php if($dataSasaran->rt_domisili == '23'){echo 'selected';}?>>23</option>
				<option <?php if($dataSasaran->rt_domisili == '24'){echo 'selected';}?>>24</option>
				<option <?php if($dataSasaran->rt_domisili == '25'){echo 'selected';}?>>25</option>
			</select>
		</fieldset>
		<fieldset class="form-group position-relative">
			<label for="rw">RW Tempat Tinggal</label>
			<select class="form-control select2" name="rw_domisili" id="rw_domisili" required>
				<option <?php if($dataSasaran->rw_domisili == '1'){echo 'selected';}?>>1</option>
				<option <?php if($dataSasaran->rw_domisili == '2'){echo 'selected';}?>>2</option>
				<option <?php if($dataSasaran->rw_domisili == '3'){echo 'selected';}?>>3</option>
				<option <?php if($dataSasaran->rw_domisili == '4'){echo 'selected';}?>>4</option>
				<option <?php if($dataSasaran->rw_domisili == '5'){echo 'selected';}?>>5</option>
				<option <?php if($dataSasaran->rw_domisili == '6'){echo 'selected';}?>>6</option>
				<option <?php if($dataSasaran->rw_domisili == '7'){echo 'selected';}?>>7</option>
				<option <?php if($dataSasaran->rw_domisili == '8'){echo 'selected';}?>>8</option>
				<option <?php if($dataSasaran->rw_domisili == '9'){echo 'selected';}?>>9</option>
				<option <?php if($dataSasaran->rw_domisili == '10'){echo 'selected';}?>>10</option>
				<option <?php if($dataSasaran->rw_domisili == '11'){echo 'selected';}?>>11</option>
				<option <?php if($dataSasaran->rw_domisili == '12'){echo 'selected';}?>>12</option>
				<option <?php if($dataSasaran->rw_domisili == '13'){echo 'selected';}?>>13</option>
				<option <?php if($dataSasaran->rw_domisili == '14'){echo 'selected';}?>>14</option>
				<option <?php if($dataSasaran->rw_domisili == '15'){echo 'selected';}?>>15</option>
				<option <?php if($dataSasaran->rw_domisili == '16'){echo 'selected';}?>>16</option>
				<option <?php if($dataSasaran->rw_domisili == '17'){echo 'selected';}?>>17</option>
				<option <?php if($dataSasaran->rw_domisili == '18'){echo 'selected';}?>>18</option>
				<option <?php if($dataSasaran->rw_domisili == '19'){echo 'selected';}?>>19</option>
				<option <?php if($dataSasaran->rw_domisili == '20'){echo 'selected';}?>>20</option>
				<option <?php if($dataSasaran->rw_domisili == '21'){echo 'selected';}?>>21</option>
				<option <?php if($dataSasaran->rw_domisili == '22'){echo 'selected';}?>>22</option>
				<option <?php if($dataSasaran->rw_domisili == '23'){echo 'selected';}?>>23</option>
				<option <?php if($dataSasaran->rw_domisili == '24'){echo 'selected';}?>>24</option>
				<option <?php if($dataSasaran->rw_domisili == '25'){echo 'selected';}?>>25</option>
			</select>
		</fieldset>
		<button type="submit" class="form-group btn mb-1 btn-primary btn-icon btn-lg btn-block">Simpan</button>
	</form>

	<fieldset class="form-group">
		<p>
			<label>
				<input type="checkbox" id="ktp" value="" onclick="isi_ktp()">
				Alamat KTP Sesuai Domisili?
			</label>
		</p>
		<label for="alamat">ALAMAT LENGKAP SESUAI KTP*</label>
		<textarea autocomplete="off" class="form-control" name="alamat" id="alamat" placeholder="ALAMAT" required><?php echo $dataSasaran->alamat;?></textarea>
	</fieldset>

	<script type="text/javascript">
		function isi_ktp() {
  			// Get the checkbox
  			var checkBox = document.getElementById("ktp");
  			// Get the output text
  			var alamat = document.getElementById("alamat");
  			var alamat_domisili = document.getElementById("alamat_domisili");
  			var rt_domisili = document.getElementById("rt_domisili");
  			var rw_domisili = document.getElementById("rw_domisili");
  			var kel_domisili = document.getElementById("kel_domisili");
  			var kec_domisili = document.getElementById("kec_domisili");
  			var kota_domisili = document.getElementById("kota_domisili");
  			var prov_domisili = document.getElementById("prov_domisili");

  			// If the checkbox is checked, display the output text
  			if (checkBox.checked == true){
  				alamat.value = alamat_domisili.value+' RT '+rt_domisili.value+'/'+rw_domisili.value+', Kel. '+kel_domisili.value+', Kec. '+kec_domisili.value+', '+kota_domisili.value+', '+prov_domisili.value;
  			//alert(prov_domisili.options[prov_domisili.selectedIndex].text);
  		} else {
  			alamat.value = "";
  		}
  	}
  </script>

  <script src="<?php echo base_url();?>app-assets/js/scripts/forms/select/form-select2.js"></script>