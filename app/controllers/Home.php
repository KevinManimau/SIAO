<?php

class Home extends Controller{
    public function __construct()
    {
                if(is_null($_SESSION['info']['uname']) && is_null($_SESSION['info']['pass'])){
                    header('Location: ' . BASEURL . 'Auth');
                    exit;
                }
                // var_dump($_SESSION['info']);
    }
    public function index(){
        $data['title'] = 'DASHBOARD';
        if($_SESSION['info']['idrole'] == 4){
            header('Location: ' . BASEURL . 'Home/preview');
        }else{
        switch($_SESSION['manager']){
            case null :
                // $data['cbg'] = ['nama_cab' => 'Data Seluruh Cabag'];
                $data['agt'] = $this->model('Anggota_model')->getAllAnggota();
                $data['cbg'] = $this->model('Cabang_model')->getAllCabang();
                $data['filagt'] = [];
                $i = 0;
                foreach($data['agt'] as $agt){
                    if($agt['jabatan'] != 'ASSISTEN'){
                        
                        $data['filagt'][$i] = [
                            'id_agt' => $agt['id_agt']
                        ];
                        $i++;
                    }    
                }
                $data['filcbg'] = [];
                $j = 0;
                foreach($data['cbg'] as $cbg){ 
                    $data['detailTrans'] = $this->model('Transaksi_model')->FilterTglTransaksiCabang($cbg['id']);                       
                    $data['filcbg'][$j] = [
                        'id_cbg' => $cbg['id'],
                        'nm_cbg' => $cbg['nama_cab'],
                        'jml_transaksi' => $data['detailTrans']['jml_transaksi'],
                        'jml_bayar' => $data['detailTrans']['jml_bayar'],
                        'income' => $data['detailTrans']['income'],
                        'sisa_bayar' => $data['detailTrans']['sisa_bayar']
                    ];
                    $j++;   
                }
                $key = array_column($data['filcbg'], 'jml_bayar');
                array_multisort($key, SORT_DESC, $data['filcbg']);
                
                // print_r($data['filcbg']);
                $data['nas'] = $this->model('Nasabah_model')->getAllNasabah();
                $data['trans'] = $this->model('Transaksi_model')->getAllTransaksi();
                $this->view('templates/header',$data);
                $this->view('templates/topbar',$data);
                $this->view('templates/menus');
                $this->view('home/admin',$data);
                $this->view('templates/footer/admin');
                break;
            default :
                // $data['cbg'] = $this->model('Cabang_model')->getCabangbyId($_SESSION['manager']['id_cabang']);
                $data['agt'] = $this->model('Anggota_model')->getAnggotabyIdCabang($_SESSION['manager']['id_cabang']);
                $data['filagt'] = [];
                $i = 0;
                foreach($data['agt'] as $agt){
                    if($agt['jabatan'] != 'ASSISTEN'){
                        $data['detailTrans'] = $this->model('Transaksi_model')->FilterTglTransaksi($agt['id_agt']);
                      
                        $data['filagt'][$i] = [
                            'id_agt' => $agt['id_agt'],
                            'nama_ao' => $agt['nama'],
                            'jml_transaksi' => $data['detailTrans']['jml_transaksi'],
                            'jml_bayar' => $data['detailTrans']['jml_bayar'],
                            'income' => $data['detailTrans']['income'],
                            'sisa_bayar' => $data['detailTrans']['sisa_bayar']
                        ];
                        $i++;
                    }    
                }
                $key = array_column($data['filagt'], 'jml_bayar');
                array_multisort($key, SORT_DESC, $data['filagt']);
                // var_dump($data['filagt']);
                $data['nas'] = $this->model('Nasabah_model')->getNasabahbyCabang($_SESSION['manager']['id_cabang']);
                $data['trans'] = $this->model('Transaksi_model')->getTransaksibyIdCab($_SESSION['manager']['id_cabang']);

                $this->view('templates/header',$data);
                $this->view('templates/topbar',$data);
                $this->view('templates/menus');
                $this->view('home/index',$data);
                $this->view('templates/footer/user');
                break;
        }
     }
        
    }
    public function viewer(){
        // echo $_POST['keycabang'];
        if($this->model('Cabang_model')->getCabangbyId($_POST['keycabang']) > 0){
            $_SESSION['keycab'] = $this->model('Cabang_model')->getCabangbyId($_POST['keycabang']);
            header('Location: ' . BASEURL . 'Home');
        }else{
            Flasher::setFlash('Gagal','Key Yang Anda Masukan Tidak Terdaftar','danger','icon-close');
            header('Location: ' . BASEURL . 'Home');
            exit;
        }
    }
    public function preview(){
        $data['cbg'] = $this->model('Cabang_model')->getAllCabang();
        if(isset($_SESSION['keycab']) != null){
                $data['title'] = 'DASHBOARD';
    
                $data['agt'] = $this->model('Anggota_model')->getAnggotabyIdCabang($_SESSION['keycab']['id']);
                $data['filagt'] = [];
                $i = 0;
                foreach($data['agt'] as $agt){
                    if($agt['jabatan'] != 'ASSISTEN'){
                        $data['detailTrans'] = $this->model('Transaksi_model')->FilterTglTransaksi($agt['id_agt']);
                      
                        $data['filagt'][$i] = [
                            'id_agt' => $agt['id_agt'],
                            'nama_ao' => $agt['nama'],
                            'jml_transaksi' => $data['detailTrans']['jml_transaksi'],
                            'jml_bayar' => $data['detailTrans']['jml_bayar'],
                            'income' => $data['detailTrans']['income'],
                            'sisa_bayar' => $data['detailTrans']['sisa_bayar']
                        ];
                        $i++;
                    }    
                }
                $key = array_column($data['filagt'], 'jml_bayar');
                array_multisort($key, SORT_DESC, $data['filagt']);

                $data['tablestatus'] = true;
                $data['nas'] = $this->model('Nasabah_model')->getNasabahbyCabang($_SESSION['keycab']['id']);
                $data['trans'] = $this->model('Transaksi_model')->getTransaksibyIdCab($_SESSION['keycab']['id']);
                $data['ncab'] = ''.$_SESSION['keycab']['status'].' '.$_SESSION['keycab']['nama_cab'];
                $data['btn'] = '<a class="btn btn-warning mt-2" href="'.BASEURL.'Home/default">Back</a>';
                $this->view('templates/header',$data);
                $this->view('home/viewer',$data);
                $this->view('templates/footer/viewer/single');
            }else{ 
                $data['title'] = 'DASHBOARD';
    
                $data['agt'] = $this->model('Anggota_model')->getAllAnggota();
                $data['cbg'] = $this->model('Cabang_model')->getAllCabang();
                $data['filagt'] = [];
                $i = 0;
                foreach($data['agt'] as $agt){
                if($agt['jabatan'] != 'ASSISTEN'){
                    $data['filagt'][$i] = [
                        'id_agt' => $agt['id_agt']
                    ];
                    $i++;
                    }    
                }

                $data['filcbg'] = [];
                $j = 0;
                foreach($data['cbg'] as $cbg){ 
                    $data['detailTrans'] = $this->model('Transaksi_model')->FilterTglTransaksiCabang($cbg['id']);                       
                    $data['filcbg'][$j] = [
                        'id_cbg' => $cbg['id'],
                        'nm_cbg' => $cbg['nama_cab'],
                        'jml_transaksi' => $data['detailTrans']['jml_transaksi'],
                        'jml_bayar' => $data['detailTrans']['jml_bayar'],
                        'income' => $data['detailTrans']['income'],
                        'sisa_bayar' => $data['detailTrans']['sisa_bayar']
                    ];
                    $j++;   
                }
                $key = array_column($data['filcbg'], 'jml_bayar');
                array_multisort($key, SORT_DESC, $data['filcbg']);

                $data['tablestatus'] = false;
                $data['nas'] = $this->model('Nasabah_model')->getAllNasabah();
                $data['trans'] = $this->model('Transaksi_model')->getAllTransaksi();
                $data['ncab'] = 'Data Seluruh Cabang';
                $data['btn'] = '';
                
                $this->view('templates/header',$data);
                $this->view('home/viewer',$data);
                $this->view('templates/footer/viewer/all');
            }
    }
    public function default(){
        $_SESSION['keycab']= null;
        header('Location: ' . BASEURL . 'Home/preview');
    }
    
}