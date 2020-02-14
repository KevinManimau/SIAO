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
        $('#DataModelsManager #image').val('');
        $('#DataModelsManager #username').val('');
        $('#DataModelsManager #password1').val('');
    })
    $('.tampilModalEditManager').click(function(){
        $('#DataModelsManager #forModalLabel').html("Ubah Data Manager");
        $('#DataModelsManager .action').html("<i class='fa fa-edit'></i> EDIT");
        $('#DataModelsManager .modal-body form').attr('action','http://localhost/SIMANTO/public/Manager/ubah')

        const idman = $(this).data('id');
        
        $.ajax({
            url: 'http://localhost/SIMANTO/public/Manager/getUbah',
            data: {id: idman},
            method: 'post',
            dataType: 'json',
            success: function(data) {
               
                // $('#nrp').val(data.nrp);
                // $('#nama').val(data.nama_cab);
                // if(data.status != 'KC'){
                //     $('input[value="kc"]').removeAttr("checked","checked");
                //     $('input[value="kcp"]').attr("checked","checked");
                //     $('input[value="kc"]').removeAttr("checked","checked");
                // }
                // else{
                //     $('input[value="kcp"]').removeAttr("checked","checked");
                //     $('input[value="kc"]').attr("checked","checked");
                //     $('input[value="kcp"]').removeAttr("checked","checked");           
                // }
                // // $('#nrp').attr('hi');
                // // $('#nrp').val(data.status);
                // $('#choose').val(data.jabatan_cab);
                // $('#choose').html(data.jabatan_cab);
                // $('#id').val(data.id);
                console.log(data);
             
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
    $('#DataModelsAnggota #jabatan').click(function(){
        var jab = $('#DataModelsAnggota #jabatan').val();
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
});
