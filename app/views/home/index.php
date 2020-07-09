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
     <!-- <div class="row mt-5">
       <div class="col-sm-6">
         <button class="btn btn-primary" onclick="changeDate('kurang')"><i class="fa fa-angle-left"></i> Previous</button>
       </div>
       <div class="col-sm-6 text-right">
         <button class="btn btn-primary" onclick="changeDate('tambah')">Next <i class="fa fa-angle-right"></i></button>
       </div>
     </div> -->
    <!-- End Breadcrumb-->
      
     <!--Start Dashboard Content-->

     <div class="row mt-3">
       <div class="col-12 col-lg-6 col-xl-3">
         <div class="card gradient-forest">
           <div class="card-body">
              <h5 class="text-white mb-0 ajax1"><?=count($data['filagt'])?> <span class="float-right"><i class="fa fa-users"></i></span></h5>
              <span>Orang</span>
              <p class="mb-0 text-white small-font">ACCOUNT OFFICER (AO) AKTIF</p>
            </div>
         </div> 
       </div>
       <div class="col-12 col-lg-6 col-xl-3">
         <div class="card gradient-forest">
           <div class="card-body">
              <h5 class="text-white mb-0 ajax2"><?=count($data['trans'])?> <span class="float-right"><i class="fa fa-line-chart"></i></span></h5>
              Per <span class="dateTarget"><?=date('m/d/Y')?></span>
              <p class="mb-0 text-white small-font">JUMLAH TRANSAKSI</p>
            </div>
         </div>
       </div>
       <div class="col-12 col-lg-6 col-xl-3">
         <div class="card gradient-forest">
            <div class="card-body">
              <h5 class="text-white mb-0 ajax3"><?=count($data['nas'])?> <span class="float-right"><i class="fa fa-user"></i></span></h5>
              <span>Orang</span>
              <p class="mb-0 text-white small-font">JUMLAH NASABAH</p>
            </div>
         </div>
       </div>
       <div class="col-12 col-lg-6 col-xl-3">
         <div class="card gradient-forest">
            <div class="card-body">
              <?php
                $total = 0;
                foreach($data['trans'] as $trans){
                  $total = $total + $trans['jumlah_bayar'];
                }
              ?>
              <h5 class="text-white mb-0 ajax4">Rp. <?=$total?> <span class="float-right"><i class="fa fa-money"></i></span></h5>
              Per <span class="dateTarget"><?=date('m/d/Y')?></span>
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
            <div class="card-header uppercase"><i class="fa fa-table"></i> TABEL KINERJA PEGAWAI <span class="dateTarget text-danger"><?=date('M Y')?></span></div>
            <div class="card-body">
              <div class="table-responsive">
              <table id="example" class="text-center table table-bordered">
                <thead class="gradient-forest text-white">
                    <tr>
                        <th>NAMA AO</th>
                        <th>BESAR BUNGA</th>
                        <th>TARGET YANG TERCAPAI</th>                        
                    </tr>
                </thead>
                <tbody>
                <?php $i = 1;?>
                <?php foreach($data['filagt'] as $ao):?>
                    <?php
                    // var_dump($ao);
                    if($ao['jml_bayar'] == 0){
                      $pencaipaian = 0;
                    }else{
                    $income = $ao['income'];
                    $target_ao = $ao['jml_bayar'];
                    $math = $income / $target_ao * 100;
                    $pencaipaian = round($math);
                    }
                    // $pencaipaian = PDO::PARAM_INT;
                    if($pencaipaian >= 80){
                      $background = "gradient-quepal";
                    }elseif($pencaipaian >= 50){
                      $background = "gradient-knight";
                    }else{
                      $background = "gradient-redmist";
                    }
                    
                    ?>
                <tr class="<?=$background?> text-white" style="" id="row<?=$i?>">
                    <td>
                      <div class="row">
                        <div class="text-left col-sm-12 pintarget<?=$i?>">
                          <i class="fa fa-plus-circle" style="font-size:20px;" onclick="showTarget(<?=$i?>)"></i>
                        </div>
                        <div class="col-sm-12">
                          <?=$ao['nama_ao']?>
                        </div>
                      </div>
                    </td>
                    <td>
                      <p>Rp. <?=$ao['jml_bayar']?></p>
                      <div class="bg-primary text-white target<?=$i?>" style="display:none; height:100%;">
                        <span>Pencapaian : </span><br>
                        <span><strong><?=$pencaipaian?>%</strong></span>
                      </div>
                    </td>
                    <td>
                      <p>Rp. <?=$ao['income']?></p>
                      <div class="bg-primary text-white target<?=$i?>" style="display:none; height:100%;">
                        <span>Kekurangan : </span><br>
                        <span>Rp. <?=$ao['sisa_bayar']?></span>
                      </div>
                    </td>
                </tr>
                <?php
                $i++;
                ?>
                <?php endforeach;?>
                </tbody>
            </table>
            </div>
            <p><strong>Keterangan</strong> :</p>
            <div class="row m-2">
                    <div class="col-1 bg-success"></div>
                    <div class="col-11"> : Target Tercapai >= 80%</div>
            </div>
            <div class="row m-2">
                    <div class="col-1 bg-warning"></div>
                    <div class="col-11"> : Target Tercapai >= 50%</div>
            </div>
            <div class="row m-2">
                    <div class="col-1 bg-danger"></div>
                    <div class="col-11"> : Target Tercapai >= 0%</div>
            </div>
            </div>
          </div>
        </div>
        <!-- Grafik -->
        <div class="col-lg-6">

          <div class="card">
                <div class="card-header text-uppercase" >GRAFIK PENCAPAIAN TAHUN <span class="grafiktahunan"><?=date('Y');?></span></div>
            <div class="card-body">
              <canvas id="perhitunganTahun"></canvas>
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
   

   