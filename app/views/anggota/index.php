<div class="clearfix"></div>
	
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumb-->
     <div class="row pt-2 pb-2">
        <div class="col-sm-9">
		    <h4 class="page-title">ANGGOTA</h4>
        </div>
        <div class="col-sm-3 text-right">
        <button type="button" class="btnadd align-right btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#DataModelsAnggota"><i class="fa fa-plus mr-3"></i>Tambah ANGGOTA</button>
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
            <div class="card-header"><i class="fa fa-table"></i>DATA KANTOR ANGGOTA KC MAUMERE</div>
            <div class="card-body">
              <div class="table-responsive">
              <table id="example" class="text-center table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>JABATAN</th>
                        <th>NO.PINTAR</th>
                        <th>NAMA</th>
                        <th>IMAGE</th>
                        <th>GENDER</th>
                        <th>TELP/HP</th>
                        <th>WILAYAH</th>
                       
                        <th>PILIHAN</th>
                        
                    </tr>
                </thead>
                <tbody>
                <?php $i=1;?>
                  <?php foreach($data['agt'] as $agt) :?>                

                  <tr>
                    <td><?=$i;?></td>
                    <td><?=$agt['jabatan']?></td>
                    <td><?=$agt['no_pintar']?></td>
                    <td><?=$agt['nama']?></td>
                    <td><img src="<?=BASEURL;?>assets/images/company/nita/anggota/<?=$agt['image'];?>" alt="profile-image" class="profile img-rounded"></td>
                    <td><?=$agt['gender']?></td>
                    <td><?=$agt['telpagt']?></td>
                    <td><?=$agt['wilayah']?></td>
               
                    <td>
                    <a href="<?=BASEURL;?>anggota/detail/<?=$cbg['id'];?>" class="btn btn-primary text-white"><i class="fa fa-television"></i></a>
                    <button type="button" class="btnedit align-right btn btn-warning waves-effect waves-light" data-toggle="modal" data-target="#DataModelsAnggota"><i class="fa fa-edit"></i></button>
                        <a href="<?=BASEURL;?>cabang/hapus/<?=$cbg['id'];?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                    </td>
                  </tr>
                  <?php $i++;?>
                  <?php endforeach;?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>JABATAN</th>
                        <th>NO.PINTAR</th>
                        <th>NAMA</th>
                        <th>IMAGE</th>
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
    
    <!-- Modals Tambah -->
    <div class="modal fade" id="DataModelsAnggota">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content animated lightSpeedIn">
                      <div class="modal-header">
                        <h5 class="modal-title">Tambah Anggota</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                          <form action="<?=BASEURL?>Anggota/tambah" method="post">
                            <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                <label class="input-group-text" for="jabatan">Jabatan</label>
                              </div>
                              <select class="custom-select" id="jabatan">
                                <option selected>Choose...</option>
                                <?php foreach($data['jbt'] as $jbt):?>
                                  <option value="<?=$jbt['jabatan']?>"><?=$jbt['jabatan']?></option>
                                <?php endforeach;?>
                              </select>
                            </div>
                             <div class="form-group">
                               <label for="nrp">NO.PINTAR</label>
                               <input type="text" class="form-control" name="nrp" id="nrp" placeholder="Enter NO Pintar">
                             </div>
                             <div class="form-group">
                               <label for="nama">NAMA</label>
                               <input type="text" class="form-control" name="nama" id="nama" placeholder="Enter Nama">
                             </div>
                             <div class="form-group">
                             <label>GENDER</label><br>
                                <div class="icheck-material-primary icheck-inline">
                                      <input type="radio" id="inline-radio-primary" name="stat" value="laki" checked/>
                                      <label for="inline-radio-primary">Laki-Laki</label>
                                    </div><br>
                                    <div class="icheck-material-info icheck-inline">
                                      <input type="radio" id="inline-radio-info" name="stat" value="perempuan"/>
                                      <label for="inline-radio-info">Perempuan</label>
                                    </div>
                             </div>
                             <div class="form-group">
                               <label for="notelp">TELP/HP</label>
                               <input type="text" class="form-control" name="notelp" id="notelp" placeholder="Enter NO TELP/HP">
                             </div>
                            <label>Foto</label>
                              <div class="input-group mb-3">
                                <input class="form-control" type="file" id="image" name="image">
                              </div>
                              <div id="onwil">
                              <label class="">Wilayah</label><br>
                              <div class="input-group mb-3">
                                
                              <select class="custom-select" id="wilayah">
                                <option selected value="-">Choose...</option>
                                <?php foreach($data['wilayah'] as $wil):?>
                                  <option value="<?=$wil['nm_wilayah']?>"><?=$wil['nm_wilayah']?></option>
                                <?php endforeach;?>
                              </select>
                            </div>
                            
                            <div class="input-group mb-3">
                              <div class="row">
                                <div class="col-sm-10">
                                <textarea name="agtwill" id="agtwill" cols="34" rows="1" disabled></textarea>
                                </div>
                                <div class="col-sm-2">
                                <button type="button" id="resetbtn" class="btn btn-warning"><i class="icon-reload fa-spin"></i> Reset</button>
                                </div>
                              </div>
                            </div>
                            </div>
                                                                          
                             <div class="form-group text-center">
                              <button class="btn btn-danger px-5" data-dismiss="modal"><i class="icon-close"></i> Batal</button>
                              <button type="submit" class="btn btn-primary px-5 "><i class="icon-lock"></i> Simpan</button>
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
   

   