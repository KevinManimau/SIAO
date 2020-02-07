<div class="clearfix"></div>
	
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumb-->
     <div class="row pt-2 pb-2">
        <div class="col-sm-9">
		    <h4 class="page-title">KANTOR CABANG / PEMBANTU</h4>
        </div>
        <div class="col-sm-3 text-right">
        <button type="button" class="btnadd align-right btn btn-primary waves-effect waves-light tampilModalTambahCabang" data-toggle="modal" data-target="#DataModelsCabang"><i class="fa fa-plus mr-3"></i>Tambah Cabang</button>
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
            <div class="card-header"><i class="fa fa-table"></i> DATA KANTOR CABANG / PEMBANTU</div>
            <div class="card-body">
              <div class="table-responsive">
              <table id="example" class="text-center table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NRP</th>
                        <th>NAMA CABANG</th>
                        <th>KC/KCP</th>
                        <th>JABATAN</th>
                        <th>PILIHAN</th>
                        
                    </tr>
                </thead>
                <tbody>
                <?php $i=1;?>  
                <?php foreach($data['cbg'] as $cbg):?>      
                      
                    <tr>
                        <td><?= $i;?></td>
                        <td><?= $cbg['nrp'];?></td>
                        <td><?= $cbg['nama_cab'];?></td>
                        <td><?= $cbg['status'];?></td>
                        <td><?= $cbg['jabatan_cab'];?></td>
                        <td>
                        <a href="<?=BASEURL;?>Cabang/detail/<?=$cbg['id'];?>" class="btn btn-primary text-white"><i class="fa fa-television"></i></a>
                        <button type="button" class="btnedit align-right btn btn-warning waves-effect waves-light tampilModalEditCabang" data-toggle="modal" data-target="#DataModelsCabang" data-id="<?=$cbg['id'];?>"><i class="fa fa-edit"></i></button>
                        <a onclick="return confirm('Yakin Ingin Menghapus?')" href="<?=BASEURL;?>Cabang/hapus/<?=$cbg['id'];?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                        
                        </td>
                    </tr>
                  <?php $i++;?>
                  <?php endforeach;?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>NRP</th>
                        <th>NAMA CABANG</th>
                        <th>KC/KCP</th>
                        <th>JABATAN</th>
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
    <div class="modal fade" id="DataModelsCabang">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content animated lightSpeedIn">
                      <div class="modal-header">
                        <h5 class="modal-title" id="forModalLabel">Tambah Data Cabang</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                          <form action="<?=BASEURL?>Cabang/tambah" method="post">
                          <input type="hidden" name="id" id="id">
                             <div class="form-group">
                               <label for="nrp">NRP</label>
                               <input type="text" class="form-control" name="nrp" id="nrp" value="" placeholder="Enter NRP">
                             </div>
                             <div class="form-group">
                               <label for="nama">NAMA CABANG</label>
                               <input type="text" class="form-control" name="nama" id="nama" value="" placeholder="Enter Nama">
                             </div>
                             
                             <div class="form-group">
                             <div class="demo-heading">Pilih KC atau KCP</div>
                                <div class="icheck-material-primary icheck-inline">
                                      <input type="radio" id="kc" name="stat" value="kc"/>
                                      <label for="kc">KC</label>
                                    </div>
                                    <div class="icheck-material-info icheck-inline">
                                      <input type="radio" id="kcp" name="stat" value="kcp"/>
                                      <label for="kcp">KCP</label>
                                    </div>
                             </div>
                             <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                <label class="input-group-text" for="jabatan">Jabatan</label>
                              </div>
                              <select class="custom-select" name="jabatan" id="jabatan">
                                <option selected id="choose" value="">Choose...</option>
                          
                                <option value="ass">ASSITENT</option>
                                <option value="ao">AO</option>
                              </select>
                            </div>
                             <div class="form-group text-center">
                              <button class="btn btn-danger px-5" data-dismiss="modal"><i class="icon-close"></i> Batal</button>
                              <button type="submit" class="btn btn-primary px-5 action"><i class="icon-lock"></i> Simpan</button>
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
   

   