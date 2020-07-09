<div class="clearfix"></div>
	
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumb-->
     <div class="row pt-2 pb-2">
        <div class="col-sm-9">
		    <h4 class="page-title">ANGGOTA</h4>
        </div>
        <div class="col-sm-3 text-right">
        <a href="<?=BASEURL?>Nasabah/addnew" class="btnadd align-right btn btn-primary waves-effect waves-light"><i class="fa fa-plus mr-3"></i>DAFTARKAN ANGGOTA</a>
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
            <div class="card-header"><i class="fa fa-table"></i>DATA ANGGOTA</div>
            <div class="card-body">
              <div class="table-responsive">
              <table id="example" class="text-center table table-bordered">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NO_ANGGOTA</th>
                        <th>NAMA ANGGOTA</th>
                        <th>GENDER</th>
                        <th>TELP/HP</th>
                        <th>WILAYAH</th>
                        <th>PILIHAN</th>
                        
                    </tr>
                </thead>
                <tbody>
                <?php $i=1;?>
                  <?php foreach($data['nas'] as $nas) :?>                

                  <tr>
                    <td><?=$i;?></td>
                    <td><?=$nas['id_nasabah'];?></td>
                    <td><?=$nas['nama_nas']?></td>
                    <th><?=$nas['gender_nas']?></th>
                    <td><?=$nas['no_telp_nas']?></td>
                    <td>
                    <?php 
                      $wil= $nas['id_wil'];
                      $wilayahku = $this->model('Wilayah_model')->getWilayahbyId($wil);
                      echo $wilayahku['nm_wilayah'];
                    ?>
                    </td>
                    <td>
                    <a href="<?=BASEURL;?>Nasabah/detail/<?=$nas['id_nasabah'];?>" class="btn btn-primary text-white"><i class="fa fa-television"></i></a>
                    <button type="button" class="btnedit align-right btn btn-warning waves-effect waves-light tampilModalEditNasabah" data-toggle="modal" data-target="#DataModelsNasabah" data-id="<?=$nas['id_nasabah'];?>" ><i class="fa fa-edit"></i></button>
                    <a href="<?=BASEURL;?>Nasabah/hapus/<?=$nas['id_nasabah'];?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                    </td>
                  </tr>
                  <?php $i++;?>
                  <?php endforeach;?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>NO</th>
                        <th>NO_ANGGOTA</th>
                        <th>NAMA ANGGOTA</th>
                        <th>GENDER</th>
                        <th>TELP/HP</th>
                        <th>WILAYAH</th>                     
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
     <!-- Modals -->
     <div class="modal fade" id="DataModelsNasabah">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content animated lightSpeedIn">
                      <div class="modal-header">
                        <h5 class="modal-title" id="forModalLabel">Ubah Anggota</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                          <form action="<?=BASEURL?>Nasabah/ubah" method="post">
                            <input type="hidden" id="id" name="id">
                            <div class="form-group">
                             <label for="nobuku">NO.ANGGOTA</label>
                               <input type="text" class="form-control" name="nobuku" id="nobuku" placeholder="Enter NO Anggota" required />
                            </div>
                            <div class="form-group">
                             <label for="nama">NAMA ANGGOTA</label>
                               <input type="text" class="form-control" name="nama" id="nama" placeholder="Enter Nama" required />
                            </div>
                            <div class="form-group">
                             <label>GENDER</label><br>
                                <div class="icheck-material-primary icheck-inline">
                                    <input type="radio" id="laki-laki" name="gender" value="LAKI-LAKI" checked/>
                                    <label for="laki-laki">Laki-Laki</label>
                                </div><br>
                                <div class="icheck-material-info icheck-inline">
                                    <input type="radio" id="perempuan" name="gender" value="PEREMPUAN"/>
                                    <label for="perempuan">Perempuan</label>
                                </div>
                            </div>
                             <div class="form-group">
                               <label for="notelp">TELP/HP</label>
                               <input type="text" class="form-control" name="notelp" id="notelp" placeholder="Enter NO TELP/HP" required />
                             </div>
                             <label>WILAYAH</label>
                            <div class="input-group mb-3">
                              <select name="wilayah" id="wilayah">
                                <option id="mywil" value="">Default</option>
                                <?php foreach($data['wil'] as $wil) :?>
                                  <option value="<?=$wil['id_wil']?>"><?=$wil['nm_wilayah']?></option>
                                <?php endforeach;?>
                              </select>
                            </div>                                               
                                                                                  
                             <div class="form-group text-center">
                              <button class="btn btn-danger px-5" data-dismiss="modal"><i class="icon-close"></i> Batal</button>
                              <button onclick="return confirm('Yakin Ingin Mengubah Data Ini?')" type="submit" class="btn btn-primary px-5 action"><i class="fa fa-fw fa-edit"></i> Edit</button>
                            </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
    <!-- ENd Modals -->
    </div>
    <!-- End container-fluid-->
    
    </div><!--End content-wrapper-->
   

   