<?php

class Penghargaan extends Controller{
    public function index()
    {
        $data['title'] = 'PENGHARGAAN';
        $this->view('templates/header',$data);
        $this->view('templates/topbar',$data);
        $this->view('templates/menus');
        $this->view('penghargaan/index',$data);
        $this->view('templates/footer');
    }
}