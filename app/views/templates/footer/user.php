<!--Start Back To Top Button-->
<a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
	
	<!--Start footer-->
	<footer class="footer">
      <div class="container">
        <div class="text-center">
          Copyright © <?= date('Y');?> KSP Kopdit Pintu Air 
        </div>
      </div>
    </footer>
	<!--End footer-->
	
   
  
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

  <!-- My Char.js -->
  <script type="text/javascript" src="<?=BASEURL?>assets/js/Chart.js"></script>
  <script type="text/javascript" src="<?=BASEURL?>assets/js/MyChart.js"></script>

  <!-- Apex Chart JS -->
  <script src="<?=BASEURL?>assets/plugins/apexcharts/apexcharts.js"></script>
  <script src="<?=BASEURL?>assets/plugins/apexcharts/apex-custom-script.js"></script>
  <!-- Vertical timeline js -->
  <script src="<?=BASEURL?>assets/plugins/vertical-timeline/js/vertical-timeline.js"></script>
   <!--Select Plugins Js-->
   <script src="<?=BASEURL?>assets/plugins/select2/js/select2.min.js"></script>
   <!--Ion range Slider-->
  <script src="<?=BASEURL?>assets/plugins/ion-rangeslider/js/ion.rangeSlider.min.js"></script>
  <script src="<?=BASEURL?>assets/plugins/ion-rangeslider/js/range-slider-script.js"></script>
  <script>
     $(document).ready(function() {
      //range
      var nilai = $('#range_01').val();
      $('.nilaitarget').html(nilai);

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

      var ctx = $('#perhitunganTahun');
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des"],
                    datasets: [{
                        label: 'Nilai Transaksi',
                        data: [
                          <?php
                            $january = 1;
                            $dataJanuray = $this->model('Transaksi_model')->getDataBulananTahunan($_SESSION['manager']['id_cabang'], $january);
                            echo $dataJanuray['jml_bayar'];
                          ?>,
                          <?php
                            $februari = 2;
                            $dataFebruary = $this->model('Transaksi_model')->getDataBulananTahunan($_SESSION['manager']['id_cabang'], $februari);
                            echo $dataFebruary['jml_bayar'];
                          ?>,
                          <?php
                            $maret = 3;
                            $dataMaret = $this->model('Transaksi_model')->getDataBulananTahunan($_SESSION['manager']['id_cabang'], $maret);
                            echo $dataMaret['jml_bayar'];
                          ?>,
                          <?php
                            $april = 4;
                            $dataApril = $this->model('Transaksi_model')->getDataBulananTahunan($_SESSION['manager']['id_cabang'], $april);
                            echo $dataApril['jml_bayar'];
                          ?>,
                          <?php
                            $mei = 5;
                            $dataMei = $this->model('Transaksi_model')->getDataBulananTahunan($_SESSION['manager']['id_cabang'], $mei);
                            echo $dataMei['jml_bayar'];
                          ?>,
                          <?php
                            $juni = 6;
                            $dataJuni = $this->model('Transaksi_model')->getDataBulananTahunan($_SESSION['manager']['id_cabang'], $juni);
                            echo $dataJuni['jml_bayar'];
                          ?>,
                          <?php
                            $juli = 7;
                            $dataJuli = $this->model('Transaksi_model')->getDataBulananTahunan($_SESSION['manager']['id_cabang'], $juli);
                            echo $dataJuli['jml_bayar'];
                          ?>,
                          <?php
                            $agustus = 8;
                            $dataAgustus = $this->model('Transaksi_model')->getDataBulananTahunan($_SESSION['manager']['id_cabang'], $agustus);
                            echo $dataAgustus['jml_bayar'];
                          ?>,
                          <?php
                            $september = 9;
                            $dataSeptember = $this->model('Transaksi_model')->getDataBulananTahunan($_SESSION['manager']['id_cabang'], $september);
                            echo $dataSeptember['jml_bayar'];
                          ?>,
                          <?php
                            $november = 10;
                            $dataNovember = $this->model('Transaksi_model')->getDataBulananTahunan($_SESSION['manager']['id_cabang'], $november);
                            echo $dataNovember['jml_bayar'];
                          ?>,
                          <?php
                            $oktober = 11;
                            $dataOktober = $this->model('Transaksi_model')->getDataBulananTahunan($_SESSION['manager']['id_cabang'], $oktober);
                            echo $dataOktober['jml_bayar'];
                          ?>,
                          <?php
                            $desember = 12;
                            $dataDesember = $this->model('Transaksi_model')->getDataBulananTahunan($_SESSION['manager']['id_cabang'], $desember);
                            echo $dataDesember['jml_bayar'];
                          ?>
                        ],
                        backgroundColor:'rgba(54, 162, 235, 0.2)',
                        borderColor:'rgba(54, 162, 235, 1)',
                        fill: 'origin',
                    borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:true
                            }
                        }]
                    }
                }
            });

    

    </script>
	
</body>
</html>
