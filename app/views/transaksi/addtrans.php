<div class="clearfix"></div>
	
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumb-->
      <div class="row">
        <div class="col form-group selectTrans">
            <div class="icheck-material-primary icheck-inline">
                <input type="radio" id="NewTrans" name="Jenis_Setor" value="NewTrans" checked onclick="ubahJenisTrans('NewTrans')"/>
                <label for="NewTrans">TRANSAKSI BARU</label>
            </div>
            <div class="icheck-material-info icheck-inline">
                <input type="radio" id="PayTrans" name="Jenis_Setor" value="PayTrans" onclick="ubahJenisTrans('PayTrans')"/>
                <label for="PayTrans">PEMBAYARAN</label>
            </div>  
        </div>
      </div>
     <div class="row pt-5 pb-2">
        <div class="col-sm-9">
		    <h4 class="page-title">TRANSAKSI BARU</h4>
        </div>
        <div class="col-sm-3 text-right">
        <a href="<?=BASEURL?>Transaksi" class="btnadd align-right btn btn-warning waves-effect waves-light"><i class="fa fa-angle-left mr-3"></i>Back</a>
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
        <form id="form-action" action="<?=BASEURL?>Transaksi/tambah" method="post">
            <div class="dataPeminjam">
            <div class="form-group">
                <label>Tanggal Pinjam</label>
                 <input type="date" class="form-control" name="tglpinjam" id="tglpinjam" required>
            </div>
            <div class="form-group">
                <label>Nama AO</label>
                <select class="form-control" name="namaao" id="namaao" required>
                    <option>Choose...</option>
                    <?php foreach($data['agt'] as $agt) :?>
                        <option value="<?=$agt['id_agt']?>"><?=$agt['nama']?></option>
                    <?php endforeach;?>
                </select>
            </div>
            <div class="form-group">
                <label>Jenis Pinjaman</label>
                <select class="form-control" name="jnspinjam" id="jnspinjam" required>
                    <option value='1' checked>PU</option>
                    <?php foreach($data['jns'] as $jns) :?>
                        <option value="<?=$jns['id_jenis']?>"><?=$jns['jenis']?></option>
                    <?php endforeach;?>
                </select>
            </div>
            <div class="form-group">
                <label>Pilih Nasabah</label>
                <select class="form-control" name="nasabah" id="nasabah" required>
                    <option>Choose...</option>
                    <?php foreach($data['nas'] as $nas) :?>
                        <option value="<?=$nas['id_nasabah']?>"><?=$nas['nama_nas']?></option>
                    <?php endforeach;?>
                </select>
            </div>
            </div>
            <h5 class="page-for">Data Pinjaman</h5>
            <div class="form-group">
                <label for="besarpinjam">Besar Pinjaman</label>
                <input class="form-control" id="besarpinjam" type="number" name="besarpinjam" required>
            </div>
            <div class="form-group">
                <label for="tglkontrak">Tanggal Kontrak</label>
                 <input type="date" class="form-control" id="tglkontrak" name="tglkontrak" required>
            </div>
            <input type="file" id="bukti" name="bukti" class="custom-file-input" style="display:none;">
            <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <textarea class="form-control" name="keterangan" id="keterangan" cols="30" rows="10"></textarea>
            </div>
            <div class="text-right">
                <button type="submit" class="btn btn-success">Save</button>
            </div>
        </form>
        <!-- <form id="form" enctype="multipart/form-data">
            <div class="form-group">
                <label>File</label>
                <input type="file" name="image" id="image"><br>
            </div>
            <button id="uploadBtn">Upload</button>
            </form>
            <div id="err"></div>
            <div id="preview"></div>
        </div> -->
      </div><!-- End Row-->
    <!--start overlay-->
	    <div class="overlay toggle-menu"></div>
    <!--end overlay-->

    </div>
    <!-- End container-fluid-->
    
    </div><!--End content-wrapper-->
   

   