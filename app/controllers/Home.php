<?php

class Home extends Controller{
    public function index(){
        $data['title'] = 'DASHBOARD';
        $this->view('templates/header',$data);
        $this->view('templates/topbar');
        $this->view('templates/menus');
        $this->view('home/index');
        $this->view('templates/footer');
    }
}