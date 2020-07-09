
$(function() {
    
    //Upload Image
    
    $('#upload').on('click',function(e){
        e.preventDefault();
        const image = $('#image').val();
        // alert(image);
        $.ajax({
            url:"http://localhost/SIMANTO/public/ajaxupload.php",
            data: {image: image},
            method:"post",
            beforeSend:function()
            {
                $('#err').fadeOut();
            },
            success:function(data)
            {
                if(data=='invalid')
                {
                    //invalid file format
                    $('#err').html("Invalid File !").fadeIn();
                }
                else if(data=='empty'){
                    //empty file
                    $('#err').html("Foto Belum Ada !").fadeIn();
                }
                else{
                    //view upload file
                    $('#preview').html(data).fadeIn();
                }
            },
            error:function(e)
            {
                $('#err').html(e).fadeIn();
            }
        });
    });
    // CABANG
    $('.tampilModalTambahCabang').click(function(){
        $('#DataModelsCabang #forModalLabel').html("Tambah Data Cabang");
        $('#DataModelsCabang .action').html("<i class='fa fa-plus'></i> ADD");
        $('#DataModelsCabang .modal-body form').attr('action','http://localhost/SIMANTO/public/Cabang/tambah')

        $('#DataModelsCabang #nrp').val('');
        $('#DataModelsCabang #nama').val('');
        $('#DataModelsCabang #choose').val('');
        $('#DataModelsCabang #choose').html('Choose...');
    })
    $('.tampilModalEditCabang').click(function(){
        $('#DataModelsCabang #forModalLabel').html("Ubah Data Cabang");
        $('#DataModelsCabang .action').html("<i class='fa fa-edit'></i> EDIT");
        $('#DataModelsCabang .modal-body form').attr('action','http://localhost/SIMANTO/public/Cabang/ubah')

        const id = $(this).data('id');
        // alert(id);
        $.ajax({
            url: 'http://localhost/SIMANTO/public/Cabang/getUbah',
            data: {id: id},
            method: 'post',
            dataType: 'json',
            success: function(data) {
               
                $('#DataModelsCabang #nrp').val(data.nrp);
                $('#DataModelsCabang #nama').val(data.nama_cab);
                if(data.status != 'KC'){
                    $('#DataModelsCabang input[value="kcp"]').attr("checked","checked");
      
                }
                else{
                    $('#DataModelsCabang input[value="kc"]').attr("checked","checked");
           
                }
                // $('#nrp').attr('hi');
                // $('#nrp').val(data.status);
                $('#DataModelsCabang #choose').val(data.jabatan_cab);
                $('#DataModelsCabang #choose').html(data.jabatan_cab);
                $('#DataModelsCabang #id').val(data.id);

             
            }
        });

    })

    // MANAGER
    $('.tampilModalTambahManager').click(function(){
        $('#DataModelsManager #forModalLabel').html("Tambah Data Manager");
        $('#DataModelsManager .action').html("<i class='fa fa-plus'></i> ADD");
        $('#DataModelsManager .modal-body form').attr('action','http://localhost/SIMANTO/public/Manager/tambah')

        $('#DataModelsManager #nopintar').val('');
        $('#DataModelsManager #nama').val('');
        $('#DataModelsManager #notelp').val('');
        $('#DataModelsManager #image').val('');
        $('#DataModelsManager #username').val('');
        $('#DataModelsManager #password1').val('');
        $('#choose').removeAttr('value');
        $('#choose').val('');
        $('#choose').html('Choose...');
    })
    $('.tampilModalEditManager').click(function(){
        $('#DataModelsManager #forModalLabel').html("Ubah Data Manager");
        $('#DataModelsManager .action').html("<i class='fa fa-edit'></i> EDIT");
        $('#DataModelsManager .modal-body form').attr('action','http://localhost/SIMANTO/public/Manager/ubah')
        // $('#cabang option');
        const idman = $(this).data('id');
        
        $.ajax({
            url: 'http://localhost/SIMANTO/public/Manager/getUbah',
            data: {id: idman},
            method: 'post',
            dataType: 'json',
            success: function(data) {
               console.log(data);
               $('#nopintar').val(data.no_pintar);
               $('#nama').val(data.nama);
               if(data.gender != 'Perempuan'){
                $('#DataModelsManager input[value="laki"]').attr("checked","checked");
  
                }
                else{
                    $('#DataModelsManager input[value="perem"]').attr("checked","checked");
        
                }

               $('#notelp').val(data.telp);
               $('#username').val(data.username);
               $('#password1').val(data.password);
               $('#konfirm').fadeOut();

               $('#choose').val(data.id);
               $('#choose').html(data.nama_cab);
               $('#idmanager').val(data.id_manager);
                // console.log(data);
            }
        });

    })

    // ANGGOTA
    // if($('#DataModelsAnggota #jabatan').child().attr('selected') == 'ASSITEN'){
    //     $('#DataModelsAnggota #mywil').attr('selected');
    //     $('#DataModelsAnggota #onwil').fadeOut();
    // }else{
    //     $('#DataModelsAnggota #mywil').removeattr('selected');
    //     $('#DataModelsAnggota #onwil').fadeIn();
    // }
    $('#DataModalAnggota #jabatan').click(function(){
        var jab = $('#DataModalAnggota #jabatan').val();
        if(jab == '2'){
            // $('#DataModelsAnggota #mywil').attr('value','');
            $('#onwil').fadeOut();
        }else{
            $('#onwil').fadeIn();
        }
    })
    $('#wilayah').click(function(){
        var wil = $('#wilayah').val();
        console.log(wil);
    })
    $('.tampilModalTambahAnggota').click(function(){
        $('#DataModalAnggota #forModalLabel').html("Tambah Data Anggota");
        $('#DataModalAnggota .action').html("<i class='fa fa-plus'></i> ADD");
        $('#DataModalAnggota .modal-body form').attr('action','http://localhost/SIMANTO/public/Anggota/tambah')

    })
    $('.tampilModalEditAnggota').click(function(){

        $('#DataModalAnggota #forModalLabel').html("Ubah Data Anggota");
        $('#DataModalAnggota .action').html("<i class='fa fa-edit'></i> EDIT");
        $('#DataModalAnggota .modal-body form').attr('action','http://localhost/SIMANTO/public/Anggota/ubah')
        const idagt = $(this).data('id');

        $.ajax({
            url: 'http://localhost/SIMANTO/public/Anggota/getUbah',
            data: {idagt: idagt},
            method: 'post',
            dataType: 'json',
            success: function(data) {
                var jab = $('#DataModalAnggota #jabatan').val();
                if(jab == '2'){
                    // $('#DataModelsAnggota #mywil').attr('value','');
                    $('#onwil').fadeOut();
                }else{
                    $('#onwil').fadeIn();
                }
                $('#DataModalAnggota #choose').val(data.id_jabatan);
                $('#DataModalAnggota #choose').html(data.jabatan);

                $('#nopintar').val(data.no_pintar);
                $('#nama').val(data.nama);
                if(data.gender != 'LAKI-LAKI'){
                    $('#DataModalAnggota input[value="PEREMPUAN"]').attr("checked","checked");
                }
                else{
                    $('#DataModalAnggota input[value="LAKI-LAKI"]').attr("checked","checked");
           
                }
                $('#notelp').val(data.telpagt);
                $('#nopintar').val(data.no_pintar);
                $('#wilayah').val(data.wilayah);
                $('#DataModalAnggota #idagt').val(data.id_agt);

            }
        });
    })

    // Anggota Admin
    $('#DataModalAnggota .mycabang').click(function(){
        const idcbg = $(this).data('id');

        $.ajax({
            url: 'http://localhost/SIMANTO/public/Wilayah/getWilayah',
            data: {idcbg: idcbg},
            method: 'post',
            dataType: 'json',
            success: function(data) {
                if(data < 1){
                    $('#onwil').fadeOut();
                }else{
                    $('#onwil').fadeIn();
                    $('#wilayah').html('');
                    for(let i = 0; i < data.length; ++i){
                        $('#wilayah').append('<option value="'+(data[i]).id_wil+'">'+(data[i]).nm_wilayah+'</option>');
                    }
                }
            }
        });

    })
    

    //Wilayah
    $('.tampilModalTambahWilayah').click(function(){
        $('#DataModalWilayah #forModalLabel').html("Tambah Data Wilayah");
        $('#DataModalWilayah .action').html("<i class='fa fa-edit'></i> Add");
        $('#DataModalWilayah .modal-body form').attr('action','http://localhost/SIMANTO/public/Wilayah/tambah');

        $('#DataModalWilayah #wilayah').val('');
        $('#DataModalWilayah #choose').val('');
        $('#DataModalWilayah #choose').html('Choose...');
        $('#DataModalWilayah #id').val('');
    })
    $('.tampilModalEditWilayah').click(function(){
        $('#DataModalWilayah #forModalLabel').html("Ubah Data Wilayah");
        $('#DataModalWilayah .action').html("<i class='fa fa-edit'></i> Edit");
        $('#DataModalWilayah .modal-body form').attr('action','http://localhost/SIMANTO/public/Wilayah/ubah');

        const idwil = $(this).data('id');
        // console.log(idwil);
        $.ajax({
            url: 'http://localhost/SIMANTO/public/Wilayah/getUbah',
            data: {id: idwil},
            method: 'post',
            dataType: 'json',
            success: function(wil) {
               console.log(wil.nama_cab);
               $('#DataModalWilayah #wilayah').val(wil.nm_wilayah);
               $('#DataModalWilayah #choose').val(wil.id_cabang);
               $('#DataModalWilayah #choose').html(wil.nama_cab);
               $('#DataModalWilayah #id').val(wil.id_wil);
            }
        });
    })

    //Nasabah
    $('.tampilModalEditNasabah').click(function(){
        $('#DataModalNasabah #forModalLabel').html("Ubah Data Nasabah");
        $('#DataModalNasabah .action').html("<i class='fa fa-edit'></i> Edit");
        $('#DataModalNasabah .modal-body form').attr('action','http://localhost/SIMANTO/public/Nasabah/ubah');

        const idnas = $(this).data('id');
       
        

        $.ajax({
            url: 'http://localhost/SIMANTO/public/Nasabah/getUbah',
            data: {idnas: idnas},
            method: 'post',
            dataType: 'json',
            success: function(data) {
               console.log(data);
               $('#nobuku').val(data.id_nasabah);
               $('#nama').val(data.nama_nas);
               if(data.gender_nas == 'LAKI-LAKI'){
                $('#DataModelsNasabah input[value="LAKI-LAKI"]').attr("checked","checked");
               }else{
                $('#DataModelsNasabah input[value="PEREMPUAN"]').attr("checked","checked");
               }
               $('#notelp').val(data.no_telp_nas);

               $('#mywil').val(data.id_wil);
               
               $('#DataModelsNasabah #id').val(data.id_nasabah);
            }
        });
    })

    //print
    $('#print').click(function(){
        $('#divprint').fadeOut(function(){
        },success = () => {
            window.print();
        });
    })

    //
    $('#myrange').change(function () { 
        var nilaiTarget = $('#myrange').val();
        console.log(nilaiTarget);
        $('.nilaitarget').html(nilaiTarget);
        // $('#range_01').attr('value',nilaiTarget);
    });

    // Transaksi
    // $('.dataTrans').click(function(){
    //     console.log('hi'); 
    // })

});
// END Document Ready

 //HOME 
function showTarget(id){
    var btnclass = $('.pintarget'+id+' i').attr('class');
    switch(btnclass){
      case 'fa fa-minus-circle' :
        $('.target'+id).fadeOut(function(){ 
        },success = () => {
          $('.pintarget'+id+' i').attr('class','fa fa-plus-circle');
        });
        break;
      case 'fa fa-plus-circle' :
        $('.target'+id).fadeIn(function(){
        },success = () => {
          $('.pintarget'+id+' i').attr('class','fa fa-minus-circle');
        });
        break;
      default :
        break;
    }
}
var ResultTgl = 0;

function changeDate(status){
    if(descDate(status) > 0){
        ResultTgl = descDate(status);
        // console.log(ResultTgl);
        var newDate = new Date(ResultTgl);
        $('.dateTarget').html(newDate.toLocaleDateString());
        $('.grafiktahunan').html(newDate.getFullYear());
        $.ajax({
            url: 'http://localhost/SIMANTO/public/Transaksi/getInfoTrans',
            data: {date:ResultTgl},
            method: 'post',
            dataType: 'json',
            success: function(data) {

               console.log(ResultTgl);
               console.log(data);
            //    var jum = data[0].nama;
            // var tampung = 0;
            // var info = data.map(trans => {
            //     var pinjaman = parseInt(trans.besar_pinjaman);
            //     // console.log(pinjaman);
            //     tampung += pinjaman;
            // })
            // for(var i = 0;i < data.length;i++){
            //     tampung += parseInt(data[i].jumlah_bayar);
            //     console.log(tampung);
            //     console.log(data[i].tgl_transaksi)
            // }
            
            //    $('.ajax1').html(data.);
                // console.log(jum);
            }
        });
    }else{
        console.log('perubahan tidak ada');
    }
}
function descDate(status){
    // var tgl_awal = Date.now();
    var date = Date.now();
    var day = (60*60*24*1000) * 30;
    var Datechange;
    if(ResultTgl != 0){
        switch(status){
            case 'tambah':
                Datechange = ResultTgl + day;
                break;
            case 'kurang':
                Datechange = ResultTgl - day;
                break;
            default:
                break;
        }
    }else{
        switch(status){
            case 'tambah':
                Datechange = date + day;
                break;
            case 'kurang':
                Datechange = date - day;
                break;
            default:
                break;
        }
    }
    
    
    // var Datechange = date - totalday;
    var myobj = $.parseJSON('{"date_created":"'+Datechange+'"}'),
        myDate = parseInt(myobj.date_created);
        // myDate = new Date(parseInt(myobj.date_created));
    // console.log(myDate.toLocaleDateString());
    return myDate;
}
function GetWilayah(idwil){
    $.ajax({
            url: 'http://localhost/SIMANTO/public/Wilayah/getUbah',
            data: {id: idwil},
            method: 'post',
            dataType: 'json',
            success: function(data) {
                console.log(data);
                $('#mywil').val(data.id_wil);
                $('#mywil').html(data.id_wil);
            }
    }); 
}

// New Line
function addnewLines(){
    var text = $('#dataInfo').val();
    text = text.replaceWith(/ /g, "[sp] [sp]");
    text = text.replaceWith(/\n/g, "[n1]");
    $('#dataInfo').val(text);
    return false;
}

// Transaksi
// var pinTarget;
function selectedTrans(idnas){
    $.ajax({
        type: "POST",
        url: "http://localhost/SIMANTO/public/Transaksi/getTransaksiNasabahJSON",
        data: {idnas : idnas},
        dataType: "json",
        success: function (response) {
            var option;
            var i = 1;
            response.map(arr => {
                // var dateFormDB = new Date(arr.date_create);
                var status_pembayaran;
                if(arr.status_pembayaran == 1){
                    status_pembayaran = "LUNAS";
                    var newline = '<tr class="target'+arr.id_transaksi+'"><td>'+i+'</td><td>'+arr.tgl_transaksi+'</td><td>'+arr.nama+'</td><td><div class="row"><div class="col">Rp.</div><div class="col">'+arr.jumlah_bayar+'</div></div></td><td>'+status_pembayaran+'</td></tr>';
                    option = option+newline;
                    i++;
                }else{
                    status_pembayaran = "BELUM LUNAS";
                    var newline = '<tr class="target'+arr.id_transaksi+'"><td>'+i+'</td><td>'+arr.tgl_transaksi+'</td><td>'+arr.nama+'</td><td><div class="row"><div class="col">Rp.</div><div class="col">'+arr.jumlah_bayar+'</div></div></td><td>'+status_pembayaran+'</td><td><button type="button" onclick="updateTransaksi('+arr.id_transaksi+')">Pilih</button></td></tr>';
                    option = option+newline;
                    i++;
                }
                // console.log(dateFormDB);
            })
            var newHtml = option;
            $('#TableBodyTrans').html(newHtml);
        }
    });
}

function updateTransaksi(idtrans){
    $.ajax({
        type: "POST",
        url: "http://localhost/SIMANTO/public/Transaksi/getTransaksibyId",
        data: {idtrans : idtrans},
        dataType: "json",
        success: function (response) {
            // if(pinTarget != $('.target'+idtrans)){
            //     pinTarget.css('background','none');
            //     pinTarget = $('.target'+idtrans);
            //     pinTarget.css('background','green');
            // }else{
            //     alert('same');
            // }
            $('#notrans').val(response.tgl_transaksi);
            $('#besarpinjaman').val(response.jumlah_bayar);
            $('#outputbesarpinjam').val(response.jumlah_bayar);
            $('#sisabayar').val(response.sisa_pinjam);
            $('#idtrans').val(response.id_transaksi);
            // $('#notrans').attr();
            var income;
            if(response.income == null){
                income = 0;
            }else{
                income = response.income;
            }
            $('#last_pay_value').val(income);
            $('#outputincome').val(income);
            $('#noagt').val(response.Nomor_Nasabah);
            $('#nmagt').val(response.nama_nas);
            $('#namaao').val(response.nama);
            $('#idao').val(response.id_agt);
        }
    });
}

var simpanHtmlTrans;
function ubahJenisTrans(jenis){
    switch(jenis){
        case 'NewTrans':
            // simpanHtmlTrans = $('.dataPeminjam').html();
            $('.page-title').html('Transaksi Baru');
            $('.page-for').html('Data Pinjaman');
            $('.dataPeminjam').html(simpanHtmlTrans);

            $('#form-action').attr('action','http://localhost/SIMANTO/public/Transaksi/tambah');
            // jumlah bayar
            $('label[for="besarpinjam"]').html('Jumlah Pinjaman');
            $('#besarpinjam').attr('name','besarpinjam');
            // tanggal bayar
            $('label[for="tgltunggak"]').html('Tanggal Tunggak');
            $('#tgltunggak').attr('name','tgltunggak');
            break;
        case 'PayTrans':
            simpanHtmlTrans = $('.dataPeminjam').html();
            var MyTransArray;
            $.ajax({
                type: "GET",
                url: "http://localhost/SIMANTO/public/Nasabah/getAllForJSON",
                dataType: "json",
                success: function (response) {
                    var option;
                    response.map(arr => {
                        var newline = '<option value="'+arr.id_nasabah+'" onclick="selectedTrans('+arr.id_nasabah+')">'+arr.nama_nas+'</option>';
                        option = option+newline;
                    })
                    var tabelHasil = '<div class="table-responsive"><table id="example" class="text-center table table-bordered"><thead class="gradient-forest text-white"><tr><th>No</th><th>NO TRANSAKSI</th><th>AO</th><th>BUNGA</th><th>STATUS PEMBAYARAN</th><th>OPTION</th></tr></thead><tbody id="TableBodyTrans"></tbody></table></div>';
        
                    var NewHtml = '<div class="form-group"><label>Pilih Nama Nasabah</label><select class="form-control" name="pilihao" id="PilihAO" required><option>Choose...</option>'+option+'</select></div>'+tabelHasil+'<div class="form-group"><label>No Transaksi</label><input class="form-control" type="text" id="notrans" name="notrans" disabled></div><div class="form-group"><label>Nomor Anggota</label><input class="form-control" type="text" id="noagt" name="noagt" disabled></div><div class="form-group"><label>Nama Anggota</label><input class="form-control" type="text" id="nmagt" name="nmagt" disabled></div><div class="form-group"><label>Nama AO</label><input class="form-control" type="text" id="namaao" name="namaao" disabled></div><div class="form-group"><label>Besar Pinjaman</label><input class="form-control" type="number" id="besarpinjaman" name="besarpinjaman" disabled></div><div class="form-group"><label>Sudah Dibayar</label><input class="form-control" type="number" name="last_pay_value" id="last_pay_value" disabled></div><div class="form-group"><label>Sisa Pembayaran</label><input class="form-control" type="text" id="sisabayar" name="sisabayar" disabled></div><input type="hidden" name="idtrans" id="idtrans"><input type="hidden" name="outputbesarpinjam" id="outputbesarpinjam"><input type="hidden" name="outputincome" id="outputincome"><input type="hidden" name="idao" id="idao">';
                    $('.page-title').html('Pembayaran');
                    $('.page-for').html('Data Setor');
                    $('.dataPeminjam').html(NewHtml);
                    
                    $('#form-action').attr('action','http://localhost/SIMANTO/public/Transaksi/update');
                    // jumlah bayar
                    $('label[for="besarpinjam"]').html('Jumlah Bayar');
                    $('#besarpinjam').attr('name','jumlahbayar');
                    // tanggal bayar
                    $('label[for="tgltunggak"]').html('Tanggal Bayar');
                    $('#tgltunggak').attr('name','tglbayar');
                }
            });
            break;
        default:
            break;
    }
}
