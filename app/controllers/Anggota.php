<?php

class Anggota extends Controller{
    public function __construct(){
        $this->db = new Database;
    }
    public function index(){
        $data['title'] = 'ANGGOTA PINTAR';
        $data['agt'] = $this->model('Anggota_model')->getAllAnggota();
        $this->view('templates/header',$data);
        $this->view('templates/topbar',$data);
        $this->view('templates/menus');
        $this->view('anggota/index',$data);
        $this->view('templates/footer');
    }
}