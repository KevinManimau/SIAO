<div class="clearfix"></div>
	
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumb-->
     <div class="row pt-2 pb-2">
        <div class="col-sm-9">
		    <h4 class="page-title">MANAGER</h4>
        </div>
        <div class="col-sm-3 text-right">
        <button type="button" class="btnadd align-right btn btn-primary waves-effect waves-light tampilModalTambahManager" data-toggle="modal" data-target="#DataModelsManager"><i class="fa fa-plus mr-3"></i>Tambah Manager</button>
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
            <div class="card-header"><i class="fa fa-table"></i>DATA MANAGER AO</div>
            <div class="card-body">
              <div class="table-responsive">
              <table id="example" class="text-center table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NO.PINTAR</th>
                        <th>NAMA MANAGER</th>
                        <th>IMAGE</th>
                        <th>GENDER</th>
                        <th>TELP/HP</th>
                        <th>USERNAME/PASSWORD</th>
                        <th>CABANG</th>
                       
                        <th>PILIHAN</th>
                        
                    </tr>
                </thead>
                <tbody>
                <?php $i=1;?>
                  <?php foreach($data['mgr'] as $mgr) :?>                

                  <tr>
                    <td><?=$i;?></td>
                    <td><?=$mgr['no_pintar']?></td>
                    <td><?=$mgr['nama']?></td>
                    <td><img src="<?=BASEURL;?>assets/images/company/Nita/anggota/<?=$mgr['image'];?>" alt="profile-image" class="profile img-rounded"></td>
                    <td><?=$mgr['gender']?></td>
                    <td><?=$mgr['telp']?></td>
                    <td>
                        <span class="badge badge-primary"><?=$mgr['username']?></span><br>/<br>
                        <span class="badge badge-primary mt-2"><?=$mgr['password']?></span>
                    </td>
                    <td><?=$mgr['nama_cab']?></td>
               
                    <td>
                    <a href="<?=BASEURL;?>Manager/detail/<?=$mgr['id_manager'];?>" class="btn btn-primary text-white"><i class="fa fa-television"></i></a>
                    <button type="button" class="btnedit align-right btn btn-warning waves-effect waves-light tampilModalEditManager" data-toggle="modal" data-target="#DataModelsManager"><i class="fa fa-edit"></i></button>
                    <a href="<?=BASEURL;?>Manager/hapus/<?=$mgr['id_manager'];?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                    </td>
                  </tr>
                  <?php $i++;?>
                  <?php endforeach;?>
                </tbody>
                <tfoot>
                    <tr>
                    <th>No</th>
                        <th>NO.PINTAR</th>
                        <th>NAMA MANAGER</th>
                        <th>IMAGE</th>
                        <th>GENDER</th>
                        <th>TELP/HP</th>
                        <th>USERNAME/PASSWORD</th>
                        <th>CABANG</th>
                     
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
    
    <!-- Modals Tambah -->
    <div class="modal fade" id="DataModelsManager">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content animated lightSpeedIn">
                      <div class="modal-header">
                        <h5 class="modal-title" id="forModalLabel">Tambah Manager</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                          <form action="<?=BASEURL?>manager/tambah" method="post">
                          <div class="row">
                            <div class="col-lg-6">
                            <h4>BIODATA</h4>
                            
                             <div class="form-group">
                               <label for="nopintar">NO.PINTAR</label>
                               <input type="text" class="form-control" name="nopintar" id="nopintar" placeholder="Enter NO Pintar">
                             </div>
                             <div class="form-group">
                               <label for="nama">NAMA MANAGER</label>
                               <input type="text" class="form-control" name="nama" id="nama" placeholder="Enter Nama">
                             </div>
                             <div class="form-group">
                             <label>GENDER</label><br>
                                <div class="icheck-material-primary icheck-inline">
                                      <input type="radio" id="laki-laki" name="gender" value="laki" checked/>
                                      <label for="laki-laki">Laki-Laki</label>
                                    </div><br>
                                    <div class="icheck-material-info icheck-inline">
                                      <input type="radio" id="perempuan" name="gender" value="perem"/>
                                      <label for="perempuan">Perempuan</label>
                                    </div>
                             </div>
                             <div class="form-group">
                               <label for="notelp">TELP/HP</label>
                               <input type="text" class="form-control" name="notelp" id="notelp" placeholder="Enter NO TELP/HP">
                             </div>
                             <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                <label class="input-group-text" for="cabang">Cabang</label>
                              </div>
                              <select class="custom-select cabang" id="cabang" name="cabang">
                                <option selected>Choose...</option>
                                <?php foreach($data['cbg'] as $cbg):?>
                                <option value="<?=$cbg['id']?>"><?=$cbg['status']?> <?=$cbg['nama_cab']?></option>
                                <?php endforeach;?>
                              </select>
                              </div>
                              <label>Foto</label>
                              <div class="input-group mb-3">
                                <input class="form-control" type="file" id="image" name="image">
                              </div>
                          
                       
                            </div>
                            <div class="col-lg-6">
                            <h4>LOGIN</h4>
                            <div class="form-group">
                            <label for="username">USERNAME</label><br>
                            <input type="text" class="form-control" name="username" id="username" placeholder="Enter New Username">
                            </div> 
                            <div class="form-group">
                            <label for="password1">PASSWORD</label><br>
                            <input type="text" class="form-control" name="password1" id="password1" placeholder="Enter New Password">
                            </div>
                            <div class="form-group">
                            <label for="password2">KONFIRMASI PASSWORD</label><br>
                            <input type="text" class="form-control" name="password2" id="password2" placeholder="Enter Password Again">
                            </div>
                            </div>
                          </div>
                                                       
                                                                                  
                             <div class="form-group text-center">
                              <button class="btn btn-danger px-5" data-dismiss="modal"><i class="icon-close"></i> Batal</button>
                              <button type="submit" class="btn btn-primary px-5 action"></button>
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
   

   