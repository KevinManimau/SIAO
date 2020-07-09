<div class="clearfix"></div>
	
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumb-->
     <div class="row pt-2 pb-2">
        <div class="col-sm-9">
		    <h4 class="page-title">TRANSAKSI ACCOUNT OFFICER</h4>
        </div>
        <div class="col-sm-3 text-right">
        <a href="<?=BASEURL?>Transaksi/addNew" class="btnadd align-right btn btn-primary waves-effect waves-light"><i class="fa fa-plus mr-3"></i>Tambah Transaksi</a>
        </div>
     </div>
     <div class="row">
       <div class="col-lg-6">
         <?php Flasher::alert();?>
       </div>
     </div>
    <!-- End Breadcrumb-->
      
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header"><i class="fa fa-table"></i>DATA TRANSAKSI ACCOUNT OFFICER</div>
            <div class="card-body">
              <div class="table-responsive">
              <table id="example" class="text-center table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>TANGGAL TRANS</th>
                        <th>TANGGAL KONTRAK</th>
                        <th>NO.PINTAR</th>
                        <th>NAMA AO</th>
                        <th>NASABAH</th>
                        <th>TELP/HP NASABAH</th>
                        <th>WILAYAH</th>
                        <th>TANGGAL PINJAMAN</th>
                        <th>BESAR PINJAMAN</th>
                        <th>TELAH DIBAYAR</th>
                        <th>SISA PEMBAYARAN</th>
                        <th>STATUS</th>
                        <th>PILIHAN</th>
                        
                    </tr>
                </thead>
                <tbody>
                  <?php $i=1;?>
                  <?php foreach($data['transaksi'] as $trans) :?>
                    <tr>
                      <td><?=$i?></td>
                      <td><?=date('d-m-Y',$trans['tgl_transaksi'])?></td>
                      <td><?=date('d-m-Y',$trans['tgl_kontrak'])?></td>
                      <td><?=$trans['no_pintar']?></td>
                      <td><?=$trans['nama']?></td>
                      <td><?=$trans['nama_nas']?></td>
                      <td><?=$trans['no_telp_nas']?></td>
                      <td>
                      <?php 
                        $wil= $trans['id_wil'];
                        $wilayahku = $this->model('Wilayah_model')->getWilayahbyId($wil);
                        echo $wilayahku['nm_wilayah'];
                      ?>
                      </td>
                      <td><?=date("d-m-Y", $trans['tgl_pinjam'])?></td>
                      <td><?="Rp. ".$trans['jumlah_bayar']?></td>
                      <td><?php
                        if(is_null($trans['income'])){
                          echo "Belum Dibayar";
                        }else{
                          echo "Rp. ".$trans['income'];
                        }
                      ?>
                      </td>
                      <td><?="Rp. ".$trans['sisa_pinjam']?></td>
                      <td>
                      <?php 
                        switch($trans['status_pembayaran']){
                          case 0:
                            echo "Belum Lunas"; 
                            break; 
                          case 1:
                            echo "Lunas";
                            break;
                          default:
                            echo "Belum Lunas";
                            break;
                        }
                        ?>
                      </td>
                      <td>
                        <a href="<?=BASEURL?>Transaksi/detail/<?=$trans['id_transaksi']?>" class="btn btn-primary"><i class="fa fa-television"></i></a>
                        <a href="<?=BASEURL;?>Transaksi/hapus/<?=$trans['id_transaksi']?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                      </td>
                    </tr>
                  <?php $i++;?>
                  <?php endforeach;?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>TANGGAL TRANS</th>
                        <th>TANGGAL KONTRAK</th>
                        <th>NO.PINTAR</th>
                        <th>NAMA AO</th>
                        <th>NASABAH</th>
                        <th>TELP/HP NASABAH</th>
                        <th>WILAYAH</th>
                        <th>TANGGAL PINJAMAN</th>
                        <th>BESAR PINJAMAN</th>
                        <th>PINJAMAN + BUNGA</th>
                        <th>SISA PEMBAYARAN</th>
                        <th>STATUS</th>
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
   

   