
<div class="clearfix"></div>
	
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumb-->
     <div class="row pt-2 pb-2">
        <div class="col-sm-3">
            <img width="75" src="<?=BASEURL?>assets/images/pintuair.jpg" alt="">
        </div>
        <div class="col-sm-6 text-center">
            <h3 class="page-title">LAPORAN TRANSAKSI</h3>
            <?php
              $nilai1 = strtotime($_SESSION['tanggal']['start']);
              $nilai2 = strtotime($_SESSION['tanggal']['end']);
            ?>
            <p class="text-uppercase"><?=date('d/M/Y',$nilai1)?> - <?=date('d/M/Y',$nilai2)?></p>
            <p class="mt-3"><?=$data['cbg']['status']?> <?=$data['cbg']['nama_cab']?></p>
	   </div>
     </div>
     </div>
    <!-- End Breadcrumb-->
      <div class="card">
          <div class="card-body">
                  <!-- Content Header (Page header) -->
                  <section class="content-header">
                    <h5>
                      Laporan
                      <small><?=time()?></small>
                    </h5>
                  </section>

                  <!-- Main content -->
                  <section class="invoice">
                    <!-- title row -->
                    <div class="row mt-3">
                      <div class="col-sm-6">
                        <h5>KSP KOPDIT PINTU AIR</h5>
                      </div>
					  <div class="col-sm-6">
					   <h5 class="float-sm-right text-uppercase">Date: <?=date('d/M/Y', time())?></h5>
					  </div>
                    </div>
	

                    <!-- Table row -->
                    <div class="row">
                      <div class="col-12 table-responsive">
                        <table class="table table-striped text-center">
                        <thead>
                    <tr >
                        <th>NO</th>
                        <th>ISI RINGKAS</th>
                    </tr>
                </thead>
                <tbody>
                  <?php $no = 1;?>
                  <?php if($_SESSION['listtrans'] != null){?>
                  <?php foreach($_SESSION['listtrans'] as $list) :?>
                    <?php
                      // $targetharian = round($list['jml_bayar'] / 30);
                      if($list['jml_bayar'] == 0){
                        $pencapaian = 0;
                      }else{
                        $pencapaian = round($list['income'] / $list['jml_bayar'] * 100);  
                      }
                    ?>
                    <tr>
                      <td><?=$no;?></td>
                      <td>
                        <div class="row">
                          <div class="col-sm-6">
                            AO : <?=$list['nm_ao']?><br>
                            <span>BUNGA : Rp. <?=$list['jml_bayar']?></span><br>
                            <span>KEKURANGAN : Rp. <?=$list['sisa_bayar']?></span>
                          </div>
                          <div class="col-sm-6">
                            NO PINTAR : <?=$list['no_pintar']?><br>
                            <span>DIBAYAR : Rp. <?=$list['income']?></span><br>
                            <span>TARGET TERPENUHI : <?=$pencapaian?>%</span>
                          </div>
                        </div>
                        
                      </td>
                    </tr>
                  <?php $no++;?>
                  <?php endforeach;?>
                  <?php } ?>
                </tbody>
                        </table>
                      </div><!-- /.col -->
                    </div><!-- /.row -->

                    <!-- this row will not appear when printing -->
                  </section><!-- /.content -->
          </div>
      </div>
      <div class="row" id="divprint">
                    <div class="col-12 text-right">
                      <button class="btn btn-warning" id="print">Print</button>
                    </div>
      </div>
    <!--start overlay-->
		<div class="overlay toggle-menu"></div>
	<!--end overlay-->
    </div>
    <!-- End container-fluid-->
    
   </div><!--End content-wrapper-->
   