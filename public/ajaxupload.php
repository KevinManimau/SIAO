<?php
$valid_extension = array(
    'jpeg','jpg','doc','gif','bmp','pdf','png','ppt'
);//valid extension
$path = 'assets/images/company/Anggota/';//upload directory
if(isset($_POST['image'])){
    // $_FILES['image'] = $_POST['image'];
    // echo json_encode($_POST['image']);
    $img = $_POST['image'];
    // echo $img;
    //get uploaded file
    $ext = strtolower(pathinfo($img,PATHINFO_EXTENSION));
    //can upload same image using rand
    $final_image = rand(1000,1000000).$img;
    //check valid format
    if(in_array($ext,$valid_extension))
    {
        $path=$path.strtolower($final_image);
        if(move_uploaded_file($path)){
            echo "<img width='100' src='".$path."'>";
        }
    }else{
        echo 'invalid';
    }
}
?>