<?php

class Transaksi extends Controller{
    public function index()
    {
        $data['title'] = 'TRANSAKSI';
        // $data['cbg'] = $this->model('Cabang_model')->getAllCabang();
        $this->view('templates/header',$data);
        $this->view('templates/topbar');
        $this->view('templates/menus');
        $this->view('transaksi/index');
        $this->view('templates/footer');
    }
}