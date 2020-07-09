<?php

class Anggota extends Controller{
    public function __construct()
    {
        if(is_null($_SESSION['info']['uname']) && is_null($_SESSION['info']['pass'])){
            header('Location: ' . BASEURL . 'Auth');
            exit;
        }
        // if($_SESSION['info']['role'] == 'ADMIN'){
        //     header('Location: ' . BASEURL . 'Auth/page404');
        // }
    }
    public function index(){
        $data['title'] = 'ANGGOTA PINTAR';
        $data['jbt'] = $this->model('Jabatan_model')->getAllJabatan();

        switch($_SESSION['manager']){
            case null :
                $data['cbg'] = $this->model('Cabang_model')->getAllCabang();
                $data['agt'] = $this->model('Anggota_model')->getAllAnggota();
                $data['wilayah'] = $this->model('Wilayah_model')->getAllWilayah();
                $this->view('templates/header',$data);
                $this->view('templates/topbar',$data);
                $this->view('templates/menus');
                $this->view('anggota/admin',$data);
                $this->view('templates/footer');
                break;
            default :
                $data['cbg'] = $this->model('Cabang_model')->getCabangbyId($_SESSION['manager']['id_cabang']);
                $data['agt'] = $this->model('Anggota_model')->getAnggotabyIdCabang($_SESSION['manager']['id_cabang']);
                $data['wilayah'] = $this->model('Wilayah_model')->getWilayahbyIdCabang($_SESSION['manager']['id_cabang']);
                $this->view('templates/header',$data);
                $this->view('templates/topbar',$data);
                $this->view('templates/menus');
                $this->view('anggota/index',$data);
                $this->view('templates/footer');
                break;
        }
        // $data['agtjbt'] = $this->model('Jabatan_model')->getJabatanbyId($data['agt']['id_jabatan']);
    }
    public function tambah()
    {
        if($this->model('Anggota_model')->tambahDataAnggota($_POST) > 0){
            Flasher::setFlash('Berhasil','ditambahkan','success','fa fa-check');
            header('Location: ' . BASEURL . 'Anggota');
            exit;
        }else{
            Flasher::setFlash('Gagal','ditambahkan','danger','icon-close');
            header('Location: ' . BASEURL . 'Anggota');
            exit;
        }
    }
    public function hapus($id)
    {
        if($this->model('Anggota_model')->hapusDatabyID($id) > 0){
            Flasher::setFlash('Berhasil','dihapus','secondary','fa fa-trash');
            header('Location: ' . BASEURL . 'Anggota');
            exit;
        }else{
            Flasher::setFlash('Gagal','dihapus','danger','icon-close');
            header('Location: ' . BASEURL . 'Anggota');
            exit;
        }
    }
    public function getUbah()
    {
        // mengirim data dalam bentuk json
        echo json_encode($this->model('Anggota_model')->getAnggotabyId($_POST['idagt']));
    }
    public function ubah()
    {
        if($this->model('Anggota_model')->ubahDataAnggota($_POST) > 0){
            Flasher::setFlash('Berhasil','diubah','success','fa fa-check');
            header('Location: ' . BASEURL . 'Anggota');
            exit;
        }else{
            Flasher::setFlash('Gagal','diubah','danger','icon-close');
            header('Location: ' . BASEURL . 'Anggota');
            exit;
        }
    }
    public function detail($id)
    {   
        $data['agt'] = $this->model('Anggota_model')->getAnggotabyId($id);
        $myjson = json_encode($this->model('Anggota_model')->getAnggotabyId($id));
        $data['title'] = 'SET TARGET';
        $this->view('templates/header',$data);
        $this->view('templates/topbar',$data);
        $this->view('templates/menus');
        $this->view('anggota/detail',$data);
        $this->view('templates/footer');
    }
    public function setTarget($id)
    {
        // echo $id;
        if($this->model('Anggota_model')->setTargetAnggota($_POST, $id) > 0){
            Flasher::setFlash('Berhasil','diubah','success','fa fa-check');
            header('Location: ' . BASEURL . 'Anggota/detail/'.$id);
            exit;
        }else{
            Flasher::setFlash('Gagal','diubah','danger','icon-close');
            header('Location: ' . BASEURL . 'Anggota/detail/'.$id);
            exit;
        }
    }
    // public function getAnggota()
    // {
    //     echo json_encode($this->model('Anggota_model')->getAnggotabyId($_POST['id']));
    // }
}