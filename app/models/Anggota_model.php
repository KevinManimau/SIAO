<?php

class Anggota_model {
    private $table = 'anggota';
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getAllAnggota(){
        $this->db->query('SELECT * FROM `anggota` INNER JOIN `jabatan` ON `anggota`.`id_jabatan`=`jabatan`.`id`');
        // $this->db->query('SELECT * FROM '.$this->table);
        return $this->db->resultSet();
    }
   public function getAnggotabyIdCabang($id)
   {
    $this->db->query('SELECT * FROM '.$this->table.' INNER JOIN `jabatan` ON `anggota`.`id_jabatan`=`jabatan`.`id` WHERE id_cabang=:id');
    $this->db->bind('id', $id);
    return $this->db->resultSet();
   }
    public function tambahDataAnggota($data)
    {
        //gender
        if($data['gender']=="LAKI-LAKI"){
            $radio = 'LAKI-LAKI';
        }elseif($data['gender']=="PEREMPUAN"){
            $radio = 'PEREMPUAN';
        }else{
            Flasher::setFlash('Gagal','ditambahkan','danger','fa fa-check');
            header('Location:'.BASEURL.'Anggota');
            exit;
        }
        //jabatan
        // if($data['jabatan'] == 2){
        //     $wilayah = '-';
        // }elseif($data['jabatan'] == 3){
        //     $wilayah = $data['wilayah'];
        // }
        // else{
        //     Flasher::setFlash('Gagal','ditambahkan','danger','fa fa-check');
        //     header('Location:'.BASEURL.'Anggota');
        //     exit;
        // }
        switch($data['jabatan']){
            case 2 :
                $wilayah = '-';
                break;
            case 3 :
                $wilayah = $data['wilayah'];
                break;
            default :
                Flasher::setFlash('Gagal','ditambahkan','danger','fa fa-check');
                header('Location:'.BASEURL.'Anggota');
                exit;
                break;
        }
        //wilayah
        if($data['wilayah'] == null){
            $wilayah = '-';
        }

        $query = "INSERT INTO ". $this->table ." (id_cabang,no_pintar,id_jabatan,nama,image,gender,telpagt,wilayah) 
        VALUES(:idm, :no, :idjab, :nama, :image, :gen, :telp, :wil)";
        
        $this->db->query($query);
        $this->db->bind('idm',$_SESSION['manager']['id_cabang']);
        $this->db->bind('no',$data['nopintar']);
        $this->db->bind('idjab',$data['jabatan']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('image', 'default.jpg');
        $this->db->bind('gen', $radio);
        $this->db->bind('telp', $data['notelp']);
        $this->db->bind('wil', $wilayah);


        $this->db->execute();

        return $this->db->rowCount();
    }
    public function hapusDatabyID($id){
        $this->db->query('DELETE FROM '. $this->table .' WHERE id_agt=:id');
        $this->db->bind('id',$id);

        $this->db->execute();
        return $this->db->rowCount();
    }
}