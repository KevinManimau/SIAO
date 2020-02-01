<?php

class Kredit extends Controller{
    public function index()
    {
        $data['title'] = 'KREDIT';
        // $data['cbg'] = $this->model('Cabang_model')->getAllCabang();
        $this->view('templates/header',$data);
        $this->view('templates/topbar',$data);
        $this->view('templates/menus');
        $this->view('kredit/index',$data);
        $this->view('templates/footer');
    }
}