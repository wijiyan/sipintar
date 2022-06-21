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
						<!-- <a data-toggle="modal" data-target="#tambah-kunjungan" class="btn btn-outline-primary">Tambah Data Kunjungan</a> -->
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
										<th>Nama</th>
										<th>HP</th>
										<th>Wilayah</th>
										<th>KN1</th>
										<th>KN2</th>
										<th>KN3</th>
										<th>KN4</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody id="data-kunjungan"></tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<?php echo $modal_tambah_kunjungan; ?>

<div id="tempat-modal"></div>

<?php show_my_confirm('konfirmasiHapus', 'hapus-dataKunjungan', 'Hapus Data Ini?', 'Ya, Hapus Data Ini'); ?>