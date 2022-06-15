<div class="msg" style="display:none;">
	<?php echo @$this->session->flashdata('msg'); ?>
</div>
<section id="column-selectors">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title"><?php echo $judul;?></h4>
				</div>
				<div class="card-content">
					<div class="card-body">
							<div class="row">
								<div class="col-xl-2 col-md-6 col-12 mb-1">
									<fieldset class="form-group">
										<label for="dari">Dari</label>
										<input type='text' name="dari" id="dari" data-value="<?php echo date('Y-m-01');?>" class="form-control pickadate-translations"/>
										<!-- pickadate-translations -->
									</fieldset>
								</div>
								<div class="col-xl-2 col-md-6 col-12 mb-1">
									<fieldset class="form-group">
										<label for="sampai">Sampai</label>
										<input type='text' name="sampai" id="sampai" data-value="<?php echo date('Y-m-t');?>"  class="form-control pickadate-translations"/>
									</fieldset>
								</div>
								<div class="col-xl-3 col-md-6 col-12 mb-1">
									<fieldset class="form-group">
										<label for="status_pantau">Status</label>
										<select class="form-control select2" name="status_pantau" id="status_pantau">
											<option value="">Semua Pelaporan</option>
											<option value="Belum di TL">Belum di TL</option>
											<option value="Belum Ada Jadwal Swab">Belum Ada Jadwal Swab</option>
											<option value="Belum Ada Hasil">Belum Ada Hasil</option>
											<option value="Rujuk">Rujuk</option>
											<option value="Selesai Pantau">Selesai Pantau</option>
											<option value="Sembuh">Sembuh</option>
											<option value="Meninggal">Meninggal</option>
										</select>
									</fieldset>
								</div>
								<div class="col-xl-3 col-md-6 col-12 mb-1">
									<fieldset class="form-group">
										<label for="status_pantau">Status</label>
										<select class="form-control select2" name="status" id="status">
											<option value="">Semua Wilayah</option>
											<option value="cpb">Cempaka Putih Barat</option>
											<option value="cpt">Cempaka Putih Tengah</option>
											<option value="rws">Rawasari</option>
										</select>
									</fieldset>
								</div>
								<div class="col-xl-2 col-md-6 col-12 mb-1">
									<fieldset class="form-group">
										<label for="status_pantau"></label>
										<button class="form-control btn btn-outline-success" onclick="tampilSasaran()"><i class="fa fa-search-plus"></i>Tampil</button>
									</fieldset>
								</div>
							</div>
						<div class="table-responsive">
							<table class="table table-striped" id="list-data">
								<thead>
									<tr>
										<th>No</th>
										<th>NIK</th>
										<th>Nama</th>
										<th>Tanggal Lahir</th>
										<th>Jenis Kelamin</th>
										<th>No HP</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody id="data-sasaran"></tbody>
								<tfoot>
									<tr>
										<th>No</th>
										<th>NIK</th>
										<th>Nama</th>
										<th>Tanggal Lahir</th>
										<th>Jenis Kelamin</th>
										<th>No HP</th>
										<th>Aksi</th>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- <div class="col-md-3 mb-1">
	<h5 class="text-bold-500">Download Excel</h5>
	<form action="<?php echo base_url();?>Sasaran/cetak_excel" method="POST">
		<div class="row">
			<div class="col-md-6">
				<fieldset class="form-group">
					<input type="date" name="tgl_kunjungan" value="<?php echo date('Y-m-d');?>">
				</fieldset>
			</div>
			<div class="col-md-6">
				<fieldset class="form-group">
					<input class="btn btn-success" type="submit" value="Download">
				</fieldset>
			</div>                                                              
		</div>
	</form>
</div> -->

<?php //echo $modal_tambah_sasaran; ?>

<div id="tempat-modal"></div>

<?php show_my_confirm('konfirmasiHapus', 'hapus-dataSasaran', 'Hapus Data Ini?', 'Ya, Hapus Data Ini'); ?>