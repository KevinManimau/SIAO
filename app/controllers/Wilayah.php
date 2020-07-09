<?php

class Wilayah extends Controller{
    public function __construct()
    {
        if(is_null($_SESSION['info']['uname']) && is_null($_SESSION['info']['pass'])){
            header('Location: ' . BASEURL . 'Auth');
            exit;
        }
        if($_SESSION['info']['role'] !== 'ADMIN'){
            header('Location: ' . BASEURL . 'Auth/page404');
        }
    }
    public function index()
    {
        $data['title'] = 'WILAYAH PINTAR';
        $data['wil'] = $this->model('Wilayah_model')->getAllWilayah();
        $data['cbg'] = $this->model('Cabang_model')->getAllCabang();
        $this->view('templates/header',$data);
        $this->view('templates/topbar',$data);
        $this->view('templates/menus');
        $this->view('cabang/wilayah',$data);
        $this->view('templates/footer');
    }
    public function tambah()
    {
        if($this->model('Wilayah_model')->tambahDataWilayah($_POST) > 0){
            Flasher::setFlash('Berhasil','ditambahkan','success','fa fa-check');
            header('Location: ' . BASEURL . 'Wilayah');
            exit;
        }else{
            Flasher::setFlash('Gagal','ditambahkan','danger','icon-close');
            header('Location: ' . BASEURL . 'Wilayah');
            exit;
        }
    }
    public function getUbah()
    {
        echo json_encode($this->model('Wilayah_model')->getWilayahbyId($_POST['id']));
    }
    public function hapus($id)
    {
        if($this->model('Wilayah_model')->hapusDatabyID($id) > 0){
            Flasher::setFlash('Berhasil','dihapus','secondary','fa fa-trash');
            header('Location: ' . BASEURL . 'Wilayah');
            exit;
        }else{
            Flasher::setFlash('Gagal','ditambahkan','danger','icon-close');
            header('Location: ' . BASEURL . 'Wilayah');
            exit;
        }
    }
    public function ubah()
    {
        if($this->model('Wilayah_model')->ubahDataWilayah($_POST) > 0){
            Flasher::setFlash('Berhasil','diubah','success','fa fa-check');
            header('Location: ' . BASEURL . 'Wilayah');
            exit;
        }else{
            Flasher::setFlash('Gagal','diubah','danger','icon-close');
            header('Location: ' . BASEURL . 'Wilayah');
            exit;
        }
    }
    public function getWilayah()
    {
        echo json_encode($this->model('Wilayah_model')->getWilayahbyIdCabang($_POST['idcbg']));
    }

}