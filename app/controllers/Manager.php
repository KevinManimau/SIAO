<?php

class Manager extends Controller{
    public function __construct()
    {
        if(is_null($_SESSION['info']['uname'])){
            Flasher::setFlash('Salah','silakan login terlebih dahulu','secondary','icon-close');
            header('Location: ' . BASEURL . 'Auth');
            exit;
        }
        if($_SESSION['info']['role'] !== 'ADMIN'){
            header('Location: ' . BASEURL . 'Auth/page404');
        }
    }
    public function index()
    {
        $data['title'] = 'MANAGER PINTAR';
        $data['mgr'] = $this->model('Manager_model')->getAllManager();
        $data['cbg'] = $this->model('Cabang_model')->getAllCabang();
        $this->view('templates/header',$data);
        $this->view('templates/topbar',$data);
        $this->view('templates/menus');
        $this->view('manager/index',$data);
        $this->view('templates/footer');
    }
    public function tambah()
    {
        if($_POST > 0){
            if($this->model('User_model')->tambahDataUser($_POST) > 0){
                $user = $this->model('User_model')->getUserbyUsername($_POST);
                if($this->model('Manager_model')->tambahDataManager($_POST,$user) > 0){
                    Flasher::setFlash('Berhasil','ditambahkan','success','fa fa-check');
                    header('Location: ' . BASEURL . 'Manager');
                    exit;
                }
                else{
                    Flasher::setFlash('Gagal','ditambahkan, Nama Manager Sudah Ada','danger','icon-close');
                    header('Location: ' . BASEURL . 'Manager');
                    exit;
                }
            }
            else{
                Flasher::setFlash('Gagal','Username Sudah Ada','danger','icon-close');
                header('Location: ' . BASEURL . 'Manager');
                exit;
            }
        }else{
            Flasher::setFlash('Gagal','ditambahkan, Mohon Melengkapi Data Pada Form','danger','icon-close');
            header('Location: ' . BASEURL . 'Manager');
            exit;
        }
    }
    public function getAllCabang(){
        echo json_encode($this->model('Cabang_model')->getAllCabang());
    }
    public function hapus($id)
    {
        $mgr = $this->model('Manager_model')->getManagerbyId($id);
        $userid = $mgr['id_user'];
        // var_dump($userid);
        if($this->model('User_model')->hapusDatabyID($userid) > 0){
            if($this->model('Manager_model')->hapusDatabyID($id) > 0){
                Flasher::setFlash('Berhasil','dihapus','secondary','fa fa-trash');
                header('Location: ' . BASEURL . 'Manager');
                exit;
            }else{
                Flasher::setFlash('Gagal','dihapus','danger','icon-close');
                header('Location: ' . BASEURL . 'Manager');
                exit;
            }
        }else{
            Flasher::setFlash('Gagal','dihapus','danger','icon-close');
            header('Location: ' . BASEURL . 'Manager');
            exit;
        }
        
    }
    public function getUbah()
    {
        echo json_encode($this->model('Manager_model')->getManagerbyId($_POST['id']));
    }
}