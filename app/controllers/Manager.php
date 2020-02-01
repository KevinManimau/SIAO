<?php

class Manager extends Controller{
    public function __construct(){
        $this->db = new Database;
    }
    public function index()
    {
        $data['title'] = 'MANAGER PINTAR';
        $data['mgr'] = $this->model('Maneger_model')->getAllManeger();
        // $cbg = $this->db->query('SELECT * FROM cabang WHERE id=:id');
        // $this->db->bind('id',$data['mgr'][0]['id_cabang']);
        var_dump($data['mgr']);
        $this->view('templates/header',$data);
        $this->view('templates/topbar',$data);
        $this->view('templates/menus');
        $this->view('manager/index',$data);
        $this->view('templates/footer');
    }
    public function getAllCabang(){
        echo json_encode($this->model('Cabang_model')->getAllCabang());
    }
}