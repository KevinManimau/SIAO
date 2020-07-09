 <!--Start topbar header-->
 <header class="topbar-nav">
 <nav class="navbar navbar-expand">
  <ul class="navbar-nav mr-auto align-items-center">
    <li class="nav-item">
      <a class="nav-link" href="javascript:void();">
        <div class="media align-items-center">
          <div class="media-body anwater">
            <h5 class="logo-text">STICO</h5>
            <h5 class="logo-text">STICO</h5>
          </div>
        </div>
     </a>
    </li>
    
  </ul>
     
  <ul class="navbar-nav align-items-center right-nav-link">
        
    <li class="nav-item">
      <a class="btn btn-outline-info waves-effect waves-light" href="<?=BASEURL?>Auth/logout">
        Logout
      </a>
    </li>
  </ul>
</nav>
</header>
<!--End topbar header-->
<!-- start horizontal Menu -->
<!-- <nav>
        Menu Toggle btn
        <div class="menu-toggle">
            <h3>Menu</h3>
            <button type="button" id="menu-btn">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
		
        <ul id="respMenu" class="horizontal-menu">
			      <li class="menunav">
                <a href="#" class="active">
                    <i class="zmdi zmdi-view-dashboard" aria-hidden="true"></i>
                    <span class="title">Dashboard</span>
                </a>
            </li>
        </ul>
    </nav>
    end horizontal Menu -->
<div class="clearfix"></div>
	
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumb-->
     <div class="row pt-2 pb-2">
        <div class="col-sm-6">
		    <h4 class="page-title"><?=$data['ncab']?></h4>
        </div>
        <div class="col-sm-6 text-right">
          <form action="<?=BASEURL?>Home/viewer" method="post">
            <label for="keycabang">Pilih Cabang</label><br>
            <select name="keycabang" id="keycabang">
              <option>Choose...</option>
              <?php foreach($data['cbg'] as $cbg) :?>
              <option value="<?=$cbg['id']?>"><?=$cbg['status']?> <?=$cbg['nama_cab']?></option>
              <?php endforeach;?>
            </select>
            <button type="submit" class="btn btn-primary">Lihat</button>
          </form>
          <?=$data['btn']?>
        </div>
     </div>
     <div class="row">
     <div class="col-12">
     <?php Flasher::alert();?>
     </div>
     </div>
     <!-- <div class="row mt-5">
       <div class="col-sm-6">
         <button class="btn btn-primary"><i class="fa fa-angle-left"></i> Previous</button>
       </div>
       <div class="col-sm-6 text-right">
         <button class="btn btn-primary">Next <i class="fa fa-angle-right"></i></button>
       </div>
     </div> -->
    <!-- End Breadcrumb-->
      
     <!--Start Dashboard Content-->

     <div class="row mt-3">
       <div class="col-12 col-lg-6 col-xl-3">
         <div class="card gradient-forest">
           <div class="card-body">
           <h5 class="text-white mb-0"><?=count($data['filagt'])?> <span class="float-right"><i class="fa fa-users"></i></span></h5>
           <span>Orang</span>
           <p class="mb-0 text-white small-font">ACCOUNT OFFICER (AO) AKTIF</p>
              
            </div>
         </div> 
       </div>
       <div class="col-12 col-lg-6 col-xl-3">
         <div class="card gradient-forest">
           <div class="card-body">
           <h5 class="text-white mb-0"><?=count($data['trans'])?> <span class="float-right"><i class="fa fa-line-chart"></i></span></h5>
           <span><?=date('M Y')?></span>
           <p class="mb-0 text-white small-font">JUMLAH TRANSAKSI</p>
            </div>
         </div>
       </div>
       <div class="col-12 col-lg-6 col-xl-3">
         <div class="card gradient-forest">
            <div class="card-body">
            <h5 class="text-white mb-0"><?=count($data['nas'])?> <span class="float-right"><i class="fa fa-user"></i></span></h5>
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
            <h5 class="text-white mb-0"><?=$total?> <span class="float-right"><i class="fa fa-money"></i></span></h5>
            <span>Rp</span>
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
            <div class="card-header uppercase"><i class="fa fa-table"></i> TABEL KINERJA PEGAWAI <span class="dateTarget text-danger"><?=date('M Y');?></span></div>
            <div class="card-body">
              <div class="table-responsive">
              <?php
              if($data['tablestatus'] == true){
              ?>
              <table id="example" class="text-center table table-bordered">
                <thead class="gradient-forest text-white">
                    <tr>
                        <th>NAMA AO</th>
                        <th>BUNGA</th>
                        <th>TARGET TERCAPAI</th>                        
                    </tr>
                </thead>
                <tbody>
                <?php $i = 1;?>
                <?php foreach($data['filagt'] as $ao):?>
                    <?php
                    if($ao['jml_bayar'] == 0){
                      $pencaipaian = 0;
                    }else{
                    $income = $ao['income'];
                    $target_ao = $ao['jml_bayar'];
                    $math = $income / $target_ao * 100;
                    $pencaipaian = round($math);
                    }
                    // $jumlah_transaksi = $ao['jml_transaksi'];
                    // $target_ao = 4;
                    // $pencaipaian = $jumlah_transaksi / $target_ao * 100;
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
              <?php
              }else{
              ?>
                <table id="example" class="text-center table table-bordered display nowrap" style="width:100%">
                <thead class="gradient-forest text-white">
                    <tr>
                        <th>NAMA CABANG</th>
                        <th>BUNGA</th>
                        <th>TARGET TERCAPAI</th>                
                    </tr>
                </thead>
                <tbody>
                <?php $i = 1;?>
                <?php foreach($data['filcbg'] as $cabang):?>
                    <?php
                    if($cabang['jml_bayar'] == 0){
                      $pencaipaian = 0;
                    }else{
                    $income = $cabang['income'];
                    $target_cabang = $cabang['jml_bayar'];
                    $math = $income / $target_cabang * 100;
                    $pencaipaian = round($math);
                    }
                    // $jumlah_transaksi = $cabang['jml_transaksi'];
                    // $target_cabang = 4;
                    // $pencaipaian = $jumlah_transaksi / $target_cabang * 100;
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
                          <?=$cabang['nm_cbg']?>
                        </div>
                      </div>
                    </td>
                    <td>
                      <p>Rp. <?=$cabang['jml_bayar']?></p>
                      <div class="bg-primary text-white target<?=$i?>" style="display:none; height:100%;">
                        <span>Pencapaian : </span><br>
                        <span><strong><?=$pencaipaian?>%</strong></span>
                      </div>
                    </td>
                    <td>
                      <p>Rp. <?=$cabang['income']?></p>
                      <div class="bg-primary text-white target<?=$i?>" style="display:none; height:100%;">
                        <span>Kekurangan : </span><br>
                        <span>Rp. <?=$cabang['sisa_bayar']?></span>
                      </div>
                    </td>
                </tr>
                <?php
                $i++;
                ?>
                <?php endforeach;?>
                </tbody>
               
            </table>
              <?php 
              }
              ?>
              
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
                <div class="card-header text-uppercase">GRAFIK PENCAPAIAN TAHUN <?=date('Y');?></div>
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
   

   