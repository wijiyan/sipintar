<div class="msg" style="display:none;"> 
	<?php echo @$this->session->flashdata('msg'); ?>
</div>
<section id="column-selectors">
	<div class="row">
		<div class="col-6">
			<div class="card">
				<div class="card-header">
					<form target="_blank" method="POST" action="<?php echo base_url('Rekap/cetak');?>" autocomplete="off">
						<div class="row">
							<div class="col-md-12">
								<h4 class="card-title"><?php echo $judul;?></h4>
							</div>
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
										<option value="semua">Semua</option>
										<option value="lengkap">Lengkap</option>
										<option value="tidak_lengkap">Tidak Lengkap</option>
									</select>
								</fieldset>
							</div>
							<div class="col-md-6">
								<fieldset class="form-group">
									<label for="status">Wilayah</label>
									<select class="form-control select2" name="wilayah" id="wilayah">
										<option value="semua">Semua Wilayah</option>
										<option value="cpb">Cempaka Putih Barat</option>
										<option value="cpt">Cempaka Putih Timur</option>
										<option value="rws">Rawasari</option>
									</select>
								</fieldset>
							</div>
							<div class="col-md-6">
								<fieldset>
									<div class="custom-control custom-checkbox">
										<input name="excel" type="checkbox" class="custom-control-input" id="customCheck1">
										<label class="custom-control-label" for="customCheck1">Export Excel</label>
									</div>
								</fieldset>
							</div>
							<div class="col-md-12">
								<fieldset class="form-group">
									<label for="status_pantau"></label>
									<button type="submit" class="form-control btn btn-outline-primary"><i class="fa fa-search"></i> Lihat</button>
									<!-- <button type="submit" class="form-control btn btn-outline-primary"><i class="fa fa-file-excel-o"></i> Export Excel</button> -->
								</fieldset>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>