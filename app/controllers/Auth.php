<?php

class Auth extends Controller{
    public function index()
    {
        $data['title'] = 'SIMANTO | LOGIN PAGES';
        $this->view('templates/auth/header',$data);
        $this->view('auth/index');
        $this->view('templates/auth/footer');
    }
    public function login()
    {
        if($this->model('Auth_model')->loginUser($_POST) > 0){
            $_SESSION['uname'] = $_POST['username'];
            header('Location: ' . BASEURL . 'Home');
        }else{
            Flasher::setFlash('Gagal','username dan password anda salah','danger','icon-close');
            header('Location: ' . BASEURL . 'Auth');
            exit;
        }
    }
    public function logout()
    {
        Flasher::setFlash('Berhasil','anda telah logout','secondary','icon-trash');
        header('Location: ' . BASEURL . 'Auth');  
        session_start();
        session_destroy(); 
    }
}