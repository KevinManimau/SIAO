  
  
  </div><!--End wrapper-->


  <!-- Bootstrap core JavaScript-->
  <script src="<?=BASEURL?>assets/js/jquery.min.js"></script>
  <script src="<?=BASEURL?>assets/js/popper.min.js"></script>
  <script src="<?=BASEURL?>assets/js/bootstrap.min.js"></script>
	
  <!-- simplebar js -->
  <script src="<?=BASEURL?>assets/plugins/simplebar/js/simplebar.js"></script>
  <!-- horizontal-menu js -->
  <script src="<?=BASEURL?>assets/js/horizontal-menu.js"></script>
  
  <!-- Custom scripts -->
  <script src="<?=BASEURL?>assets/js/app-script.js"></script>
  <script src="<?=BASEURL?>assets/js/main.js"></script>
  <script src="<?=BASEURL?>assets/uploads/upload.js"></script>
  <!--Data Tables js-->
  <script src="<?=BASEURL?>assets/plugins/bootstrap-datatable/js/jquery.dataTables.min.js"></script>
  <script src="<?=BASEURL?>assets/plugins/bootstrap-datatable/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?=BASEURL?>assets/plugins/bootstrap-datatable/js/dataTables.buttons.min.js"></script>
  <script src="<?=BASEURL?>assets/plugins/bootstrap-datatable/js/buttons.bootstrap4.min.js"></script>
  <script src="<?=BASEURL?>assets/plugins/bootstrap-datatable/js/jszip.min.js"></script>
  <script src="<?=BASEURL?>assets/plugins/bootstrap-datatable/js/pdfmake.min.js"></script>
  <script src="<?=BASEURL?>assets/plugins/bootstrap-datatable/js/vfs_fonts.js"></script>
  <script src="<?=BASEURL?>assets/plugins/bootstrap-datatable/js/buttons.html5.min.js"></script>
  <script src="<?=BASEURL?>assets/plugins/bootstrap-datatable/js/buttons.print.min.js"></script>
  <script src="<?=BASEURL?>assets/plugins/bootstrap-datatable/js/buttons.colVis.min.js"></script>

  <!-- Apex Chart JS -->
  <script src="<?=BASEURL?>assets/plugins/apexcharts/apexcharts.js"></script>
  <script src="<?=BASEURL?>assets/plugins/apexcharts/apex-custom-script.js"></script>
  <!-- Vertical timeline js -->
  <script src="<?=BASEURL?>assets/plugins/vertical-timeline/js/vertical-timeline.js"></script>
   <!--Select Plugins Js-->
   <script src="<?=BASEURL?>assets/plugins/select2/js/select2.min.js"></script>
   
  <script>
     $(document).ready(function() {
      $('#jabatan').click();
      $('.multiple-select').select2();
      //Default data table
       $('#default-datatable').DataTable();


       var table = $('#example').DataTable( {
        lengthChange: false,
        buttons: [ 'copy', 'excel', 'pdf', 'print' ]
      } );
 
     table.buttons().container()
        .appendTo( '#example_wrapper .col-md-6:eq(0)' );
      
      } );

    </script>
	
</body>
</html>
