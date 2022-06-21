<script src="<?php echo base_url();?>app-assets/vendors/js/vendors.min.js"></script>
<script src="<?php echo base_url();?>app-assets/js/core/app-menu.js"></script>
<script src="<?php echo base_url();?>app-assets/js/core/app.js"></script>
<script src="<?php echo base_url();?>app-assets/js/scripts/components.js"></script>
<script src="<?php echo base_url();?>app-assets/js/scripts/forms/form-tooltip-valid.js"></script>
<!-- My Ajax -->

<script src="<?php echo base_url();?>app-assets/vendors/js/forms/select/select2.full.min.js"></script>
<!-- BEGIN: Page JS-->
<script src="<?php echo base_url();?>app-assets/js/scripts/forms/select/form-select2.js"></script>

<!-- BEGIN: Page Vendor JS-->
<script src="<?php echo base_url();?>app-assets/vendors/js/extensions/polyfill.min.js"></script>

<!-- BEGIN: Page Vendor JS-->
<script src="<?php echo base_url();?>app-assets/vendors/js/pickers/pickadate/picker.js"></script>
<script src="<?php echo base_url();?>app-assets/vendors/js/pickers/pickadate/picker.date.js"></script>
<script src="<?php echo base_url();?>app-assets/vendors/js/pickers/pickadate/picker.time.js"></script>
<script src="<?php echo base_url();?>app-assets/vendors/js/pickers/pickadate/legacy.js"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<!-- <script src="<?php //echo base_url();?>app-assets/vendors/js/tables/datatable/pdfmake.min.js"></script> -->
<script src="<?php echo base_url();?>app-assets/vendors/js/tables/datatable/vfs_fonts.js"></script>
<script src="<?php echo base_url();?>app-assets/vendors/js/tables/datatable/datatables.min.js"></script>
<script src="<?php echo base_url();?>app-assets/vendors/js/tables/datatable/datatables.buttons.min.js"></script>
<script src="<?php echo base_url();?>app-assets/vendors/js/tables/datatable/buttons.html5.min.js"></script>
<script src="<?php echo base_url();?>app-assets/vendors/js/tables/datatable/buttons.print.min.js"></script>
<script src="<?php echo base_url();?>app-assets/vendors/js/tables/datatable/buttons.bootstrap.min.js"></script>
<script src="<?php echo base_url();?>app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js"></script>
<!-- END: Page Vendor JS-->
<script src="<?php echo base_url();?>app-assets/vendors/js/charts/chart.min.js"></script>
<!-- BEGIN: Page JS-->
<!-- <script src="<?php echo base_url();?>app-assets/js/scripts/charts/chart-chartjs.js"></script> -->
<!-- BEGIN: Page JS-->
<script src="<?php echo base_url();?>app-assets/js/scripts/pickers/dateTime/pick-a-datetime.js"></script>
<!-- END: Page JS-->

<!-- END: Page JS-->
<?php 
if($page == 'Home')
{
	include './assets/js/js/ajax/ajax_home.php';
}
else if ($page == 'DataIbu'){
	include './assets/js/js/ajax/ajax_ibu.php';
}
else if ($page == 'Kunjungan'){
	include './assets/js/js/ajax/ajax_kunjungan.php';
}
?>