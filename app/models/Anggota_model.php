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
   
    public function tambahDataAnggota($data)
    {
        
        $query = "INSERT INTO ". $this->table ." (id_manager,no_pintar,id_jabatan,nama,image,gender,telp,wilayah) VALUES(:id_m, :no, :id_j, :nama, :img, :gen, :telp, :wil)";
        
        $this->db->query($query);
        $this->db->bind('id_m',1);
        $this->db->bind('no',$data['nopintar']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('img', $image);
        $this->db->bind('gen', $radio);
        $this->db->bind('telp', $data['notelp']);
        $this->db->bind('idus', $uid);
        $this->db->bind('idcab', $data['cabang']);


        $this->db->execute();

        return $this->db->rowCount();
    }
}