<?php

class Nasabah extends Controller{
    public function __construct()
    {
        if(is_null($_SESSION['info']['uname']) && is_null($_SESSION['info']['pass'])){
            header('Location: ' . BASEURL . 'Auth');
            exit;
        }
    }
    public function index(){
        $data['title'] = 'NASABAH PINTAR';
        $data['nas'] = $this->model('Nasabah_model')->getNasabahbyCabang($_SESSION['manager']['id_cabang']);
        $data['wil'] = $this->model('Wilayah_model')->getWilayahbyIdCabang($_SESSION['manager']['id_cabang']);
        $this->view('templates/header',$data);
        $this->view('templates/topbar',$data);
        $this->view('templates/menus');
        $this->view('nasabah/index',$data);
        $this->view('templates/footer');
    }
    public function addNew(){
        $data['title'] = 'ADD NASABAH';
        $data['wil'] = $this->model('Wilayah_model')->getWilayahbyIdCabang($_SESSION['manager']['id_cabang']);
        $this->view('templates/header',$data);
        $this->view('templates/topbar',$data);
        $this->view('templates/menus');
        $this->view('nasabah/addnasabah',$data);
        $this->view('templates/footer');
    }
    public function detail($idnas)
    {
        $data['title'] = 'DETAIL NASABAH';
        $data['nas'] = $this->model('Transaksi_model')->getTransaksiNasabah($idnas);
        // var_dump($data['nas']);
        $this->view('templates/header',$data);
        $this->view('templates/topbar',$data);
        $this->view('templates/menus');
        $this->view('nasabah/detail',$data);
        $this->view('templates/footer');
    }
    public function tambah()
    {
        if($this->model('Nasabah_model')->tambahDataNasabah($_POST) > 0){
            Flasher::setFlash('Berhasil','ditambahkan','success','fa fa-check');
            header('Location: ' . BASEURL . 'Nasabah');
            exit;
        }else{
            Flasher::setFlash('Gagal','ditambahkan','danger','icon-close');
            header('Location: ' . BASEURL . 'Nasabah');
            exit;
        }
    }
    public function hapus($id)
    {
        if($this->model('Nasabah_model')->hapusDatabyID($id) > 0){
            Flasher::setFlash('Berhasil','dihapus','secondary','fa fa-trash');
            header('Location: ' . BASEURL . 'Nasabah');
            exit;
        }else{
            Flasher::setFlash('Gagal','dihapus','danger','icon-close');
            header('Location: ' . BASEURL . 'Nasabah');
            exit;
        }
    }
    public function getUbah()
    {
        echo json_encode($this->model('Nasabah_model')->getNasabahbyId($_POST['idnas']));
    }
    public function ubah()
    {
        if($this->model('Nasabah_model')->ubahDataNasabah($_POST) > 0){
            Flasher::setFlash('Berhasil','diubah','success','fa fa-check');
            header('Location: ' . BASEURL . 'Nasabah');
            exit;
        }else{
            Flasher::setFlash('Gagal','diubah','danger','icon-close');
            header('Location: ' . BASEURL . 'Nasabah');
            exit;
        }
    }
    public function getAllForJSON()
    {
        echo json_encode($this->model('Nasabah_model')->getNasabahbyCabang($_SESSION['manager']['id_cabang']));
    }
}