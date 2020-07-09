<div class="clearfix"></div>
	
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumb-->
     <div class="row pt-2 pb-2">
        <div class="col-sm-9">
		    <h4 class="page-title">DETAIL TRANSAKSI</h4>
        </div>
        <div class="col-sm-3 text-right">
        <a href="<?=BASEURL?>Nasabah" class="btnadd align-right btn btn-warning waves-effect waves-light"><i class="fa fa-angle-left mr-3"></i>Back</a>
        </div>
     </div>
     <div class="row">
       <div class="col-lg-6">
         <?php Flasher::alert();?>
       </div>
     </div>
    <!-- End Breadcrumb-->
      
      <div class="row">
        <div class="col-12">
        <div class="card">
			     <div class="card-body">
                    <div class="row">
                        <div class="col">Nomor Anggota</div>
                        <div class="col">: <?=$data['nas'][0]['id_nasabah']?></div>
                    </div>
				    <div class="row">
                        <div class="col">Nama Anggota</div>
                        <div class="col">: <?=$data['nas'][0]['nama_nas']?></div>
                    </div>
				 </div>
			 </div>
        </div>
      </div><!-- End Row-->

      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header"><i class="fa fa-table"></i>Riwayat Transaksi</div>
            <div class="card-body">
              <div class="table-responsive">
              <table id="example" class="text-center table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal Transaksi</th>
                        <th>Nomor Transaksi</th>
                        <th>Bunga</th>
                        <th>Telah_Dibayar</th>
                        <th>Kekurangan</th>
                        <th>Status</th>
                        
                    </tr>
                </thead>
                <tbody>
                <?php $i=1;?>
                  <?php foreach($data['nas'] as $nas) :?>                
                  <?//php
                  //if($agt['jabatan'] != 'ASSISTEN') :
                  ?>
                  <tr>
                    <td><?=$i;?></td>
                    <td><?=date('d/m/Y', $nas['tgl_transaksi'])?></td>
                    <td><?=$nas['tgl_transaksi']?></td>
                    <td>
                    <div class="row">
                        <div class="col-3">Rp.</div>
                        <div class="col-9 text-right"><?=$nas['jumlah_bayar']?></td></div>
                    </div>
                    <td>
                    <div class="row">
                        <div class="col-3">Rp.</div>
                        <div class="col-9 text-right"><?=$nas['income']?></td></div>
                    </div>
                    </td>
                    <td>
                    <div class="row">
                        <div class="col-3">Rp.</div>
                        <div class="col-9 text-right"><?=$nas['sisa_pinjam']?></td></div>
                    </div>
                    </td>
                    <td>
                      <?php
                        switch($nas['status_pembayaran']){
                          case 1:
                            $status = "LUNAS";
                            break;
                          default:
                            $status = "BELUM LUNAS";
                            break;
                        }
                      ?>
                      <?=$status?>
                    </td>
                  </tr>
                  <?//php endif;?>
                  <?php $i++;?>
                  <?php endforeach;?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Tanggal Transaksi</th>
                        <th>Nomor Transaksi</th>
                        <th>Bunga</th>
                        <th>Telah_Dibayar</th>
                        <th>Kekurangan</th>
                        <th>Status</th>
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
   

   