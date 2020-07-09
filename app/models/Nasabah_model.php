<?php

class Nasabah_model {
    // private $table2 = 'transaksi';
    private $table = 'nasabah';
    private $db;

    public function __construct(){
        $this->db = new Database;
    }
    public function getAllNasabah()
    {
        $this->db->query('SELECT * FROM '.$this->table);
        return $this->db->resultSet();
    }
    public function getNasabahbyCabang($idcab)
    {
        $this->db->query('SELECT * FROM '.$this->table.' WHERE id_cabang_nas=:idcab');
        $this->db->bind('idcab',$idcab);
        return $this->db->resultSet();
    }
    public function getNasabahbyId($id)
    {
        $this->db->query('SELECT * FROM '.$this->table.' WHERE id_nasabah=:id');
        $this->db->bind('id',$id);
        return $this->db->single();
    }
    public function getNasabahbyNama($data){
        $this->db->query('SELECT * FROM '.$this->table.' WHERE nama_nas=:nama');
        $this->db->bind('nama',$data['nmnasabah']);
        return $this->db->single();
    }
    public function tambahDataNasabah($data){
        if($data['gender'] == 'LAKI-LAKI'){
            $radio = 'LAKI-LAKI';
        }elseif ($data['gender'] == 'PEREMPUAN') {
            $radio = 'PEREMPUAN';
        }else{
            Flasher::setFlash('Gagal','ditambahkan','danger','fa fa-check');
            header('Location:'.BASEURL.'Nasabah');
            exit;
        }

        $this->db->query('INSERT INTO '.$this->table.' (id_nasabah,nama_nas,gender_nas,no_telp_nas,id_cabang_nas, id_wil,date_create) VALUES(:idnas, :nmnas, :gender, :notelp, :idcab, :idwil,:date)');
        $this->db->bind('idnas',$data['nobuku']);
        $this->db->bind('nmnas',$data['nama']);
        $this->db->bind('gender',$radio);
        $this->db->bind('idwil',$data['wilayah']);
        $this->db->bind('notelp',$data['notelp']);
        $this->db->bind('idcab',$_SESSION['manager']['id_cabang']);
        $this->db->bind('date', time());

        $this->db->execute();

        return $this->db->rowCount();
    }
    public function hapusDatabyID($id){
        $this->db->query('DELETE FROM '. $this->table .' WHERE id_nasabah=:id');
        $this->db->bind('id',$id);

        $this->db->execute();
        return $this->db->rowCount();
    }
    public function ubahDataNasabah($data)
    {
        if($data['gender'] == 'LAKI-LAKI'){
            $radio = 'LAKI-LAKI';
        }elseif ($data['gender'] == 'PEREMPUAN') {
            $radio = 'PEREMPUAN';
        }else{
            Flasher::setFlash('Gagal','ditambahkan','danger','fa fa-check');
            header('Location:'.BASEURL.'Nasabah');
            exit;
        }

        $this->db->query('UPDATE '.$this->table.' SET id_nasabah=:idnas, nama_nas=:nmnas, gender_nas=:gender, id_wil=:idwil, no_telp_nas=:notelp, id_cabang_nas=:idcab WHERE id_nasabah=:id');
        $this->db->bind('id',$data['id']);
        $this->db->bind('idnas',$data['nobuku']);
        $this->db->bind('nmnas',$data['nama']);
        $this->db->bind('gender',$radio);
        $this->db->bind('idwil',$data['wilayah']);
        $this->db->bind('notelp',$data['notelp']);
        $this->db->bind('idcab',$_SESSION['manager']['id_cabang']);

        $this->db->execute();

        return $this->db->rowCount();
    }
}