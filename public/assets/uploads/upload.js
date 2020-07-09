$(document).ready(function(e){
    $('#uploadBtn').on('click',function(e){
        e.preventDefault();
        const inputimage = $('#image');
        const image = inputimage[0]['files'][0];
        console.log(image);
        $.ajax({
            url:"http://localhost/SIMANTO/public/assets/uploads/ajaxupload.php",
            type:"POST",
            data:{image: image},
            contentType:false,
            cache:false,
            processData:false,
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
                }else{
                    //view upload file
                    $('#preview').html(data).fadeIn();
                    $('#form')[0].reset();
                }
            },
            error:function(e)
            {
                $('#err').html(e).fadeIn();
            }
        });
    });
});