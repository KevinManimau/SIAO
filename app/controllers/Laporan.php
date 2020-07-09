<?php

class Laporan extends Controller{
    public function __construct()
    {
        if(is_null($_SESSION['info']['uname']) && is_null($_SESSION['info']['pass'])){
            header('Location: ' . BASEURL . 'Auth');
            exit;
        }
    }
    public function index()
    {
        $data['title'] = 'LAPORAN';
        // $_SESSION['listtrans']= null;
        // $_SESSION['tanggal'] = null;

        if(isset($_SESSION['listtrans']) && isset($_SESSION['listtrans']) != null){
            $data['btnreset'] = '<a class="btn btn-warning mb-2" href="'.BASEURL.'Laporan/default1">Reset</a>';
            $this->view('templates/header',$data);
            $this->view('templates/topbar',$data);
            $this->view('templates/menus');
            $this->view('laporan/index',$data);
            $this->view('templates/cetak/index');
        }else{
            $data['btnreset'] = '';
            $this->view('templates/header',$data);
            $this->view('templates/topbar',$data);
            $this->view('templates/menus');
            $this->view('laporan/index',$data);
            $this->view('templates/cetak/index');
        }
    }
    public function cetakLaporan(){
        $data['title'] = 'LAPORAN';
        $data['cbg'] = $this->model('Cabang_model')->getCabangbyId($_SESSION['manager']['id_cabang']);
        $this->view('templates/header',$data);
        $this->view('laporan/cetaklaporan',$data);
        $this->view('templates/cetak/footer');
    }
    public function cetakLaporanHarian(){
        $data['title'] = 'LAPORAN HARIAN';
        $data['cbg'] = $this->model('Cabang_model')->getCabangbyId($_SESSION['manager']['id_cabang']);
        $this->view('templates/header',$data);
        $this->view('laporan/cetakharian',$data);
        $this->view('templates/cetak/footer');
    }
    public function search(){
        if($this->model('Anggota_model')->getAnggotabyIdCabang($_SESSION['manager']['id_cabang'])){
            $_SESSION['tanggal'] = $_POST;
            // $ctrtanggal = strtotime($_POST);
            $data['cbg'] = $this->model('Anggota_model')->getAnggotabyIdCabang($_SESSION['manager']['id_cabang']);
            $data['filtrans'] = [];
                $j = 0;
                foreach($data['cbg'] as $cbg){ 
                    $data['detailTrans'] = $this->model('Transaksi_model')->getTransaksibyFilter($cbg['id_agt'], $_POST);
                    if($data['detailTrans'] > 0){
                        $data['filtrans'][$j] = [
                            'id_trans' => $_POST['start'].' TO '.$_POST['end'],
                            'nm_ao' => $cbg['nama'],
                            'no_pintar' => $cbg['no_pintar'],
                            'nm_trans' => $cbg['nama_cab'],
                            'jml_transaksi' => 0,
                            'jml_bayar' => $data['detailTrans']['jml_bayar'],
                            'income' => $data['detailTrans']['income'],
                            'sisa_bayar' => $data['detailTrans']['sisa_bayar'],
                            
                        ];
                    }else{
                        $data['filtrans'][$j] = [
                            'id_trans' => 'Belum Transaksi',
                            'nm_ao' => $cbg['nama'],
                            'no_pintar' => $cbg['no_pintar'],
                            'nm_trans' => $cbg['nama_cab'],
                            'jml_transaksi' => 0,
                            'jml_bayar' => 0,
                            'income' => 0,
                            'sisa_bayar' => 0
                        ];
                    }                       
                    $j++;   
                }

            $_SESSION['listtrans'] = $data['filtrans'];
            // $_SESSION['listtrans'] = $this->model('Transaksi_model')->getTransaksibyFilter($_POST, $_SESSION['manager']['id_cabang']);
            // $_SESSION['tanggal'] = $_POST;
            Flasher::setFlash('Sukses','Data Transaksi dari Tanggal '.$_POST['start'].' Sampai Dengan '.$_POST['end'].' Adalah Sebagai Berikut :','success','icon-check');
            header('Location: ' . BASEURL . 'Laporan');
            exit;
        }else{
            $_SESSION['listtrans']= null;
            $_SESSION['tanggal'] = null;
                Flasher::setFlash('Gagal','Tidak Ada Data Di Rentang Tanggal Tersebut','danger','icon-close');
                header('Location: ' . BASEURL . 'Laporan');
                exit;
            
        }
    }
    public function SearchHarian(){
        if($this->model('Anggota_model')->getAnggotabyIdCabang($_SESSION['manager']['id_cabang'])){
            // $data['cbg'] = $this->model('Transaksi_model')->FilterTglTransaksiCabang($_SESSION['manager']['id_cabang']);
            $_SESSION['tanggal'] = $_POST['tanggal'];
            $ctrtanggal = strtotime($_POST['tanggal']);
            $data['cbg'] = $this->model('Anggota_model')->getAnggotabyIdCabang($_SESSION['manager']['id_cabang']);
            $data['filtrans'] = [];
                $j = 0;
                foreach($data['cbg'] as $cbg){ 
                    $data['detailTrans'] = $this->model('Transaksi_model')->FilterTglTransaksiHarian($cbg['id_agt'], $_POST['tanggal']);
                    if($data['detailTrans'] > 0){
                        $data['filtrans'][$j] = [
                            'id_trans' => $ctrtanggal,
                            'nm_ao' => $cbg['nama'],
                            'no_pintar' => $cbg['no_pintar'],
                            'nm_trans' => $cbg['nama_cab'],
                            'jml_transaksi' => 0,
                            'jml_bayar' => $data['detailTrans']['bunga_harian'],
                            'income' => $data['detailTrans']['disetor'],
                            'sisa_bayar' => $data['detailTrans']['kekurangan']
                        ];
                    }else{
                        $data['filtrans'][$j] = [
                            'id_trans' => 'Belum Transaksi',
                            'nm_ao' => $cbg['nama'],
                            'no_pintar' => $cbg['no_pintar'],
                            'nm_trans' => $cbg['nama_cab'],
                            'jml_transaksi' => 0,
                            'jml_bayar' => 0,
                            'income' => 0,
                            'sisa_bayar' => 0
                        ];
                    }                       
                    $j++;   
                }

            $_SESSION['listtransToday'] = $data['filtrans'];
            
            Flasher::setFlash('Sukses','Data Transaksi Tanggal '.$_POST['tanggal'].' Adalah Sebagai Berikut :','success','icon-check');
            header('Location: ' . BASEURL . 'Laporan/Harian');
            exit;
        }else{
            $_SESSION['listtransToday']= null;
            $_SESSION['tanggal'] = null;
                Flasher::setFlash('Gagal','Tidak Ada Transaksi Pada Tanggal Tersebut','danger','icon-close');
                header('Location: ' . BASEURL . 'Laporan/Harian');
                exit;
        }
    }
    public function Harian(){
        $data['title'] = 'LAPORAN HARIAN';
        // $_SESSION['listtrans']= null;
        // $_SESSION['tanggal'] = null;
        if(isset($_SESSION['listtransToday']) && isset($_SESSION['listtransToday']) != null){
            $data['transaksi'] = $this->model('Transaksi_model')->FilterTglTransaksiCabang($_SESSION['manager']['id_cabang']);
            
            $data['btnreset'] = '<a class="btn btn-warning mb-2" href="'.BASEURL.'Laporan/default2">Reset</a>';
            $this->view('templates/header',$data);
            $this->view('templates/topbar',$data);
            $this->view('templates/menus');
            $this->view('laporan/harian',$data);
            $this->view('templates/cetak/index');
        }else{
            $data['btnreset'] = '';
            $this->view('templates/header',$data);
            $this->view('templates/topbar',$data);
            $this->view('templates/menus');
            $this->view('laporan/harian',$data);
            $this->view('templates/cetak/index');
        }
    }
    public function default1(){
        $_SESSION['listtrans']= null;
        $_SESSION['tanggal'] = null;
        header('Location: ' . BASEURL . 'Laporan');
    }
    public function default2(){
        $_SESSION['listtransToday']= null;
        $_SESSION['tanggalToday'] = null;
        header('Location: ' . BASEURL . 'Laporan/Harian');
    }
}