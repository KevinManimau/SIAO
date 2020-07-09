<div class="clearfix"></div>
	
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumb-->
     <div class="row pt-2 pb-2">
        <div class="col-sm-9">
		    <h4 class="page-title">TETAPKAN TARGET AO</h4>
        </div>
        <div class="col-sm-3 text-right">
        <a href="<?=BASEURL?>Anggota" class="btnadd align-right btn btn-warning waves-effect waves-light"><i class="fa fa-angle-left mr-3"></i>Back</a>
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
                    <div class="row text-uppercase">
                        <div class="col-lg-3">
                            <span>No pintar</span>
                        </div>
                        <div class="col-lg-9">
                            <span>: <?=$data['agt']['no_pintar']?></span>
                        </div>
                    </div>
                    <div class="row text-uppercase">
                        <div class="col-lg-3">
                            <span>Nama</span>
                        </div>
                        <div class="col-lg-9">
                            <span>: <?=$data['agt']['nama']?></span>
                        </div>
                    </div>
                    <hr>
				    <form action="<?=BASEURL?>Anggota/setTarget/<?=$data['agt']['id_agt']?>" method="post">
                    <div class="form-group row">
					  <label class="col-sm-2 col-form-label">SET TARGET BERDASARKAN JUMLAH TRANSAKSI</label>
					  <div class="col-sm-10">
                      <input type="range" class="form-control" id="myrange" value="<?=$data['agt']['target']?>" name="range" />
                      <span class="nilaitarget text-danger"><?=$data['agt']['target']?></span>
                      </div>
					
                    <button type="submit" class="btn btn-primary px-5"><i class="fa fa-check"></i> Selesai</button>
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
   

   