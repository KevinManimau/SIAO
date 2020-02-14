<div class="clearfix"></div>
	
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumb-->
     <div class="row pt-2 pb-2">
        <div class="col-sm-9">
		    <h4 class="page-title">WILAYAH CABANG</h4>
        </div>
        <div class="col-sm-3 text-right">
        <button type="button" class="btnadd align-right btn btn-primary waves-effect waves-light tampilModalTambahWilayah" data-toggle="modal" data-target="#DataModalWilayah"><i class="fa fa-plus mr-3"></i>Tambah Wilayah</button>
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
            <div class="card-header"><i class="fa fa-table"></i> DATA WILAYAH KANTOR CABANG</div>
            <div class="card-body">
              <div class="table-responsive">
              <table id="example" class="text-center table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Wilayah</th>
                        <th>NAMA CABANG</th>
                        <th>PILIHAN</th>
                        
                    </tr>
                </thead>
                <tbody>
                <?php $i=1;?>  
                <?php foreach($data['wil'] as $wil):?>      
                      
                    <tr>
                        <td><?= $i;?></td>
                        <td><?= $wil['nm_wilayah'];?></td>
                        <td><?= $wil['nama_cab'];?></td>
                        <td>
                        <button type="button" class="btnedit align-right btn btn-warning waves-effect waves-light tampilModalEditWilayah" data-toggle="modal" data-target="#DataModalWilayah" data-id="<?=$wil['id_wil'];?>"><i class="fa fa-edit"></i></button>
                        <a onclick="return confirm('Yakin Ingin Menghapus?')" href="<?=BASEURL;?>Wilayah/hapus/<?=$wil['id_wil'];?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                  <?php $i++;?>
                  <?php endforeach;?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Nama Wilayah</th>
                        <th>NAMA CABANG</th>
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
    <div class="modal fade" id="DataModalWilayah">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content animated lightSpeedIn">
                      <div class="modal-header">
                        <h5 class="modal-title" id="forModalLabel">Tambah Data Wilayah</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                          <form action="<?=BASEURL?>Wilayah/tambah" method="post">
                          <input type="hidden" name="id" id="id">
                             <div class="form-group">
                               <label for="wilayah">Nama Wilayah</label>
                               <input type="text" class="form-control" name="wilayah" id="wilayah" value="" placeholder="Enter Nama Wilayah">
                             </div>
                             <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                <label class="input-group-text" for="cabang">Cabang</label>
                              </div>
                              <select class="custom-select" name="cabang" id="cabang">
                                <option selected id="choose" value="">Choose...</option>
                                <?php foreach($data['cbg'] as $cbg):?>
                                <option value="<?=$cbg['id']?>"><?=$cbg['nama_cab']?></option>
                                <?php endforeach;?>
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
   

   