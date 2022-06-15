<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
	<meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
	<meta name="author" content="PIXINVENT">
	<title>Register Page - Vuexy - Bootstrap HTML admin template</title>
	<link rel="apple-touch-icon" href="<?php echo base_url();?>app-assets/images/ico/apple-icon-120.png">
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url();?>app-assets/images/ico/favicon.ico">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

	<!-- BEGIN: Vendor CSS-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>app-assets/vendors/css/vendors.min.css">
	<!-- END: Vendor CSS-->

	<!-- BEGIN: Theme CSS-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>app-assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>app-assets/css/bootstrap-extended.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>app-assets/css/colors.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>app-assets/css/components.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>app-assets/css/themes/dark-layout.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>app-assets/css/themes/semi-dark-layout.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>app-assets/vendors/css/forms/select/select2.min.css">

	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>app-assets/vendors/css/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>app-assets/vendors/css/extensions/sweetalert2.min.css">
	<script src="<?php echo base_url();?>app-assets/vendors/js/extensions/sweetalert2.all.min.js"></script>

	<!-- BEGIN: Page CSS-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>app-assets/css/core/menu/menu-types/vertical-menu.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>app-assets/css/core/colors/palette-gradient.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>app-assets/css/pages/authentication.css">
	<!-- END: Page CSS-->

	<!-- BEGIN: Custom CSS-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/style.css">
	<!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern 1-column  navbar-floating footer-static bg-full-screen-image  blank-page blank-page" data-open="click" data-menu="vertical-menu-modern" data-col="1-column">
	<div class="msg" style="display:none;">
		<?php echo @$this->session->flashdata('msg'); ?>
	</div>
	<!-- BEGIN: Content-->
	<div class="app-content content">
		<div class="content-overlay"></div>
		<div class="header-navbar-shadow"></div>
		<div class="content-wrapper">
			<div class="content-header row"></div>
			<div class="content-body">
				<section class="row flexbox-container">
					<div class="card rounded-0 mb-0 px-2">
						<div class="card-header pb-1">
							<div class="card-title">
								<h4 class="mb-0">Form Pemantauan</h4>
							</div>
						</div>
						<p class="px-2">Silakan isi sesuai dengan kondisi anda sekarang.</p>
						<div class="card-content">
							<!-- <form id="form-update-skrining" method="POST"> -->
								<form method="POST" action="<?php echo base_url();?>Home/SimpanSkrining">
									<?php $no = 1;?>
									<fieldset class="form-group">
										<label for="tgl_skrining"><?php echo $no++;?>.NIK KTP</label>
										<input type="text"  class="form-control" name="nik" value="<?php echo $isi;?>" required>
									</fieldset>
									<fieldset class="form-group">
										<label for="tgl_skrining"><?php echo $no++;?>.Tanggal Pemantauan</label>
										<input type="date"  class="form-control"  name="tgl_skrining" value="<?php echo date('Y-m-d');?>" required>
									</fieldset>
									<div class="row">
										<div class="col-md-6">
											<fieldset class="form-group">
												<label for="suhu"><?php echo $no++;?>.Suhu ºC</label>
												<input type="text"  class="form-control" placeholder="Boleh Dikosongkan" name="suhu">
											</fieldset>
										</div>
										<div class="col-md-6">
											<fieldset class="form-group">
												<label for="saturasi_oksigen"><?php echo $no++;?>.Saturasi Oksigen</label>
												<input type="text"  class="form-control" placeholder="Boleh Dikosongkan" name="saturasi_oksigen">
											</fieldset>
										</div>
									</div>
									<p><?php echo $no++;?>.Apakah Anda Mengalami Demam?</p>
									<ul class="list-unstyled mb-0">
										<li class="d-inline-block mr-4">
											<fieldset>
												<div class="vs-radio-con vs-radio-danger">
													<input type="radio" name="demam" value="1" required>
													<span class="vs-radio">
														<span class="vs-radio--border"></span>
														<span class="vs-radio--circle"></span>
													</span>
													<span class="">YA</span>
												</div>
											</fieldset>
										</li>
										<li class="d-inline-block mr-4">
											<fieldset>
												<div class="vs-radio-con vs-radio-success">
													<input type="radio" name="demam" value="0">
													<span class="vs-radio">
														<span class="vs-radio--border"></span>
														<span class="vs-radio--circle"></span>
													</span>
													<span class="">TIDAK</span>
												</div>
											</fieldset>
										</li>
									</ul>

									<p><?php echo $no++;?>. Apakah Anda Mengalami Batuk?</p>
									<ul class="list-unstyled mb-0">
										<li class="d-inline-block mr-4">
											<fieldset>
												<div class="vs-radio-con vs-radio-danger">
													<input type="radio" name="batuk" value="1" required>
													<span class="vs-radio">
														<span class="vs-radio--border"></span>
														<span class="vs-radio--circle"></span>
													</span>
													<span class="">YA</span>
												</div>
											</fieldset>
										</li>
										<li class="d-inline-block mr-4">
											<fieldset>
												<div class="vs-radio-con vs-radio-success">
													<input type="radio" name="batuk" value="0">
													<span class="vs-radio">
														<span class="vs-radio--border"></span>
														<span class="vs-radio--circle"></span>
													</span>
													<span class="">TIDAK</span>
												</div>
											</fieldset>
										</li>
									</ul>
									<p><?php echo $no++;?>. Apakah Anda Mengalami Pilek?</p>
									<ul class="list-unstyled mb-0">
										<li class="d-inline-block mr-4">
											<fieldset>
												<div class="vs-radio-con vs-radio-danger">
													<input type="radio" name="pilek" value="1" required>
													<span class="vs-radio">
														<span class="vs-radio--border"></span>
														<span class="vs-radio--circle"></span>
													</span>
													<span class="">YA</span>
												</div>
											</fieldset>
										</li>
										<li class="d-inline-block mr-4">
											<fieldset>
												<div class="vs-radio-con vs-radio-success">
													<input type="radio" name="pilek" value="0">
													<span class="vs-radio">
														<span class="vs-radio--border"></span>
														<span class="vs-radio--circle"></span>
													</span>
													<span class="">TIDAK</span>
												</div>
											</fieldset>
										</li>
									</ul>

									<p><?php echo $no++;?>. Apakah Anda Mengalami Sakit Tenggorokan?</p>
									<ul class="list-unstyled mb-0">
										<li class="d-inline-block mr-4">
											<fieldset>
												<div class="vs-radio-con vs-radio-danger">
													<input type="radio" name="sakit_tenggorokan" value="1" required>
													<span class="vs-radio">
														<span class="vs-radio--border"></span>
														<span class="vs-radio--circle"></span>
													</span>
													<span class="">YA</span>
												</div>
											</fieldset>
										</li>
										<li class="d-inline-block mr-4">
											<fieldset>
												<div class="vs-radio-con vs-radio-success">
													<input type="radio" name="sakit_tenggorokan" value="0">
													<span class="vs-radio">
														<span class="vs-radio--border"></span>
														<span class="vs-radio--circle"></span>
													</span>
													<span class="">TIDAK</span>
												</div>
											</fieldset>
										</li>
									</ul>

									<p><?php echo $no++;?>. Apakah Anda Mengalami Sesak Nafas?</p>
									<ul class="list-unstyled mb-0">
										<li class="d-inline-block mr-4">
											<fieldset>
												<div class="vs-radio-con vs-radio-danger">
													<input type="radio" name="sesak_nafas" value="1" required>
													<span class="vs-radio">
														<span class="vs-radio--border"></span>
														<span class="vs-radio--circle"></span>
													</span>
													<span class="">YA</span>
												</div>
											</fieldset>
										</li>
										<li class="d-inline-block mr-4">
											<fieldset>
												<div class="vs-radio-con vs-radio-success">
													<input type="radio" name="sesak_nafas" value="0">
													<span class="vs-radio">
														<span class="vs-radio--border"></span>
														<span class="vs-radio--circle"></span>
													</span>
													<span class="">TIDAK</span>
												</div>
											</fieldset>
										</li>
									</ul>
									<fieldset class="form-group">
										<label for="saturasi_oksigen"><?php echo $no++;?>.Keluhan Lainya</label>
										<textarea class="form-control" placeholder="Silakan Tulis Apabila Ada Keluhan Lainya" name="keluhan_lain"></textarea> 
									</fieldset>
									<br>
									<fieldset class="form-group">
										<div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
											<a href="<?php echo base_url('Dashboard/sasaran');?>" class="btn btn-danger">Batal</a>&nbsp
											<button type="submit" class="btn btn-success">Simpan</button>
										</div>
									</fieldset>
								</form>
							</div>
						</div>
					</section>
				</div>
			</div>
		</div>
		<!-- END: Content-->

		<!-- BEGIN: Vendor JS-->
		<script src="<?php echo base_url();?>app-assets/vendors/js/vendors.min.js"></script>
		<!-- BEGIN Vendor JS-->

		<!-- BEGIN: Page Vendor JS-->
		<!-- END: Page Vendor JS-->

		<!-- BEGIN: Theme JS-->
		<script src="<?php echo base_url();?>app-assets/js/core/app-menu.js"></script>
		<script src="<?php echo base_url();?>app-assets/js/core/app.js"></script>
		<script src="<?php echo base_url();?>app-assets/js/scripts/components.js"></script>
		<script src="<?php echo base_url();?>app-assets/vendors/js/forms/select/select2.full.min.js"></script>
		<!-- BEGIN: Page JS-->
		<script src="<?php echo base_url();?>app-assets/js/scripts/forms/select/form-select2.js"></script>

		<!-- BEGIN: Page JS-->
		<!-- <script src="<?php echo base_url();?>app-assets/js/scripts/extensions/sweet-alerts.js"></script> -->

		<!-- END: Page JS-->

	</body>
	<!-- END: Body-->

	</html>