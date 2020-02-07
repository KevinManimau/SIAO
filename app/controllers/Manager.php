<?php

class Manager extends Controller{
    public function __construct(){
        $this->db = new Database;
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
                    Flasher::setFlash('Gagal','ditambahkan','danger','icon-close');
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
            Flasher::setFlash('Gagal','ditambahkan','danger','icon-close');
            header('Location: ' . BASEURL . 'Manager');
            exit;
        }
    }
    public function getAllCabang(){
        echo json_encode($this->model('Cabang_model')->getAllCabang());
    }
}