<?php

class Cabang extends Controller{
    public function __construct()
    {
        if(is_null($_SESSION['info']['uname']) && is_null($_SESSION['info']['pass'])){
            header('Location: ' . BASEURL . 'Auth');
            exit;
        }
        if($_SESSION['info']['role'] !== 'ADMIN'){
            header('Location: ' . BASEURL . 'Auth/page404');
            // var_dump($_SESSION['info']['role']);
        }
    }
    public function index()
    {
        $data['title'] = 'CABANG PINTAR';
        $data['cbg'] = $this->model('Cabang_model')->getAllCabang();
        $this->view('templates/header',$data);
        $this->view('templates/topbar',$data);
        $this->view('templates/menus');
        $this->view('cabang/index',$data);
        $this->view('templates/footer');
    }
    public function tambah()
    {
        if($this->model('Cabang_model')->tambahDataCabang($_POST) > 0){
            Flasher::setFlash('Berhasil','ditambahkan','success','fa fa-check');
            header('Location: ' . BASEURL . 'Cabang');
            exit;
        }else{
            Flasher::setFlash('Gagal','ditambahkan','danger','icon-close');
            header('Location: ' . BASEURL . 'Cabang');
            exit;
        }
    }
    public function hapus($id)
    {
        if($this->model('Cabang_model')->hapusDatabyID($id) > 0){
            Flasher::setFlash('Berhasil','dihapus','secondary','fa fa-trash');
            header('Location: ' . BASEURL . 'Cabang');
            exit;
        }else{
            Flasher::setFlash('Gagal','ditambahkan','danger','icon-close');
            header('Location: ' . BASEURL . 'Cabang');
            exit;
        }
    }
    public function getUbah()
    {
        echo json_encode($this->model('Cabang_model')->getCabangbyId($_POST['id']));
    }
    public function ubah()
    {
        if($this->model('Cabang_model')->ubahDataCabang($_POST) > 0){
            Flasher::setFlash('Berhasil','diubah','success','fa fa-check');
            header('Location: ' . BASEURL . 'Cabang');
            exit;
        }else{
            Flasher::setFlash('Gagal','diubah','danger','icon-close');
            header('Location: ' . BASEURL . 'Cabang');
            exit;
        }
    }

    public function detail($id){
        $data['cbg'] = $this->model('Cabang_model')->getCabangbyId($id);
        $data['title'] = 'CABANG '.$data['cbg']['nama_cab'];
        $this->view('templates/header',$data);
        $this->view('templates/topbar',$data);
        $this->view('templates/menus');
        $this->view('cabang/detail',$data);
        $this->view('templates/footer');
    }

}