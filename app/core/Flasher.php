<?php

class Flasher{

public static function setFlash($pesan, $aksi,$tipe,$icon)
{
    $_SESSION['alert'] = [
        'pesan' => $pesan,
        'aksi' => $aksi,
        'tipe' => $tipe,
        'icon' => $icon
    ];
}
public static function alert()
{
    if(isset($_SESSION['alert'])){
        echo '<div class="alert alert-outline-'. $_SESSION['alert']['tipe'] .' alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <div class="alert-icon">
                <i class="'. $_SESSION['alert']['icon'] .'"></i>
                </div>
                <div class="alert-message">
                <span>Data anda <strong> '. $_SESSION['alert']['pesan'] .' </strong> ' . $_SESSION['alert']['aksi'] . '</span>
                </div>
            </div>';
        unset($_SESSION['alert']);
    }
}

}