<div class="clearfix"></div>
	
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumb-->
     <div class="row pt-2 pb-2">
        <div class="col-sm-9">
		    <h4 class="page-title">DASHBOARD</h4>
        </div>
     </div>
     <div class="row">
       <div class="col-lg-6">
         <?php Flasher::alert();?>
       </div>
     </div>
    <!-- End Breadcrumb-->
      
     <!--Start Dashboard Content-->

     <div class="row mt-3">
       <div class="col-12 col-lg-6 col-xl-3">
         <div class="card gradient-forest">
           <div class="card-body">
              <h5 class="text-white mb-0">14 <span class="float-right"><i class="fa fa-users"></i></span></h5>
              <p class="mb-0 text-white small-font">ACCOUNT OFFICER (AO) AKTIF</p>
            </div>
         </div> 
       </div>
       <div class="col-12 col-lg-6 col-xl-3">
         <div class="card gradient-forest">
           <div class="card-body">
              <h5 class="text-white mb-0">15 <span class="float-right"><i class="fa fa-line-chart"></i></span></h5>
              <p class="mb-0 text-white small-font">JUMLAH TRANSAKSI</p>
            </div>
         </div>
       </div>
       <div class="col-12 col-lg-6 col-xl-3">
         <div class="card gradient-forest">
            <div class="card-body">
              <h5 class="text-white mb-0">25.000 <span class="float-right"><i class="fa fa-user"></i></span></h5>
              <p class="mb-0 text-white small-font">JUMLAH ANGGOTA</p>
            </div>
         </div>
       </div>
       <div class="col-12 col-lg-6 col-xl-3">
         <div class="card gradient-forest">
            <div class="card-body">
              <h5 class="text-white mb-0">4.261.200 <span class="float-right"><i class="fa fa-money"></i></span></h5>
              <p class="mb-0 text-white small-font">NILAI TRANSAKSI</p>
            </div>
         </div>
       </div>
     </div>
     <!--End Row-->

    <!-- Kinerja -->
     <div class="row">
        <div class="col-lg-6">
          <div class="card">
            <div class="card-header uppercase"><i class="fa fa-table"></i> TABEL KINERJA PEGAWAI <?=date('M Y');?></div>
            <div class="card-body">
              <div class="table-responsive">
              <table id="example" class="text-center table table-bordered">
                <thead class="gradient-forest text-white">
                    <tr>
                        <th>NAMA AO</th>
                        <th>Transaksi</th>                        
                    </tr>
                </thead>
                <tbody>
                <tr class="gradient-quepal text-white">
                    <td>Budi</td>
                    <td>20</td>
                </tr>
                <tr class="gradient-quepal text-white">
                    <td>Setiawan</td>
                    <td>21</td>
                </tr>
                <tr class="gradient-orange text-white">
                    <td>Putra</td>
                    <td>11</td>
                </tr>
                <tr class="gradient-orange text-white">
                    <td>Silvana</td>
                    <td>6</td>
                </tr>
                <tr class="gradient-redmist text-white">
                    <td>Jawhead</td>
                    <td>3</td>
                </tr>
                </tbody>
               
            </table>
            </div>
            </div>
          </div>
        </div>
        <!-- Grafik -->
        <div class="col-lg-6">

          <div class="card">
                <div class="card-header text-uppercase">GRAFIK PENCAPAIAN TAHUN <?=date('Y');?></div>
            <div class="card-body">
              <div id="chart1"></div>
            </div>  
          </div>
        </div>
      </div><!-- End Row-->

  

<!--start overlay-->
		  <div class="overlay toggle-menu"></div>
    <!--end overlay-->

    </div>
    <!-- End container-fluid-->
    
    </div><!--End content-wrapper-->
   

   