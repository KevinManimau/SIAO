$(function() {

    // CABANG
    $('.tampilModalTambahCabang').click(function(){
        $('#forModalLabel').html("Tambah Data Cabang");
        $('.action').html("<i class='fa fa-plus'></i> ADD");
        $('.modal-body form').attr('action','http://localhost/SIMANTO/public/Cabang/tambah')

        $('#nrp').val('');
        $('#nama').val('');
        $('#choose').val('');
        $('#choose').html('Choose...');
    })
    $('.tampilModalEditCabang').click(function(){
        $('#forModalLabel').html("Ubah Data Cabang");
        $('.action').html("<i class='fa fa-edit'></i> EDIT");
        $('.modal-body form').attr('action','http://localhost/SIMANTO/public/Cabang/ubah')

        const id = $(this).data('id');
        
        $.ajax({
            url: 'http://localhost/SIMANTO/public/Cabang/getUbah',
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

    // MANAGER
    $('.tampilModalTambahManager').click(function(){
        $('#forModalLabel').html("Tambah Data Manager");
        $('.action').html("<i class='fa fa-plus'></i> ADD");

        $('#nrp').val('');
        $('#nama').val('');
        $('#choose').val('');
        $('#choose').html('Choose...');

        $.ajax({
            url: 'http://localhost/SIMANTO/public/Manager/getAllCabang',
            dataType: 'json',
            success: function(data) {
                var count = 0;
                for(var i = 0; i < $(this).data.length; ++i){
                    if(data[i] == 2){
                        console.log('ini data ke'+data[count])
                        // $('.cabang').child('<option value="'+data[i].id+'">'+data[i].nama_cab+'</option>');
                        count++;
                    }
                }
               
            }
        });
    })
    $('.tampilModalEditManager').click(function(){
        $('#forModalLabel').html("Ubah Data Manager");
        $('.action').html("<i class='fa fa-edit'></i> EDIT");
        $('.modal-body form').attr('action','http://localhost/SIMANTO/public/Manager/ubah')

        const id = $(this).data('id');
        
        $.ajax({
            url: 'http://localhost/SIMANTO/public/Cabang/getUbah',
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

});