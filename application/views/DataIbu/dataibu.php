<div class="msg" style="display:none;"> 
	<?php echo @$this->session->flashdata('msg'); ?>
</div>
<section id="column-selectors">
	<div class="row">
		<div class="col-12">
			<div class="card">

				<div class="card-header">
					<!-- <h4 class="card-title"><?php echo $judul;?></h4> -->
					
					<div class="col-md-12">
						<a data-toggle="modal" data-target="#tambah-dataibu" class="btn btn-outline-primary">Tambah Data Ibu</a>
					</div>
					
					<div class="col-xl-4 col-md-6 col-12 mb-1">
						<fieldset class="form-group">
							<label for="cari">Cari Berdasarkan</label>
							<select class="form-control select2" name="cari" id="cari">
								<option selected value="nama">Nama</option>
								<option value="nik">NIK</option>
							</select>
						</fieldset>
					</div>
					<div class="col-xl-4 col-md-6 col-12 mb-1">
						<fieldset class="form-group">
							<label for="isi"></label>
							<input type='text' name="isi" id="isi" placeholder="NIK/NAMA" class="form-control"/>
						</fieldset>
					</div>
					<div class="col-xl-4 col-md-6 col-12 mb-1">
						<fieldset class="form-group">
							<label for="status_pantau"></label>
							<button class="form-control btn btn-outline-success" onclick="tampilDataIbu()"><i class="fa fa-search-plus"></i> Tampilkan</button>
						</fieldset>
					</div>
				</div>
				<div class="card-content">
					<div class="card-body card-dashboard">
						<div class="table-responsive">
							<table class="table table-striped" id="list-data">
								<thead>
									<tr>
										<th>No</th>
										<th>NIK</th>
										<th>No RM</th>
										<th>Nama Ibu</th>
										<th>Alamat</th>
										<th>Tempat Persalinan</th>
										<th>No HP</th>
										<th>Wilayah</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody id="data-ibu"></tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<?php echo $modal_tambah_dataibu; ?>

<div id="tempat-modal"></div>

<?php show_my_confirm('konfirmasiHapus', 'hapus-dataIbu', 'Hapus Data Ini?', 'Ya, Hapus Data Ini'); ?>