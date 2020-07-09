<div class="clearfix"></div>
	
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumb-->
     <div class="row pt-2 pb-2">
        <div class="col-sm-9">
		    <h4 class="page-title">TAMBAH DATA ANGGOTA</h4>
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
				    <form action="<?=BASEURL?>Nasabah/tambah" method="post">
					 <div class="form-group row">
					  <label for="nobuku" class="col-sm-2 col-form-label">NO ANGGOTA</label>
					  <div class="col-sm-10">
						<input type="text" class="form-control" id="nobuku" name="nobuku" placeholder="Enter No Anggota" required />
					  </div>
					</div>
					<div class="form-group row">
					  <label for="nama" class="col-sm-2 col-form-label">NAMA ANGGOTA</label>
					  <div class="col-sm-10">
						<input type="text" class="form-control" id="nama" name="nama" placeholder="Enter Nama Nasabah" required />
					  </div>
					</div>
					<div class="form-group">
                        <label class="col-sm-2 col-form-label">GENDER</label>
                        <div class="icheck-material-primary icheck-inline">
                            <input type="radio" id="laki-laki" name="gender" value="LAKI-LAKI" checked/>
                            <label for="laki-laki">Laki-Laki</label>
                        </div>
                        <div class="icheck-material-info icheck-inline">
                            <input type="radio" id="perempuan" name="gender" value="PEREMPUAN"/>
                            <label for="perempuan">Perempuan</label>
                        </div>
                    </div>
                    <div class="form-group row">
					  <label for="notelp" class="col-sm-2 col-form-label">NO TELP / HP</label>
					  <div class="col-sm-10">
						<input type="text" class="form-control" id="notelp" name="notelp" placeholder="Enter NO TELP / HP" required />
					  </div>
                    </div>
                    <div class="form-group row">
					  <label for="wilayah" class="col-sm-2 col-form-label">WILAYAH</label>
					  <div class="col-sm-10">
            <select name="wilayah" id="wilayah">
              <option>Choose...</option>
              <?php foreach($data['wil'] as $wil) :?>
                <option value="<?=$wil['id_wil']?>"><?=$wil['nm_wilayah']?></option>
              <?php endforeach;?>
            </select>
					  </div>
            <!-- <div class="form-group row">
					  <label for="notelp" class="col-sm-2 col-form-label">KONTRAK</label>
					  <div class="col-sm-10">
            <div class="row form-control">
              <label for="bulan">Bulan</label>
              <input type="number" id="bulan" value="0" required>
              <label for="tahun">Tahun</label>
						  <input type="number" id="tahun" name="tahun" value="0" required />
            </div>
					  </div>
            <label for="notelp" class="col-sm-2 col-form-label">TOTAL BUNGA</label>
					  <div class="col-sm-10">
            <div class="row form-control">
						  <input type="number" id="tahun" name="tahun" value="0" required />
            </div>
					  </div> -->
            
					
					 <div class="form-group row">
					  <label class="col-sm-2 col-form-label"></label>
					  <div class="col-sm-10">
						<button type="submit" class="btn btn-primary px-5"><i class="fa fa-check"></i> ADD</button>
					  
					</form>
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
   

   