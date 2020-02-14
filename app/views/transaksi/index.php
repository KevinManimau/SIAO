<div class="clearfix"></div>
	
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumb-->
     <div class="row pt-2 pb-2">
        <div class="col-sm-9">
		    <h4 class="page-title">TRANSAKSI ACCOUNT OFFICE</h4>
        </div>
        <div class="col-sm-3 text-right">
        <button type="button" class="btnadd align-right btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#DataModels"><i class="fa fa-plus mr-3"></i>Tambah Transaksi</button>
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
                        <th>NO.PINTAR</th>
                        <th>NAMA AO</th>
                        <th>NASABAH</th>
                        <th>TELP/HP NASABAH</th>
                        <th>ALAMAT NASABAH</th>
                        <th>TANGGAL PINJAMAN</th>
                        <th>BESAR PINJAMAN</th>
                        <th>SISA PINJAMAN</th>
                        <th>PILIHAN</th>
                        
                    </tr>
                </thead>
                <tbody>
                  
                </tbody>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>NO.PINTAR</th>
                        <th>NAMA AO</th>
                        <th>NASABAH</th>
                        <th>TELP/HP NASABAH</th>
                        <th>ALAMAT NASABAH</th>
                        <th>TANGGAL PINJAMAN</th>
                        <th>BESAR PINJAMAN</th>
                        <th>SISA PINJAMAN</th>
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
    <div class="modal fade" id="DataModels">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content animated lightSpeedIn">
                      <div class="modal-header">
                        <h5 class="modal-title">Tambah Anggota</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                          <form action="<?=BASEURL?>cabang/tambah" method="post">
                            <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">Jabatan</label>
                              </div>
                              <select class="custom-select" id="inputGroupSelect01">
                                <option selected>Choose...</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
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
                               <label for="gender">GENDER</label>
                               <input type="text" class="form-control" name="gender" id="gender" placeholder="Enter Gender">
                             </div>
                             <div class="form-group">
                               <label for="notelp">TELP/HP</label>
                               <input type="text" class="form-control" name="notelp" id="notelp" placeholder="Enter NO TELP/HP">
                             </div>
                            <div class="form-group">
                            <label for="alamat">ALAMAT</label><br>
                              <textarea name="alamat" id="alamat" cols="30" rows="10"></textarea>
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
   

   