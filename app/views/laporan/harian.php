<div class="clearfix"></div>
	
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumb-->
     <div class="row pt-2 pb-2">
        <div class="col-sm-9">
		    <h4 class="page-title">LAPORAN TRANSAKSI HARIAN</h4>
        </div>
        <div class="col-sm-3 text-right">
        <?php if(isset($_SESSION['listtrans'])) {?>
        <a href="<?=BASEURL?>Laporan/cetakLaporanHarian" target="_blank" class="btnadd align-right btn btn-primary waves-effect waves-light"><i class="fa fa-print"></i> PRINT</a>
        <?php }else{?>
          <a class="btnadd align-right btn btn-primary waves-effect waves-light" disabled><i class="fa fa-print"></i> PRINT</a>
        <?php 
        }
        ?>
        </div>
     </div>
     <div class="row">
       <div class="col-lg-6">
         <?php Flasher::alert();?>
       </div>
     </div>
      <!-- End Breadcrumb-->
      
      <div class="row mt-5">
        <div class="col-lg-6 mx-auto">
          <form action="<?=BASEURL?>Laporan/SearchHarian" method="post">
            <div id="dateragne-picker">
                <div class="input-daterange input-group">
                <?//php 
                //$tanggalhariini=time();
                //$konversitgl = date('m/d/Y');
                ?>
                    <input type="date" class="form-control" name="tanggal" id="tanggal" value="<?//=$konversitgl?>" placeholder="Tanggal Diminta" />
                    
                    <button class="btn btn-primary ml-3"><i class="fa fa-search"></i></button>
                </div>
            </div>
          </form>
        </div>
      </div><!-- End Row-->

      <div class="row mt-5">
        <div class="col-lg-12">
        <div class="text-right">
          <?=$data['btnreset']?>
        </div>
          <div class="card">
            <div class="card-header"><i class="fa fa-table"></i> RESULT</div>
            <div class="card-body">
              <div class="table-responsive">
              <table id="example" class="text-center table table-bordered">
                <thead>
                    <tr>
                        <th>NO TRANSAKSI</th>
                        <th>ISI RINGKAS</th>
                        <th>TANGGAL TRANSAKSI</th>
                    </tr>
                </thead>
                <tbody>
                  <?php if(isset($_SESSION['listtransToday'])){?>
                  <?php foreach($_SESSION['listtransToday'] as $list) :?>
                    <?php
                      // $targetharian = round($list['jml_bayar'] / 30);
                      if($list['jml_bayar'] == 0){
                        $pencapaian = 0;
                      }else{
                        $pencapaian = round($list['income'] / $list['jml_bayar'] * 100);  
                      }
                    ?>
                    <tr>
                      <td><?=$list['id_trans']?></td>
                      <td>
                        <div class="row">
                          <div class="col-sm-6">
                            AO : <?=$list['nm_ao']?>
                            <div class="row text-left">
                              <div class="col-6">
                                <span>BUNGA HARIAN</span>
                              </div>
                              <div class="col-6">
                                <span>: Rp. <?=$list['jml_bayar']?></span>
                              </div>
                            </div>
                            <div class="row text-left">
                              <div class="col-6">
                                <span>KEKURANGAN</span>
                              </div>
                              <div class="col-6">
                                <span>: Rp. <?=$list['sisa_bayar']?></span>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-6">
                            NO PINTAR : <?=$list['no_pintar']?>
                            <div class="row text-left">
                              <div class="col-6">
                                <span>DISETOR</span>
                              </div>
                              <div class="col-6">
                                <span>: Rp. <?=$list['income']?></span>
                              </div>
                            </div>
                            <div class="row text-left">
                              <div class="col-6">
                                <span>PERSENTASE</span>
                              </div>
                              <div class="col-6">
                                <span>: <?=$pencapaian?>%</span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </td>
                      <td><?=date('Y-m-d')?></td>
                    </tr>
                  <?php endforeach;?>
                  <?php } ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>NO TRANSAKSI</th>
                        <th>ISI RINGKAS</th>
                        <th>TANGGAL TRANSAKSI</th>
                    </tr>
                </tfoot>
            </table>
            </div>
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
   

   