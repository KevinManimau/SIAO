<?php
$valid_extension = array(
    'jpeg','jpg','doc','gif','bmp','pdf','png','ppt'
);//valid extension
$path = 'img/';//upload directory
if(isset($_POST['data'])){
    $img = $_POST['data']['name'];
    $tmp = $_POST['data']['tmp_name'];
    //get uploaded file
    $ext = strtolower(pathinfo($img,PATHINFO_EXTENSION));
    //can upload same image using rand
    // $final_image = rand(1000,1000000).$img;
    //check valid format
    if(in_array($ext,$valid_extension))
    {
        $path=$path.strtolower($img);
        if(move_uploaded_file($path)){
            echo "<img width='100' src='http://localhost/SIMANTO/public/assets/uploads/".$path."'>";
        }
    }else{
        echo 'invalid';
    }
}else{
    var_dump($_POST['data']);
}
?>