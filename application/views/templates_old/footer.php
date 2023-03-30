<footer class="main-footer text-sm">
    <div class="float-right d-none d-sm-block">
        <b>Version</b> 0.0.1
    </div>
    <strong>Copyright © 2020-<?=date('Y')?> <a href="#">BITESO S.P.R.L</a>.</strong> All rights reserved.
</footer>

<script src="<?=base_url('assets/')?>plugins/jquery/jquery.min.js"></script>
<script src="<?=base_url('assets/')?>js/adminlte.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?=base_url('assets/');?>plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?=base_url('assets/');?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- Select2 -->
	<script
		src="<?=base_url('assets/');?>plugins/select2/js/select2.min.js"></script>
<!-- ChartJS -->
<script src="<?=base_url('assets/');?>plugins/chart.js/Chart.min.js"></script>
<!-- JQVMap -->
<script src="<?=base_url('assets/');?>plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?=base_url('assets/');?>plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?=base_url('assets/');?>plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?=base_url('assets/');?>plugins/moment/moment.min.js"></script>
<script src="<?=base_url('assets/');?>plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?=base_url('assets/');?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?=base_url('assets/');?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="<?=base_url('assets/');?>plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script src="<?=base_url('assets/');?>plugins/sweetalert2/sweetalert2.all.min.js"></script>
	<!-- DataTables  & Plugins -->
<script src="<?=base_url('assets/');?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=base_url('assets/');?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?=base_url('assets/');?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?=base_url('assets/');?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?=base_url('assets/');?>plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?=base_url('assets/');?>plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?=base_url('assets/');?>plugins/jszip/jszip.min.js"></script>
<script src="<?=base_url('assets/');?>plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?=base_url('assets/');?>plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?=base_url('assets/');?>plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?=base_url('assets/');?>plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?=base_url('assets/');?>plugins/datatables-buttons/js/buttons.colVis.min.js"></script>	
	

<script src="<?php echo base_url('assets/js');?>/control.js"></script>
<script src="<?php echo base_url('assets/js');?>/table.js"></script>

<script type="text/javascript">
  var url = '<?php echo base_url();?>';

$(document).ready(function () {
  bsCustomFileInput.init();

  $('#dtable').DataTable({
				/*'buttons': ["copy", "csv", "excel", "pdf", "print", "colvis"],*/
				'responsive':true,
				'paging' : true,
				'lengthChange' : true,
				'searching' : true,
				'ordering' : true,
				'info' : true,
				'autoWidth' : false,
				'deferRender' : true
	});
	
  $('.select2').select2({
    tags : false
  });

});
const Toast = Swal.mixin({
      toast: true,
      position: 'top-center',
      showConfirmButton: false,
      timer: 3000
    });
</script>
<?php if(isset($js)){	
	if (file_exists($js)) {
           include $js;
        }else{
		echo "<!--page $js file load fail Error 404-->";
		}
 }?>

</body>

</html>