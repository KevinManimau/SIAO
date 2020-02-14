<?php

class Anggota extends Controller{
    public function __construct()
    {
        if(is_null($_SESSION['info']['uname'])){
            Flasher::setFlash('Salah','silakan login terlebih dahulu','secondary','icon-close');
            header('Location: ' . BASEURL . 'Auth');
            exit;
        }
        if($_SESSION['info']['role'] == 'ADMIN'){
            header('Location: ' . BASEURL . 'Auth/page404');
        }
    }
    public function index(){
        $data['title'] = 'ANGGOTA PINTAR';
        $data['agt'] = $this->model('Anggota_model')->getAnggotabyIdCabang($_SESSION['manager']['id_cabang']);
        // $data['agtjbt'] = $this->model('Jabatan_model')->getJabatanbyId($data['agt']['id_jabatan']);
        $data['jbt'] = $this->model('Jabatan_model')->getAllJabatan();
        $data['wilayah'] = $this->model('Wilayah_model')->getWilayahbyIdCabang($_SESSION['manager']['id_cabang']);
        $this->view('templates/header',$data);
        $this->view('templates/topbar',$data);
        $this->view('templates/menus');
        $this->view('anggota/index',$data);
        $this->view('templates/footer');
    }
    public function tambah()
    {
        if($this->model('Anggota_model')->tambahDataAnggota($_POST) > 0){
            Flasher::setFlash('Berhasil','ditambahkan','success','fa fa-check');
            header('Location: ' . BASEURL . 'Anggota');
            exit;
        }else{
            Flasher::setFlash('Gagal','ditambahkan','danger','icon-close');
            header('Location: ' . BASEURL . 'Anggota');
            exit;
        }
    }
    public function hapus($id)
    {
        if($this->model('Anggota_model')->hapusDatabyID($id) > 0){
            Flasher::setFlash('Berhasil','dihapus','secondary','fa fa-trash');
            header('Location: ' . BASEURL . 'Anggota');
            exit;
        }else{
            Flasher::setFlash('Gagal','dihapus','danger','icon-close');
            header('Location: ' . BASEURL . 'Anggota');
            exit;
        }
    }
}