$(function() {

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
        $('#forModalLabel').html("Ubah Data Manager");
        $('.action').html("<i class='fa fa-edit'></i> EDIT");
        $('.modal-body form').attr('action','http://localhost/SIMANTO/public/Manager/ubah')

        const id = $(this).data('id');
        
        $.ajax({
            url: 'http://localhost/SIMANTO/public/Manager/getUbah',
            data: {id: id},
            method: 'post',
            dataType: 'json',
            success: function(data) {
               
                $('#nrp').val(data.nrp);
                $('#nama').val(data.nama_cab);
                if(data.status != 'KC'){
                    $('input[value="kcp"]').attr("checked","checked");
      
                }
                else{
                    $('input[value="kc"]').attr("checked","checked");
           
                }
                // $('#nrp').attr('hi');
                // $('#nrp').val(data.status);
                $('#choose').val(data.jabatan_cab);
                $('#choose').html(data.jabatan_cab);
                $('#id').val(data.id);

             
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
        var n1 = $('#wilayah').html();
        if(jab == 'ASSISTEN'){
            // $('#DataModelsAnggota #mywil').attr('value','');
            $('#onwil').fadeOut();
            $('#wilayah').html('');
        }else{
            $('#onwil').fadeIn();
            $('#wilayah').html(n1);
        }
    })

    $('#DataModelsAnggota #wilayah').click(function(){
        alert('sds');
    })

});