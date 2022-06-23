<div class="msg" style="display:none;"> 
	<?php echo @$this->session->flashdata('msg'); ?>
</div>
<section id="column-selectors">
	<div class="row">
		<div class="col-6">
			<div class="card">
				<div class="card-header">
					<div class="row">
						<div class="col-md-12">
							<h4 class="card-title"><?php echo $judul;?></h4>
						</div>
						<!-- <form role="form" target="_blank" method="POST" action="<?php echo base_url('Rekap/cetak');?>" autocomplete="off"> -->
							<div class="col-md-6">
								<fieldset class="form-group">
									<label for="dari">Dari</label>
									<input type='text' name="dari" id="dari" data-value="<?php echo date('Y-m-01');?>" class="form-control pickadate-translations"/>
									<!-- pickadate-translations -->
								</fieldset>
							</div>
							<div class="col-md-6">
								<fieldset class="form-group">
									<label for="sampai">Sampai</label>
									<input type='text' name="sampai" id="sampai" data-value="<?php echo date('Y-m-t');?>"  class="form-control pickadate-translations"/>
								</fieldset>
							</div>
							<div class="col-md-6">
								<fieldset class="form-group">
									<label for="status">Status</label>
									<select class="form-control select2" name="status" id="status">
										<option value="belum_tl">Belum di TL</option>
										<option selected value="">Semua Pelaporan</option>
										<option value="belum_jadwal_swab">Belum Ada Jadwal Swab</option>
										<option value="terjadwal_swab">Terjadwal Swab</option>
										<option value="belum_keluar_hasil">Belum Keluar Hasil</option>
										<option value="positif">Positif</option>
										<option value="suspek">Suspek</option>
										<option value="positif_komorbid">Positif Komorbid</option>
										<option value="isoman">Isoman</option>
										<option value="rawat">Rawat</option>
										<option value="selesai_pantau">Selesai Pantau</option>
										<option value="sembuh">Sembuh</option>
										<option value="meninggal">Meninggal</option>
									</select>
								</fieldset>
							</div>
							<div class="col-md-6">
								<fieldset class="form-group">
									<label for="status_pantau"></label>
									<button type="submit" class="form-control btn btn-outline-primary"><i class="fa fa-search"></i> Lihat</button>
								</fieldset>
							</div>
						<!-- </form> -->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</section>