<?php

class Help extends Controller{
    public function __construct()
    {
        if(is_null($_SESSION['info']['uname']) && is_null($_SESSION['info']['pass'])){
            header('Location: ' . BASEURL . 'Auth');
            exit;
        }
    }
    public function index()
    {
        $data['title'] = 'Help';
        $this->view('templates/header',$data);
        $this->view('templates/topbar',$data);
        $this->view('templates/menus');
        $this->view('help/index',$data);
        $this->view('templates/footer');
    }
    public function created()
    {
        $data['title'] = 'Help | Creator';
        $this->view('templates/header',$data);
        $this->view('templates/topbar',$data);
        $this->view('templates/menus');
        $this->view('help/creator',$data);
        $this->view('templates/footer');
    }
}