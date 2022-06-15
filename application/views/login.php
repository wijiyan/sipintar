
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
    <title>Login Cempaka Putih</title>
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

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>app-assets/vendors/css/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>app-assets/vendors/css/extensions/sweetalert2.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>app-assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>app-assets/css/pages/authentication.css">
    <!-- END: Page CSS-->

    <script src='https://www.google.com/recaptcha/api.js'></script>
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
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section class="row flexbox-container">
                    <div class="col-xl-8 col-11 d-flex justify-content-center">
                        <div class="card bg-authentication rounded-0 mb-0">
                            <div class="row m-0">
                                <div class="col-lg-6 d-lg-block d-none text-center align-self-center px-1 py-0">
                                    <a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>app-assets/images/pages/login.png" alt="branding logo"></a>
                                </div>
                                <div class="col-lg-6 col-12 p-0">
                                    <div class="card rounded-0 mb-0 px-2">
                                        <div class="card-header pb-1">
                                            <div class="card-title">
                                                <h4 class="mb-0">Login</h4>
                                            </div>
                                        </div>
                                        <p class="px-2">Silakan Masukan Username dan Password Anda.</p>
                                        <div class="card-content">
                                            <div class="card-body pt-1">
                                                <form action="<?php echo base_url('Auth/login');?>" method="POST">
                                                    <fieldset class="form-label-group form-group position-relative has-icon-left">
                                                        <input type="text" class="form-control" name="username" id="user-name" placeholder="Username" required>
                                                        <div class="form-control-position">
                                                            <i class="feather icon-user"></i>
                                                        </div>
                                                        <label for="user-name">NIK</label>
                                                    </fieldset>
                                                    <fieldset class="form-label-group position-relative has-icon-left">
                                                        <input type="password" class="form-control" name="password" id="user-password" placeholder="Password" autocomplete="off" required>
                                                        <div class="form-control-position">
                                                            <i class="feather icon-lock"></i>
                                                        </div>
                                                        <label for="user-password">Password</label>
                                                    </fieldset>
                                                    <fieldset class="form-label-group position-relative has-icon-left">
                                                        <?php echo $recaptcha?>
                                                    </fieldset>
                                                    <div class="form-group d-flex justify-content-between align-items-center">
                                                        <div class="text-left">
                                                            <fieldset class="checkbox">
                                                                <div class="vs-checkbox-con vs-checkbox-primary">
                                                                    <input type="checkbox">
                                                                    <span class="vs-checkbox">
                                                                        <span class="vs-checkbox--check">
                                                                            <i class="vs-icon feather icon-check"></i>
                                                                        </span>
                                                                    </span>
                                                                    <span class="">Ingat Saya</span>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                        <div class="text-right"><a href="<?php echo base_url();?>Auth/lupa_password" class="card-link">Lupa Password?</a></div>
                                                    </div>
                                                    
                                                    <button type="submit" class="btn btn-primary float-right btn-inline">Login</button>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="login-footer">
                                        </div>
                                    </div>
                                </div>
                            </div>
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

    <!-- BEGIN: Theme JS-->
    <script src="<?php echo base_url();?>app-assets/js/core/app-menu.js"></script>
    <script src="<?php echo base_url();?>app-assets/js/core/app.js"></script>
    <script src="<?php echo base_url();?>app-assets/js/scripts/components.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="<?php echo base_url();?>app-assets/vendors/js/extensions/sweetalert2.all.min.js"></script>
    <script src="<?php echo base_url();?>app-assets/vendors/js/extensions/polyfill.min.js"></script>

    <?php echo $this->session->flashdata('msg'); ?>
    <!-- BEGIN: Page JS-->
    <!-- <script src="<?php echo base_url();?>app-assets/js/scripts/extensions/sweet-alerts.js"></script> -->

    <!-- END: Page JS-->

</body>
<!-- END: Body-->

</html>