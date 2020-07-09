<?php

class Transaksi extends Controller{
    public function __construct()
    {
        if(is_null($_SESSION['info']['uname']) && is_null($_SESSION['info']['pass'])){
            header('Location: ' . BASEURL . 'Auth');
            exit;
        }
    }
    public function index()
    {
        $data['title'] = 'TRANSAKSI';
        $data['transaksi'] = $this->model('Transaksi_model')->getTransaksibyIdCab($_SESSION['manager']['id_cabang']);
        $this->view('templates/header',$data);
        $this->view('templates/topbar');
        $this->view('templates/menus');
        $this->view('transaksi/index',$data);
        $this->view('templates/footer');
    }
    public function addNew(){
        $data['title'] = 'TRANSAKSI BARU';
        $data['agt'] = $this->model('Anggota_model')->getAnggotabyIdCabang($_SESSION['manager']['id_cabang']);
        $data['jns'] = $this->model('Jenis_model')->getAllJenisPinjaman();
        $data['nas'] = $this->model('Nasabah_model')->getNasabahbyCabang($_SESSION['manager']['id_cabang']);
        
        $this->view('templates/header',$data);
        $this->view('templates/topbar');
        $this->view('templates/menus');
        $this->view('transaksi/addtrans',$data);
        $this->view('templates/footer');
    }
    public function tambah(){
        if($this->model('Transaksi_model')->tambahDataTransaksi($_POST) > 0){
            Flasher::setFlash('Berhasil','ditambah','success','fa fa-check');
            header('Location: ' . BASEURL . 'Transaksi');
            exit;
        }else{
            Flasher::setFlash('Gagal','ditambah','danger','icon-close');
            header('Location: ' . BASEURL . 'Transaksi');
            exit;
        }
    }
    public function hapus($id)
    {
        if($this->model('Transaksi_model')->hapusDatabyID($id) > 0){
            Flasher::setFlash('Berhasil','dihapus','success','fa fa-trash');
            header('Location: ' . BASEURL . 'Transaksi');
            exit;
        }else{
            Flasher::setFlash('Gagal','dihapus','danger','icon-close');
            header('Location: ' . BASEURL . 'Transaksi');
            exit;
        }
    }
    public function update(){
        if($this->model('Transaksi_model')->updateDataTransaksi($_POST) > 0){
            Flasher::setFlash('Berhasil','diupdate','success','fa fa-check');
            header('Location: ' . BASEURL . 'Transaksi');
            exit;
        }else{
            Flasher::setFlash('Gagal','diupdate','danger','icon-close');
            header('Location: ' . BASEURL . 'Transaksi');
            exit;
        }
    }
    public function getInfoTrans()
    {
        echo json_encode($this->model('Transaksi_model')->getTransaksibyDate($_POST['date'],$_SESSION['manager']['id_cabang']));
    }
    public function getDataTahunan()
    {
        header("Access-Control-Allow-Origin:*");
        header("Content-type: application/json");
        echo json_encode($this->model('Transaksi_model')->getDataBulananTahunan($_SESSION['manager']['id_cabang']));
    }
    public function getAllForJson()
    {
        header("Access-Control-Allow-Origin:*");
        header("Content-type: application/json");
        echo json_encode($this->model('Transaksi_model')->getTransaksibyIdCab($_SESSION['manager']['id_cabang']));   
    }
    public function getTransaksiNasabahJSON()
    {
        header("Access-Control-Allow-Origin:*");
        header("Content-type: application/json");
        echo json_encode($this->model('Transaksi_model')->getTransaksiNasabah($_POST['idnas']));      
    }
    public function getTransaksibyId()
    {
        header("Access-Control-Allow-Origin:*");
        header("Content-type: application/json");
        echo json_encode($this->model('Transaksi_model')->getTransaksibyId($_POST['idtrans']));      
    }
}