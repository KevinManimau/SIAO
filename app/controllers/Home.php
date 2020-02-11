<?php

class Home extends Controller{
    public function __construct()
    {
        if(is_null($_SESSION['info']['uname'])){
            Flasher::setFlash('Salah','silakan login terlebih dahulu','secondary','icon-close');
            header('Location: ' . BASEURL . 'Auth');
            exit;
        }
    }
    public function index(){
        $data['title'] = 'DASHBOARD';
        $this->view('templates/header',$data);
        $this->view('templates/topbar');
        $this->view('templates/menus');
        $this->view('home/index');
        $this->view('templates/footer');
    }
}