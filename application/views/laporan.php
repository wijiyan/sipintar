<div class="msg" style="display:none;">
	<?php echo @$this->session->flashdata('msg'); ?>
</div>
<section id="column-selectors">
	<div class="row">
		<div class="col-md-6">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">DATA SWAB</h4>
					<!-- <button data-toggle="modal" data-target="#tambah-sesi" class="btn btn-sm btn-success">Tambah Sesi<i class="feather icon-plus"></i></button> -->
				</div>
				<div class="card-content">
					<div class="card-body card-dashboard">
						<form method="POST" action="<?php echo base_url('Laporan/export_excel/swab');?>">
							<fieldset class="form-group">
								<label for="dari">Dari</label>
								<input type='date' name="dari" id="dari" value="<?php echo date('Y-m-d');?>" class="form-control"/>
							</fieldset>
							<fieldset class="form-group">
								<label for="sampai">Sampai</label>
								<input type='date' name="sampai" id="sampai" value="<?php echo date('Y-m-d');?>"  class="form-control"/>
							</fieldset>
							<fieldset class="form-group">
								<button type="submit" class="btn btn-primary btn-block">Download</button>
							</fieldset>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- SATU -->
	</div>
</section>