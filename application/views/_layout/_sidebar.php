<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto"><a class="navbar-brand" href="#">
                <div class="brand-logo"></div>
                <h2 class="brand-text mb-0">SI PINTAR</h2>
            </a></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="<?php if ($page == 'Dashboard') {echo 'active';} ?> nav-item"><a href="<?php echo base_url();?>Dashboard"><i class="feather icon-home"></i><span class="menu-title" data-i18n="Dashboard">Dashboard</span><span class="badge badge badge-warning badge-pill float-right mr-2"></span></a>
            </li>
        </ul>
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="<?php if ($page == 'DataIbu') {echo 'active';} ?> nav-item"><a href="<?php echo base_url();?>DataIbu"><i class="feather icon-user-check"></i><span class="menu-title" data-i18n="Dashboard">Data Ibu</span><span class="badge badge badge-warning badge-pill float-right mr-2"></span></a>
            </li>
        </ul>
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="<?php if ($page == 'Kunjungan') {echo 'active';} ?> nav-item"><a href="<?php echo base_url();?>Kunjungan"><i class="fa fa-calendar-o"></i><span class="menu-title" data-i18n="Dashboard">Kunjungan</span><span class="badge badge badge-warning badge-pill float-right mr-2"></span></a>
            </li>
        </ul>
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="<?php if ($page == 'Rekap') {echo 'active';} ?> nav-item"><a href="<?php echo base_url();?>Rekap"><i class="fa fa-check"></i><span class="menu-title" data-i18n="Dashboard">Rekap</span><span class="badge badge badge-warning badge-pill float-right mr-2"></span></a>
            </li>
        </ul>
    </div>
</div>