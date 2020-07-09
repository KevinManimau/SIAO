<?php

class Auth extends Controller{
    public function index()
    {
        $data['title'] = 'STICO | LOGIN PAGES';
        $this->view('templates/auth/header',$data);
        $this->view('auth/index');
        $this->view('templates/auth/footer');
    }
    public function login()
    {
        if($this->model('User_model')->getUserforAuth($_POST)){
            $usession = $this->model('User_model')->getUserforAuth($_POST);
            $idrole = $usession['id_role'];
            $myrole = $this->model('Role_model')->getRolebyId($idrole);
            $menurole = $this->model('HakAkses_model')->getHakAksesbyIdRole($idrole);
            $yourmenu=[];
            $I=0;
            foreach($menurole as $menu){
                $menn = $this->model('Menu_model')->getMenubyId($menu['id_menu']);
                $yourmenu[$I]=[
                    "id_menu"=> $menn['id_menu'],
                    "judul_menu"=>$menn['judul_menu'],
                    "icon"=>$menn['icon'],
                    "url"=>$menn['url'],
                    "is_active"=>$menn['is_active']
                ];
                $I++;
            }

            $uid = $usession['id_user'];
            // $timeuser = $this->model('User_model')->UpdateTimeUser($uid);
            if($this->model('User_model')->UpdateTimeUser($uid) > 0){
                $uid = $usession['id_user'];
                $mgr =  $this->model('Auth_model')->getidManager($uid);
                // $idmgr = $mgr['id_manager'];
                $_SESSION['info'] = [
                    'uname' => $usession['username'],
                    'pass' => $_POST['password'], 
                    'idrole' => $myrole['id'],
                    'role' => $myrole['role']
                ];
                $_SESSION['manager'] = $mgr;
                $_SESSION['menu']=$yourmenu;
                header('Location: ' . BASEURL . 'Home');

            }else{
                Flasher::setFlash('Gagal','username dan password anda salah','danger','icon-close');
                header('Location: ' . BASEURL . 'Auth');
                exit;
            }       
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
    public function page404()
    {
        $this->view('auth/404');
    }
    public function lockon()
    {
        // unset($_SESSION['info']['pass']);
        // var_dump($_SESSION['info']);
        $data['title'] = 'LOCK SCREEN';
        $this->view('templates/auth/header',$data);
        $this->view('auth/lockon');
        $this->view('templates/auth/footer');
    }
    public function unlock()
    {
        $_SESSION['info']['pass'] = $_POST['mautahu'];
        header('Location: ' . BASEURL . 'Home'); 
    }
}